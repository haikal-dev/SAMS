<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\dev\Config;

class DevController extends Controller
{
    public function index(Request $request){
        $config = new Config();
        
        if(!$request->session()->exists($config->sessionName)){
            $statusLoggedOut = ($request->session()->exists('status')) ? true : false;
            return view('dev.login', compact('statusLoggedOut'));
        }
        else {
            return view('dev.dashboard', compact('config'));
        }
    }

    public function logout(Request $request){
        $config = new Config();
        $request->session()->flush();
        $request->session()->flash('status', 'Successfully logged out!');
        return redirect($config->homeUrl);
    }

    public function login(Request $request){
        $config = new Config();
        
        if($request->session()->exists($config->sessionName)){
            return redirect($config->homeUrl);
        }
        else {
            if(!$request->has('email', 'pass')){
                return redirect($this->homeUrl);
            }
            else {
                $email = $request->get('email');
                $pwd = $request->get('pass');
                
                if($config->email == $email && Hash::check($pwd, $config->pass)){
                    $request->session()->put($config->sessionName, time());
                    return response()->json([
                        'message' => 'OK'
                    ]);
                }
                else {
                    return response()->json([
                        'message' => 'Invalid Authentication!'
                    ]);
                }
            }
        }
    }
}
