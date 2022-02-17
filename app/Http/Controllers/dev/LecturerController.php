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
            $model = new LecturerModel;
            $lecturers = $model->allSortByIdDesc();
            
            return view('dev.lecturer.dashboard', compact('config', 'lecturers'));
        }
    }

    public function resetPasswordView(Request $request, $id){
        $config = new Config();
        
        if(!$request->session()->exists($config->sessionName)){
            return redirect($config->homeUrl);
        }
        else {
            $model = new LecturerModel;
            $data = $model->getById($id);
            
            return view('dev.lecturer.reset_password', compact('config', 'data'));
        }
    }

    public function resetPassword(Request $request, $id){
        $config = new Config();
        
        if(!$request->session()->exists($config->sessionName)){
            return redirect($config->homeUrl);
        }
        else {

            if($request->has('password')){
                $model = new LecturerModel;
                $data = $model->resetPassword($id, $request->get('password'));
                
                $request->session()->flash('success', 'Successfully reset!');
                return redirect('/dev/lecturer');
            }
        }
    }
    
    public function removeConfirmation(Request $request, $id){
        $config = new Config();
        
        if(!$request->session()->exists($config->sessionName)){
            return redirect($config->homeUrl);
        }
        else {
            $model = new LecturerModel;
            $data = $model->getById($id);
           return view('dev.lecturer.remove', compact('config', 'data'));
        }
    }
    
    public function removeNow(Request $request, $id){
        $config = new Config();
        
        if(!$request->session()->exists($config->sessionName)){
            return redirect($config->homeUrl);
        }
        else {
            $model = new LecturerModel;
            $model->removeById($id);
            $request->session()->flash('success', 'Successfully deleted!');
            return redirect('/dev/lecturer');
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
