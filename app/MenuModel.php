<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuModel extends Model
{
    public function AddData($request) {
        $data = [];
        $data['name'] = $request->strName;
        $data['link'] = $request->strLink;
        return DB::table("tblmenu")->insertGetId($data);
    }
    
    public function GetData(){
        $html = "";
        $arrRec = DB::table("tblmenu")->get();
        
        foreach ($arrRec as $arrMenu){
            $html .= '<tr id="' . $arrMenu->id . '">
                            <td>' . $arrMenu->name . '</td>
                            <td>' . $arrMenu->link . '</td>
                            <td>
                                <a class="btn btn-warning btn-xs edit_btn"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-xs delete_btn"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>';
        }
        
        return $html;
    }
    
    public function GetDataDetail($request) {
        return (array) DB::table("tblmenu")->find($request->nId);
    }
    
    public function UpdateData($request) {
        $data = [];
        $data['name'] = $request->strName;
        $data['link'] = $request->strLink;
        return DB::table("tblmenu")->where('id', $request->nId)
                                    ->update($data);
    }
    
    public function DeleteData($request) {
        return DB::table("tblmenu")->where('id', "=", $request->nId)
                                    ->delete();
    }
}
