<?php

namespace App\Http\Controllers;
use Illuminate\support\facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = Auth::User();

        $users = User::all();
        return view('home',compact('users'));

    }
}
