<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersModel extends Model
{

    public function AddData($request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['type'] = $request->type;
        if (!empty($request->password))
            $data['password'] = Hash::make($request->password);
        
        if (! empty($request->nId)) {
            DB::table("users")->where('id', $request->nId)->update($data);
            $nRef = $request->nId;
        } else
            $nRef = DB::table("users")->insertGetId($data);
        
        return $nRef;
    }

    public function GetData()
    {
        $html = "";
        $arrRec = DB::table("users")->orderByRaw('id DESC')->get();
        
        foreach ($arrRec as $arrData) {
            $html .= '<tr id="' . $arrData->id . '">
                            <td>' . ucwords($arrData->name) . '</td>
                            <td>' . $arrData->email . '</td>
                            <td>' . ucwords(strtolower($arrData->type)) . '</td>
                            <td>' . date("d F, Y h:i:s A", strtotime($arrData->created_at)) . '</td>
                            <td>
                                <a href="' . url('/users/' . $arrData->id) . '" class="btn btn-warning btn-xs edit_btn"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-xs delete_btn"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>';
        }
        
        return $html;
    }

    public function GetDataDetail($nId)
    {
        return (array) DB::table("users")->find($nId);
    }

    public function DeleteData($request)
    {
        return DB::table("users")->where('id', "=", $request->nId)->delete();
    }
}
