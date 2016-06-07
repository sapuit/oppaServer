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
use App\Libs\Gcm\gcm;
use App\Libs\Gcm\Push;
/**
* 
*/
class adminAPI extends Controller
{

    public function newpre()
    {
        $pre = Prescriptions::where('status', '0')->get();
        return $pre;
    }

    public function newpreCancel($id)
    {
        $pre = Prescriptions::find($id);

        //  gửi response tới client
        $token = $pre->token;
        $flag = '1';    
        $push = new Push();
        $push->setFlag($flag);
        $gcm = new GCM();
        $msg = $gcm->send($token, $push->getPush());

        $checkDel = $this->delete($pre);

        return $checkDel;
        
    }

    public function newpreCan($id)
    {
        try {
            $user = Prescriptions::find($id);
            $user->status = '1';
            $user->save();
            return "1";
        } catch (Exception $e) {
            return "0";
        }
    }


    //  Xóa toa
    public function delete($pre){
        try {
            $nameImage = $pre->image;
            if($nameImage != null)
            {
                $LinkImage = "./uploads/prescription/".$nameImage;
                if (is_dir($LinkImage)) {
                    $images[] = $file;
                }
            }
            $pre->delete();
            return '1';
        } catch (Exception $e) {
            return '0';
        }
        
    }

    public function handlingpre()
    {
        $pre = Prescriptions::where('status', '1')->get();
        return $pre;
    }

    public function handlingpreCancel($id)
    {
        $pre = Prescriptions::find($id);

        //  gửi response tới client
        $token = $pre->token;
        $flag = '-1';    
        $push = new Push();
        $push->setFlag($flag);
        $gcm = new GCM();
        $msg = $gcm->send($token, $push->getPush());

        $checkDel = $this->delete($pre);

        return $checkDel;
    }

    public function handlingpreCan($id)
    {
         try {
            $user = Prescriptions::find($id);
            $user->status = '2';
            $user->save();
            return "1";
        } catch (Exception $e) {
            return "0";
        }
    }

    public function confirm()
    {
        $pre = Prescriptions::where('status', '2')->get();
        return $pre;
    }

    public function getPre($idpre){
        $pre = Prescriptions::where('_id', $idpre)->get();
        return $pre;
    }

    //them thuoc
    public function drugImport(Request $data){
        try {
            $id = $data->Input('_id');
            $model = Prescriptions::find($id);
            $model->status = '2';
            $model->drugs()->delete();
            $arrayDrug = $data->Input('drugs');
            foreach ($arrayDrug as $value)
            {
                $drug = new Drug(['name' => $value['name'],
                'quantity' => $value['quantity'],
                'cost' => $value['cost'],
                'total' => $value['total']
                ]);
                $drug = $model->drugs()->save($drug);
            }
            $model->total = $data->Input('totals');
            $model->place = $data->Input('place');
            $model->time = $data->Input('time');
            $model->save();
            //msg kiem tra ket qua
            $msg = $this->vailablePre($id);
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }

    //  Thông báo đáp ứng toa
    public function vailablePre($id)
    {
        $pre = Prescriptions::find($id);
        $token = $pre->token;
        $flag = '2';
        $message = $pre;
        $push = new Push();
        $push->setFlag($flag);
        $push->setMessage($message);
        $gcm = new GCM();
        $msg = $gcm->send($token, $push->getPush());
        return $msg;
    }

    public function ship()
    {
        $pre = Prescriptions::where('status', '3')->get();
        return $pre;
    }

}
