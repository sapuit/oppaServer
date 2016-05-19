<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Model\Prescriptions;
use App\Http\Requests;
use App\Model\Drug;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;   
use Illuminate\Support\Facades\Validator; 
use DB;
use App\Libs\Gcm\gcm;
use App\Libs\Gcm\Push;
/**
* 
*/
class PrescriptionWaiting extends Controller
{
    private $arrNum;
    private $model;

	public function showAll()
	{
		 $this->getData();
        $arrNums = $this->arrNum;
        $i=0;
        foreach ($this->model as $value) {
            if($value->status!='1')
            {
                unset($this->model[$i]);
            }
            $i++;
        }
        return view('prescriptionWaiting.cho-xu-ly', 
            [   'arrNum' => $arrNums,
                'model' => $this->model
            ]);
	}

    //  Hiển thị toa thuốc
    public function showItem($id)
    {
        $this->getData();
        $i=0;
        foreach ($this->model as $value) {
            if($value->id==$id)
            {
                $model = $this->model[$i];
            }
            $i++;
        }
        return view('prescriptionWaiting.show-toa', [   
            'arrNum' => $this->arrNum,
                'model' => $model
            ]);
    }

    //  Xử lý toa
    public function handle(Request $data)
    {

        $validation = Validator::make($data->all(), array(
            'id' => 'required'
            ));
        if ($validation->fails()) {

            return Redirect::to('header/form')->withErrors($validation);
        } else {
            try {
                $id = $data->Input('id');
                $model = Prescriptions::find($id);
                $model->status = '2';
                $arrayDrug = json_decode($data -> Input('arrayDrug'));
                foreach ($arrayDrug as $value)
                {
                    $drug = new Drug(['name' => $value->name,
                    'quantity' => $value->quantity,
                    'cost' => $value->cost,
                    'total' => $value->total
                    ]);
                    $drug = $model->drugs()->save($drug);
                }
                $model->save();
                //msg kiem tra ket qua
                $msg = $this->vailablePre($id);
                

                return Redirect::to('/cho-xu-ly');
                
            } catch (Exception $e) {
                return 'Lỗi database';
            }
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

    //thong bao khong dap ung
    public function unavailablePre($id)
    {
        $pre = Prescriptions::find($id);

        $token = $pre->token;
        $flag = '-1';
    
        $push = new Push();
        $push->setFlag($flag);

        $gcm = new GCM();
        $msg = $gcm->send($token, $push->getPush());

        $this->delete($pre);

        return Redirect::to('/cho-xu-ly');

    }

    
    public function delete($pre){
        try {
            $nameImage = $pre->image;
            if($nameImage!=null)
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

    public function update($id){

        $user = Prescriptions::find($id);
        $user->status = '2';
        $user->save();
        return $user;
    }


    public function getData()
    {
        $this->model = Prescriptions::all();
        $num0 = 0;
        $num1 = 0;
        $num2 = 0;
        $num3 = 0;
        $num4 = 0;
        foreach ($this->model as $value) {
            switch ($value->status) {
                case '0':
                    $num0++;
                    break;
                case '1':
                    $num1++;
                    break;
                case '2':
                    $num2++;
                    break;
                case '3':
                    $num3++;
                    break;
                case '4':
                    $num4++;
                    break;
                default:
                    break;
            }
        }
        $this->arrNum = array($num0,$num1, $num2, $num3, $num4);
    }
}
