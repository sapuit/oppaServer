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

//hien thi mot toa thuoc
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

    public function delete($id){

        try {
            $user = Prescriptions::find($id);
            $nameImage = $user->image;
            $LinkImage = "./uploads/prescription/".$nameImage;
            unlink($LinkImage);
            $user->delete();
            return Redirect::to('/don-thuoc-moi');
        } catch (Exception $e) {
            return "Xóa không thành công!";
        }
        
        
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
