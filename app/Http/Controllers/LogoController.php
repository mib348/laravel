<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogoModel as LogoModel;

class LogoController extends Controller
{
    public function index()
    {
        return view('logo');
    }
    
    public function InsertData(Request $request){
        $LogoModel = new LogoModel();
        return $LogoModel->AddData($request);
    }
}
