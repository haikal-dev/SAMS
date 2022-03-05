<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\dev\Config;
use App\Models\LecturerModel;
use App\Models\StudentModel;

class DevController extends Controller
{
    public function index(Request $request){
        $config = new Config();
        
        if(!$request->session()->exists($config->sessionName)){
            $statusLoggedOut = ($request->session()->exists('status')) ? true : false;
            return view('dev.login', compact('statusLoggedOut'));
        }
        else {
            $lecturer = new LecturerModel;
            $student = new StudentModel;
            $config->lecturer_total = $lecturer->total();
            $config->student_total = $student->total();

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
            if(!$request->has('username', 'pass')){
                return redirect($this->homeUrl);
            }
            else {
                $user = $request->get('username');
                $pwd = $request->get('pass');
                
                if($config->user == $user && Hash::check($pwd, $config->pass)){
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
