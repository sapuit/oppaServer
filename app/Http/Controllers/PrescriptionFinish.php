<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Model\Prescriptions;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;   
use Illuminate\Support\Facades\Validator; 
use DB;
/**
* 
*/
class PrescriptionFinish extends Controller
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
        return view('prescriptionWaiting.show-toa', [   
            'arrNum' => $this->arrNum,
                'model' => $model
            ]);
    }

//xu ly toa thuoc
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
                    'cost' => $value->cost
                    ]);
                    $drug = $model->drugs()->save($drug);
                }
                $model->save();
                return Redirect::to('/cho-xu-ly');
                // return $a = json_decode($data -> Input('arrayDrug'));
                // return $a[0]["quantity"];
                // return = $arrayDrug;
//                 $json = '[
// { "firstName":"John" , "lastName":"Doe" }, 
// { "firstName":"Anna" , "lastName":"Smith" }, 
// { "firstName":"Peter" , "lastName":"Jones" }
// ]';
// return $json_decoded = json_decode($json);
// $data = var_dump($json_decoded);
// return $json_decoded[0]["lastName"];
            } catch (Exception $e) {
                return 'Lỗi database';
            }
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

        $user = Prescriptions::find($id);
        $user->status = '2';
        $user->save();
        return $user;
    }

    public function delete($id){

        try {
            $user = Prescriptions::find($id);
            $nameImage = $user->image;
            if($nameImage!=null)
            {
                $LinkImage = "./uploads/prescription/".$nameImage;
                if (is_dir($LinkImage)) {
                    $images[] = $file;
                }
            }
            $user->delete();
            return Redirect::to('/cho-xu-ly');
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
