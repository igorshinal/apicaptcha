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
            case 1: return $image->createRandomCaptcha(); break;
            case 2: return $image->createCompanyCaptcha(); break;
        }

    }
    
    public function checkCaptcha(Request $request)
    {
        $id = $request->input('id');
        $text = $request->input('text');
        $check = new api;
        return $check->check($id,$text);
    }



}
