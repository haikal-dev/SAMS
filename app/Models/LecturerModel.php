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

    public function resetPassword($id, $password){
        return DB::table('lecturers')->where('id', $id)->update([
            'password' => $password,
            'updated_at' => time()
        ]);
    }
    
    public function removeById($id){
        return DB::table('lecturers')->where('id', $id)->delete();
    }
    
    public function getById($id){
        return DB::table('lecturers')->where('id', $id)->first();
    }
    
    public function isEmailExists($email){
        $response = false;
        
        $lecturer = DB::table('lecturers')->where('email', $email)->first();
        
        if(isset($lecturer->id)){
            $response = true;
        }
        
        return $response;
    }
    
    public function allSortByIdDesc(){
        return DB::table('lecturers')->orderBy('id', 'desc')->get();
    }
}
