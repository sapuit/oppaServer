<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Prescriptions;
use App\Model\Drug;
use App\Http\Controllers\Controller;


class PrescriptionApi extends Controller
{
   
    public function getRequestImg(Request $request){
    $table         = new Prescriptions;
    $table->name   = $request->input('name');
    $table->phone  = $request->input('phone');
    $table->addr   = $request->input('addr');
    $table->token  = $request->input('token');
    $table->email  = 'example@gmail.com';
    $table->status = '0';
    $table->total  = '0';
    
    $target_Path = "uploads/prescription/" . date("Y/m/d");
    if (!file_exists($target_Path)) {
        mkdir($target_Path, 0777, true);
    }

    $imgname     =  $request->input('phone') . '_' . date("His") . '.jpg';
    $target_Path = $target_Path."/".$imgname;
    $imsrc       = base64_decode($request->input('image'));
    $fp          = fopen($target_Path, 'w');
    fwrite($fp, $imsrc);
    if(fclose($fp)){
        $result = '0';
    }else{
        $result = '-1';
    }

    $table->image = date("Y/m/d") . "/" . $imgname;
    $table->save(); 

    return $result;
  }

    public function getRequestList(Request $request){
        try{
            $table = new Prescriptions;
            $table->name   = $request->input('name');
            $table->phone  = $request->input('phone');
            $table->addr   = $request->input('addr');
            $table->token  = $request->input('token');
            $table->email  = 'example@gmail.com';
            $table->status = '0';
            $table->total  = '0';
            $table->save();

            $jsonArr = $request->input('drugs');
            foreach ($jsonArr as $value) {
                $drug = new Drug([
                    'name'     => $value['name'],
                    'quantity' => $value['quantity'],
                    'cost'     => '0',
                    'total'    => '0'
                    ]);
                $table->drugs()->save($drug);
            }
         
            return  "OK";
        } catch (Exception $e) {
            return $e;
        } 
     }

  public function getConform(Request $request){
    $flag  = $request->input('flag');
    $id    = $request->input('id');
    $token = $request->input('token');
    $pre   = Prescriptions::find($id);

    if ($token == $pre->token) {
      if ($flag == '1') {//  người dùng xác nhận lấy thuốc
        $pre->status = '3';
        $pre->save();
        return "OK";
      }elseif ($flag == '0') {//  hủy toa thuốc
        $pre->status = '0';
        $pre->save();
        return "0";
      }
    }
    return  "0";
  }

  public function vn_str_filter($str){
      $unicode = array(
         'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
         'd'=>'đ',
         'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
         'i'=>'í|ì|ỉ|ĩ|ị',
         'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
         'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
         'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
         'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
         'D'=>'Đ',
         'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
         'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
         'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
         'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
         'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ');

    foreach($unicode as $nonUnicode=>$uni){
         $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }

     return $str;
  }


}
