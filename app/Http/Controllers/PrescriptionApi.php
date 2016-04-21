<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Model\Prescriptions;
use App\Model\Drug;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;   
use Illuminate\Support\Facades\Validator; 
use DB;
/**
* 
*/
class PrescriptionApi extends Controller
{
   
   public function getRequest(Request $request){
 
        $table = new Prescriptions;
        $table->name  = $request->input('name');
        $table->phone = $request->input('phone');
        $table->addr  = $request->input('addr');
        // $table->email = $request->input('email');
        $table->email  = 'example@gmail.com';
        $table->status = '0';
        $table->total  = '0';

        $target_Path = "uploads/prescription/";
        $imgname     = $request->input('phone').'.jpg';
        $target_Path = $target_Path.$imgname;

        $imsrc = base64_decode($request->input('image'));
        $fp    = fopen($target_Path, 'w');
        fwrite($fp, $imsrc);
        if(fclose($fp)){
            echo "Tải hình thành công";
        }else{
            echo "Tải hình thất bại";
        }

        $table->image = $imgname;

        $table->save(); 
        return "Successfully Uploaded";
     }
}
