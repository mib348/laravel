<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuModel as MenuModel;

class MenuController extends Controller
{
    public function index()
    {
        return view('menubuilder');
    }
    
    public function GetMenu(){
        $menuModel = new MenuModel();
        return $menuModel->GetData();
    }
    
    public function InsertMenu(Request $request){
        $menuModel = new MenuModel();
        
        if (!empty($request->nId))
            return $menuModel->UpdateData($request);
        else
            return $menuModel->AddData($request);
    }
    
    public function GetMenuDetail(Request $request){
        $menuModel = new MenuModel();
        return $menuModel->GetDataDetail($request);
    }
    
    public function DeleteData(Request $request){
        $menuModel = new MenuModel();
        return $menuModel->DeleteData($request);
    }
}
