<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LogoModel extends Model
{

    public function AddData($request)
    {
        $data = [];
        
//         if (! empty($request->logo)){
//             $data['config_value'] = "logo.png";
//             DB::table("tblconfig")->where('config_key', "Logo")->update($data);
//         }
//         if (! empty($request->favicon)){
//             $data['config_value'] = "favicon.ico";
//             DB::table("tblconfig")->where('config_key', "Favicon")->update($data);
//         }
        
        if (! empty($request->logo)) {
            Storage::putFileAs(
                                'public', $request->logo, 'logo.png'
                            );
        }
        if (! empty($request->favicon)) {
            Storage::putFileAs(
                                'public', $request->favicon, 'favicon.ico'
                            );
        }
        
        return $nRef;
    }
}
