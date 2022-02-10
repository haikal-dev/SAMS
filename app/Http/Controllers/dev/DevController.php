<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DevController extends Controller
{
    protected $sessionName = "SAMS_ADMIN";
    protected $homeUrl = "/dev";
    protected $email = "dev@node.my";
    protected $pass = '$2y$10$ZGhF1cZDujp61mnWIbUyEe9t8NYHJ.Lo6ZH9HaICYhyBt7.f86DfS';

    public function index(Request $request){
        if(!$request->session()->exists($this->sessionName)){
            $statusLoggedOut = ($request->session()->exists('status')) ? true : false;
            return view('dev.login', compact('statusLoggedOut'));
        }
        else {
            return view('dev.dashboard');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        $request->session()->flash('status', 'Successfully logged out!');
        return redirect($this->homeUrl);
    }

    public function login(Request $request){
        if($request->session()->exists($this->sessionName)){
            return redirect($this->homeUrl);
        }
        else {
            if(!$request->has('email', 'pass')){
                return redirect($this->homeUrl);
            }
            else {
                $email = $request->get('email');
                $pwd = $request->get('pass');
                
                if($this->email == $email && Hash::check($pwd, $this->pass)){
                    $request->session()->put($this->sessionName, time());
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
