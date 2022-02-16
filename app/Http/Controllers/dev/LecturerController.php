<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\dev\Config;
use Illuminate\Support\Facades\Hash;
use App\Models\LecturerModel;

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
                $model = new LecturerModel;
                
                if($model->isEmailExists($request->get('email'))){
                    $request->session()->flash('error', 'E-mail is exists in database.');
                    return redirect('/dev/lecturer');
                }
                
                else {
                    $model->create(
                        $request->get('name'),
                        $request->get('staff_id'),
                        $request->get('phone'),
                        $request->get('email'),
                        Hash::make($request->get('password'))
                    );
                    $request->session()->flash('success', 'Successfully added.');
                    return redirect('/dev/lecturer');
                }
            }
        }
    }
}
