<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagesModel as PagesModel;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages');
    }
    
    public function GetData(){
        $PagesModel = new PagesModel();
        return $PagesModel->GetData();
    }
    
    public function InsertData(Request $request){
        $PagesModel = new PagesModel();
        return $PagesModel->AddData($request);
    }
    
    public function GetDataDetail($nId){
//         if (!empty($nId)){
            $PagesModel = new PagesModel();
            $arrData = $PagesModel->GetDataDetail($nId);
            return view('page', $arrData);
//         }
//         else{
//             return view('page');
//         }
    }
    
    public function DeleteData(Request $request){
        $PagesModel = new PagesModel();
        return $PagesModel->DeleteData($request);
    }
}
