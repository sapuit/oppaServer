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
class Prescription extends Controller
{
	public function showAll()
	{
		$model = Prescriptions::all();
        // return $model;
        return view('prescription.show', compact('model'));
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
                $table->status = $request->input('status') ;
                $table->total = $request->input('total') ;
                $table->image = $filename;
                $table->save();
                // print_r($table);exit();
                // return Redirect::to('prescription')->with('success','Data submitted');
                return Redirect::to('prescription');
            }   
        }
    }

    public function update(){

        $user = Prescriptions::first();
        $user->title = 'sap';
        $user->save();
        $user = Prescriptions::all();
        return $user;
    }

    public function delete(){

        $user = Prescriptions::first();
        $user->delete();
        $user = Prescriptions::all();
        return $user;
    }
}
