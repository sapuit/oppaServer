<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Model\Headers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;

class Header extends Controller {

 	public function getForm(){
 		return view('header.form');
 	}

 	public function store(Request $data){

 		$validation = Validator::make($data->all(), array(
 			'title' => 'required',
 			'sub_title' => 'required',
 			'image' => 'required|mimes:jpg,jpeg,JPG|max:2000',
 			));
 		if ($validation->fails()) {

 			return Redirect::to('header/form')->withErrors($validation);
 		} else {
 			
 			$logo	= $data->file('image');
 			$upload = 'uploads/prescription';
 			$filename = $logo->getClientOriginalName();
 			$success = $logo->move($upload, $filename);

 			if ($success) {
 					# code...
	 			$table = new Headers;
	 			$table->title = $data->Input('title');
	 			$table->sub_title = $data->Input('sub_title');
	 			$table->image = $filename;
	 			$table->save();
	 			// print_r($table);exit();
	 			return Redirect::to('header/form')->with('success','Data submitted');
 			}	
 		}
 	}

 	public function testUpload(Request $data){

 		// $validation = Validator::make($data->all(), array(
 		// 	'title' => 'required',
 		// 	'sub_title' => 'required',
 		// 	'image' => 'required|mimes:jpg,jpeg,JPG|max:2000',
 		// 	));
 		// if ($validation->fails()) {

 		// 	return Redirect::to('header/form')->withErrors($validation);
 		// } else {
 			
 		// 	$logo	= $data->file('image');
 		// 	$upload = 'uploads/prescription';
 		// 	$filename = $logo->getClientOriginalName();
 		// 	$success = $logo->move($upload, $filename);

 		// 	if ($success) {
 					# code...
	 			$table = new Headers;
	 			$table->title = $data->Input('title');
	 			$table->sub_title = $data->Input('sub_title');
	 			$table->image = $filename;
	 			$table->save();
	 			// print_r($table);exit();
	 			return "OK";
 			// }	
 		// }

 		// return "Error";
 	}

 	public function display(){

	 		$model = Headers::all();
	 		return view('header.show', compact('model'));
 	}
}