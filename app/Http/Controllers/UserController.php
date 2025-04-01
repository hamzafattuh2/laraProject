<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
return view("user");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response("bravo has been added");   //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

$user =new User() ;
$user->customerId= $request->customerId;
$user->name = $request->name ;
$user->email = $request->email ;
$user->password = bcrypt($request->password);
$user->address="dsad";
    $user->save();
    return response("bravo has been added");

        // User::create([
        // "id"=>$request->id,
        //         "name"=> $request->name,
        //         "email"=> $request->email,
        //         "password"=> bcrypt($request->password),

        // ]);
        //
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
