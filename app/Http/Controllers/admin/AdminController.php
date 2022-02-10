<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $sessionName = "SAMS_ADMIN";
    protected $homeUrl = "/admin";
    protected $email = "mhaikalazizan@gmail.com";
    protected $pass = '$2y$10$ZGhF1cZDujp61mnWIbUyEe9t8NYHJ.Lo6ZH9HaICYhyBt7.f86DfS';

    public function index(Request $request){
        if(!$request->session()->exists($this->sessionName)){
            return view('admin.login');
        }
        else {
            return "admin area";
        }
    }

    public function login(Request $request){
        if($request->session()->exists($this->sessionName)){
            return redirect($this->homeUrl);
        }
        else {
            if(!$request->has('email', 'pwd')){
                return redirect($this->homeUrl);
            }
            else {
                $email = $request->get('email');
                $pwd = $request->get('pwd');
                
                if($this->email == $email && Hash::check($pwd, $this->pass)){
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
