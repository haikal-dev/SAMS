<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Config extends Controller
{
    public $sessionName = "SAMS_ADMIN";
    public $homeUrl = "dev";
    public $email = "dev@node.my";
    public $pass = '$2y$10$ZGhF1cZDujp61mnWIbUyEe9t8NYHJ.Lo6ZH9HaICYhyBt7.f86DfS';

    public function __construct(){
        $this->homeUrl = env('APP_URL') . "/" . $this->homeUrl;
    }
}
