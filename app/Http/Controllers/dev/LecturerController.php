<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\dev\Config;

class LecturerController extends Controller
{
    public function index(Request $request){
        $config = new Config();
        
        if(!$request->session()->exists($config->sessionName)){
            return redirect($config->homeUrl);
        }
        else {
            return "lecturer section";
        }
    }
}
