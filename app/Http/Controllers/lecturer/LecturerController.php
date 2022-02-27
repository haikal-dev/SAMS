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
            $lecturer = new LecturerModel;
            $config->getUser($request->session()->get($config->sessionName));

            return view('lecturer.dashboard', compact('config'));
        }
        
    }

    public function changePassword(Request $request){
        $config = new Config;

        if(!$request->session()->has($config->sessionName)){
            return redirect($config->homeUrl);
        }

        else {
            $lecturer = new LecturerModel;
            $config->getUser($request->session()->get($config->sessionName));

            return view('lecturer.change_password', compact('config'));
        }
    }

    public function changePasswordNow(Request $request){
        $config = new Config;

        if(!$request->session()->has($config->sessionName)){
            return redirect($config->homeUrl);
        }

        else {
            if(!$request->has('cur_password', 'new_password', 'renew_password')){
                $request->session()->flush('error', 'Invalid request');
                return redirect($config->homeUrl . "/settings/change-password");
            }

            else {
                $cur_password = $request->get('cur_password');
                $new_password = $request->get('new_password');
                $renew_password = $request->get('renew_password');

                $request->session()->flush('success', 'Successfully changed.');
                return redirect($config->homeUrl . "/settings/change-password");
            }
        }
    }

    public function settings(Request $request){
        $config = new Config;

        if(!$request->session()->has($config->sessionName)){
            return redirect($config->homeUrl);
        }

        else {
            $lecturer = new LecturerModel;
            $config->getUser($request->session()->get($config->sessionName));

            return view('lecturer.settings', compact('config'));
        }
    }

    public function student_dashboard(Request $request){
        $config = new Config;

        if(!$request->session()->has($config->sessionName)){
            return redirect($config->homeUrl);
        }

        else {
            $lecturer = new LecturerModel;
            $config->getUser($request->session()->get($config->sessionName));

            return view('lecturer.student_list', compact('config'));
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
