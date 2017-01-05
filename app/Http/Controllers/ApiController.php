<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\api;

class ApiController extends Controller
{
    public function getCaptcha()
    {
        $image = new api;
        $random = rand(1,2);
        switch ($random){
            case 1: return view('common')->with($image->createRandomCaptcha()); break;
            case 2: return view('common')->with($image->createRandomCaptcha()); break;
        }

    }
}
