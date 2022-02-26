<?php

namespace App\Http\Controllers\lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Config extends Controller
{
    public $sessionName = "SAMS_LECTURER";
    public $homeUrl = "lecturer";

    public function __construct(){
        $this->homeUrl = env('APP_URL') . "/" . $this->homeUrl;
    }
}
