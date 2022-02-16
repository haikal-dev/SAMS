<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LecturerModel
{
    public function create($name, $staff_id, $phone, $email, $password){
        return DB::table('lecturers')->insert([
            'fullname' => $name,
            'staff_id' => $staff_id,
            'phone' => $phone,
            'email' => $email,
            'password' => $password,
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }
    
    public function isEmailExists($email){
        $response = false;
        
        $lecturer = DB::table('lecturers')->where('email', $email)->first();
        
        if(isset($lecturer->id)){
            $response = true;
        }
        
        return $response;
    }
}
