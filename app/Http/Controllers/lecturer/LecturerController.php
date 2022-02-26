<?php

namespace App\Http\Controllers\lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\lecturer\Config;
use App\Models\LecturerModel;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    public function index(Request $request){
        $config = new Config;

        if(!$request->session()->has($config->sessionName)){
            $statusLoggedOut = ($request->session()->exists('status')) ? true : false;
            return view('lecturer.login', compact('statusLoggedOut'));
        }

        else {
            return "lecturer dashboard";
        }
        
    }

    public function logout(Request $request){
        $config = new Config();
        $request->session()->flush();
        $request->session()->flash('status', 'Successfully logged out!');
        return redirect($config->homeUrl);
    }

    public function login(Request $request){
        $config = new Config;

        if($request->session()->has($config->sessionName)){
            return redirect($config->homeUrl);
        }

        else {
            if(!$request->has('email', 'password')){
                return redirect($config->homeUrl);
            }

            else {
                $email = $request->get('email');
                $password = $request->get('password');

                $lecturer = new LecturerModel;
                
                if(!$lecturer->isEmailExists($email)){
                    return response()->json([
                        'message' => 'This email is not exist in database. Please contact developer to get your account.'
                    ]);
                }

                else {
                    $user = $lecturer->getUserByEmail($email);
                
                    if($user->email == $email && Hash::check($password, $user->password)){
                        $request->session()->put($config->sessionName, $email);
                        return response()->json([
                            'message' => 'OK'
                        ]);
                    }

                    else {
                        return response()->json([
                            'message' => 'Invalid authentication.'
                        ]);
                    }
                }
                
            }
        }
    }
}
