<?php

namespace App\Http\Controllers\lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LecturerModel;

class Config extends Controller
{
    public $sessionName = "SAMS_LECTURER";
    public $homeUrl = "lecturer";
    public $user = "";

    public function __construct(){
        $this->homeUrl = env('APP_URL') . "/" . $this->homeUrl;
    }

    public function getUser($email){
        $lecturer = new LecturerModel;
        $this->user = $lecturer->getUserByEmail($email)->fullname;
    }
}
