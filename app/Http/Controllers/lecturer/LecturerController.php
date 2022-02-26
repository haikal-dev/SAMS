<?php

namespace App\Http\Controllers\lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index(Request $request){
        $statusLoggedOut = ($request->session()->exists('status')) ? true : false;
        return view('lecturer.login', compact('statusLoggedOut'));
    }
}
