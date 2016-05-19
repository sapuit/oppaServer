<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\Gcm\gcm;
use App\Libs\Gcm\Push;

/**
* test các method 
*/
class TestAPI extends Controller
{
	public function checkResponse(Request $request){

		$token = $request->input('token');
		$flag = $request->input('flag');
		
		$push = new Push();
		$push->setFlag($flag);

		if ($flag ==2) {
			$push->setMessage($message);
		}

		$gcm = new GCM();
		$gcm->send($token, $push->getPush());

		return $push->getPush();
	}
	
}
?>