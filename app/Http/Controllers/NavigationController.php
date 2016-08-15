<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NavigationController extends Controller
{
    public function gotoLanding(){
        return view('landing');
    }

    public function gotoSignin(){
        return view('signin');
    }

    public function gotoSignup(){
        return view('signup');
    }

    public function createTask(){
        return view('create');
    }

    public function gotoVerify(){
        return view('verify');
    }

    public function gotoProfile(){
        return view('user.profile');
    }
}

