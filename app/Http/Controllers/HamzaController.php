<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\User;
use App\Models\User;
class HamzaController extends Controller
{
    public function index()
    {

        $users = User::all();
        return $users;
    }

    public function admin()
    {

        return "222";
        //   view('admin');
    }
    public function bill()
    {

        return view('bill');
    }
}
