<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $ngdung = User::all();
        return view('users', compact('ngdung')); 
    }
}
