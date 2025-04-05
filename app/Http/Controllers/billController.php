<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use App\Models\Bill;
// use App\Http\Controllers\Input;
// use Illuminate\Support\Facades\Input;7

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class billController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ("admin");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'customerId'=> 'required|min:1|max:10'
        ]);
        $bill = new Bill();
        $bill->customerId=$request->Input("customerId");
        $bill->initial=$request->Input("initial");
        $bill->final=$request->Input("final");
        $bill->month=$request->Input("month");
        $bill->year=$request->Input("year");
        $bill->units=(integer)$bill->final-(integer)$bill->initial;
        // $admin=DB::table('admins')->first();
        // $rate=$admin->rate;
        // $bill->amount=$bill->units * $rate;
        $bill->amount=1;// من عندي هاد السطر
        $bill->status="Unpaid";
        $bill->save();
        return view('success');

    }
    public static function calculate(string $s)
    {

        $sum = DB::table('bills')->where([['customerId',$s],['status','Unpaid']])->sum('amount');
        return $sum;
    }
    public function pdf(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        $s = Auth::user()->customerId;

        $data = DB::table('bills')
            ->where([
                ['customerId', $s],
                ['month', $month],
                ['year', $year]
            ])
            ->get();

        if ($data->isEmpty()) {
            return response()->json(['message' => 'No data found for the given month and year'], 404);
        }

        try {
            $pdf = PDF::loadView('bill', ['data' => $data]);
            return $pdf->stream('bill.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate PDF: ' . $e->getMessage()], 500);
        }
    }

    public function store1(Request $request)
    {

        $request->validate([
            'customerId'=> 'required|min:1|max:10'//كان الحد لاقصى يساوي الحد الاعلى زبطته
        ]);
        $bill = new Bill;
        $bill->customerId=$request->Input("customerId");
        $bill->initial=$request->Input("initial");
        $bill->final=$request->Input("final");
        $bill->month=$request->Input("month");
        $bill->year=$request->Input("year");
        $bill->units=(integer)$bill->final-(integer)$bill->initial;
        $admin=DB::table('admins')->first();
        $rate=$admin->rate;
        $bill->amount=$bill->units * $rate;
        $bill->status="Unpaid";
        $bill->save();
        return view('success');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function updaterate(Request $request)
    {
        $newrate=$request->input("rate");
        DB::table('admins')
            ->where('id', 1)
            ->update(['rate' => $newrate]);
        return redirect()->intended(route('admin.dashboard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
