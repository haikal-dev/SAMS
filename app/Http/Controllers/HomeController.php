<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * index() - Appear button for lecturer or student
     * to login
     */
    public function index(){
        return view('home');
    }
}
