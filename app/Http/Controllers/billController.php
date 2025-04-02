<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
// use App\Http\Controllers\Input;
// use Illuminate\Support\Facades\Input;
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
