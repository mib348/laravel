<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\UploadFileModel as UploadFileModel;

class PagesModel extends Model
{
    public function AddData($request) {
        $data = [];
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        
        if (!empty($request->file))
            $data['image'] = $request->file->getClientOriginalName();
        
        if (isset($request->cb_homepage)){
            $data2['set_as_homepage'] = "N";
            DB::table("tblpages")->update($data2);
            
            $data['set_as_homepage'] = "Y";
        }
        else
            $data['set_as_homepage'] = "N";
        
        if (!empty($request->nId)){
            DB::table("tblpages")->where('id', $request->nId)
                                ->update($data);
            $nRef = $request->nId;
        }
        else
            $nRef = DB::table("tblpages")->insertGetId($data);
        
        if (!empty($request->file)){
            $request->id = $nRef;
            $UploadFileModel = new UploadFileModel();
            $UploadFileModel->UploadFile($request);
        }
        
        return $nRef;
    }
    
    public function GetData(){
        $html = "";
        $arrRec = DB::table("tblpages")->orderByRaw('id DESC')->get();
        
        foreach ($arrRec as $arrData){
            $html .= '<tr id="' . $arrData->id . '">
                            <td>' . $arrData->id . '</td>
                            <td>' . $arrData->title . '</td>
                            <td>' . substr($arrData->description, 0, 150) . '</td>
                            <td>' . date("d F, Y h:i:s A", strtotime($arrData->created)) . '</td>
                            <td>
                                <a href="' . url('/pages/' . $arrData->id) . '" class="btn btn-warning btn-xs edit_btn"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-xs delete_btn"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>';
        }
        
        return $html;
    }
    
    public function GetDataDetail($nId) {
        return (array) DB::table("tblpages")->find($nId);
    }
    
    public function DeleteData($request) {
        return DB::table("tblpages")->where('id', "=", $request->nId)
        ->delete();
    }
}
