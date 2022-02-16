<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\dev\Config;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    public function index(Request $request){
        $config = new Config();
        
        if(!$request->session()->exists($config->sessionName)){
            return redirect($config->homeUrl);
        }
        else {
            return view('dev.lecturer.dashboard', compact('config'));
        }
    }

    public function create(Request $request){
        $config = new Config();
        
        if(!$request->session()->exists($config->sessionName)){
            return redirect($config->homeUrl);
        }
        else {
            if($request->has('name', 'staff_id', 'phone', 'email', 'password')){
                $request->session()->flash('success', 'Successfully received!');
                return redirect('/dev/lecturer');
            }
        }
    }
}
