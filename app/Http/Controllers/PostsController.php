<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostsModel as PostsModel;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts');
    }
    
    public function GetData(){
        $PostsModel = new PostsModel();
        return $PostsModel->GetData();
    }
    
    public function InsertData(Request $request){
        $PostsModel = new PostsModel();
        return $PostsModel->AddData($request);
    }
    
    public function GetDataDetail($nId){
//         if (!empty($nId)){
            $PostsModel = new PostsModel();
            $arrData = $PostsModel->GetDataDetail($nId);
            return view('post', $arrData);
//         }
//         else{
//             return view('page');
//         }
    }
    
    public function DeleteData(Request $request){
        $PostsModel = new PostsModel();
        return $PostsModel->DeleteData($request);
    }
}
