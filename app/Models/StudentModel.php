<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentModel
{
    public $error = false;
    public $message;

    public function register($name, $id, $email, $phone, $password){
        if($this->isEmailExist($email)){
            $this->error = true;
            $this->message = "Email '" . $email . "' already exists.";
        }

        else {
            return DB::table('students')->insert([
                'fullname' => $name,
                'student_id' => $id,
                'phone' => $phone,
                'email' => $email,
                'password' => $password,
                'created_at' => time(),
                'updated_at' => time()
            ]);
        }
    }

    public function isEmailExist($email){
        $data = DB::table('students')->where('email', $email)->first();

        if(!isset($data->id)){
            return false;
        }

        else {
            return true;
        }
    }

    public function all(){
        return DB::table('students')->get();
    }
}
