<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel as UsersModel;

class UsersController extends Controller
{

    public function index()
    {
        return view('users');
    }

    public function GetData()
    {
        $UsersModel = new UsersModel();
        return $UsersModel->GetData();
    }

    public function InsertData(Request $request)
    {
        $UsersModel = new UsersModel();
        return $UsersModel->AddData($request);
    }

    public function GetDataDetail($nId)
    {
        // if (!empty($nId)){
        $UsersModel = new UsersModel();
        $arrData = $UsersModel->GetDataDetail($nId);
        return view('user', $arrData);
        // }
        // else{
        // return view('page');
        // }
    }

    public function DeleteData(Request $request)
    {
        $UsersModel = new UsersModel();
        return $UsersModel->DeleteData($request);
    }
}
