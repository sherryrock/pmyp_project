<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YeildController extends Controller
{
    public function index(){
        return view('yeild.index');
    }

    public function welcome(){
        return view('yeild.welcome');
    }
}
