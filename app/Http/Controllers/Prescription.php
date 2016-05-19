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

use App\Libs\Gcm\gcm;
use App\Libs\Gcm\Push;


class Prescription extends Controller
{
    
    private $arrNum;
    private $model;
	public function showAll()
	{
        $this->getData();
        $arrNums = $this->arrNum;
        $i=0;
        foreach ($this->model as $value) {
            if($value->status!='0')
            {
                unset($this->model[$i]);
            }
            $i++;
        }
        return view('prescription.don-thuoc-moi', 
            [   'arrNum' => $arrNums,
                'model' => $this->model
            ]);
	}

    //  Hiển thị các toa
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
        return view('prescription.show-toa', [   
            'arrNum' => $this->arrNum,
                'model' => $model
            ]);
    
    }

    //  Yêu cầu client gửi lại toa
    public function resendPre($id)
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
        if($checkDel == '1')
        {
            return Redirect::to('/don-thuoc-moi');
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

    public function insertForm(){
        return view('prescription.insert');
    }

	public function insertSave(Request $request){

        $validation = Validator::make($request->all(), array(
            'image' => 'required|mimes:jpg,jpeg|max:10000',
            ));
        
        if ($validation->fails() ) {
            return Redirect::to('prescription/insert')->withErrors($validation);

        } else {
            $table = new Prescriptions;
            $logo   = $request->file('image');
            $upload = 'uploads/prescription';
            $filename = $logo->getClientOriginalName();
            $success = $logo->move($upload, $filename);

            if ($success) {
                $table->name = $request->input('name');
                $table->phone = $request->input('phone');
                $table->addr = $request->input('addr');
                $table->email = $request->input('email');
                // $table->status = $request->input('status') ;
                $table->status = "0" ;
                $table->maBn = "001" ;
                $table->total = $request->input('total') ;
                $table->image = $filename;
                $table->save();
                // print_r($table);exit();
                // return Redirect::to('prescription')->with('success','Data submitted');
                return Redirect::to('prescription');
            }   
        }
    }

    public function update($id){
        try {
            $user = Prescriptions::find($id);
            $user->status = '1';
            $user->save();
            return Redirect::to('don-thuoc-moi');
            // return $user;
        } catch (Exception $e) {
            return "Thao tác thất bạn!";
        }
        
    }

    public function testUpload(Request $request){
 
         
     $table = new Prescriptions;
     $target_Path = "uploads/prescription/";
     $imgname = $request->input('phone').'_'.$request->input('email').'.jpg';
     $target_Path = $target_Path.$imgname;
     $imsrc = base64_decode($request->input('image'));
     $fp = fopen($target_Path, 'w');
     fwrite($fp, $imsrc);
     if(fclose($fp)){
         echo "Tải hình thành công";
     }else{
         echo "Tải hình thất bại";
     }
     $table->name = $request->input('name');
     $table->image = $imgname;
     $table->phone = $request->input('phone');
     $table->addr = $request->input('addr');
     $table->email = $request->input('email');
     $table->status = $request->input('status') ;
     $table->total = $request->input('total') ;
 
    
 
     $table->save(); 
     // print_r($table);exit();
     // return Redirect::to('prescription')->with('success','Data submitted');
     return "Successfully Uploaded";
     //     }   
     // }
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
