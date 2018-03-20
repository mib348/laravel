<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\UploadFileModel as UploadFileModel;
use Illuminate\Support\Facades\Auth;

class PostsModel extends Model
{
    public function AddData($request) {
        $data = [];
        $data['title'] = $request->title;
        $data['excerpt'] = $request->excerpt;
        $data['description'] = $request->description;
        $data['created_by'] = Auth::id();
        
        if (!empty($request->file))
            $data['image'] = $request->file->getClientOriginalName();
        
        if (!empty($request->nId)){
            DB::table("tblposts")->where('id', $request->nId)
                                ->update($data);
            $nRef = $request->nId;
        }
        else
            $nRef = DB::table("tblposts")->insertGetId($data);
        
        if (!empty($request->file)){
            $request->id = $nRef;
            $UploadFileModel = new UploadFileModel();
            $UploadFileModel->UploadFile($request);
        }
        
        return $nRef;
    }
    
    public function GetData(){
        $html = "";
        $arrRec = DB::table("tblposts")->orderByRaw('id DESC')->get();
        
        foreach ($arrRec as $arrData){
            $html .= '<tr id="' . $arrData->id . '">
                            <td>' . $arrData->id . '</td>
                            <td>' . $arrData->title . '</td>
                            <td>' . $arrData->excerpt . '</td>
                            <td>' . date("d F, Y h:i:s A", strtotime($arrData->created)) . '</td>
                            <td>
                                <a href="' . url('/posts/' . $arrData->id) . '" class="btn btn-warning btn-xs edit_btn"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-xs delete_btn"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>';
        }
        
        return $html;
    }
    
    public function GetDataDetail($nId) {
        return (array) DB::table("tblposts")->find($nId);
    }
    
    public function DeleteData($request) {
        return DB::table("tblposts")->where('id', "=", $request->nId)
        ->delete();
    }
}
