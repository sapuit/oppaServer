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
	public function checkResponse(){

        //  gửi response tới client
        $token = 'f1xxksceK7Y:APA91bFxbXdGft2s4-Ip49-Oo2XNEoiDLpc60jrwqFoVmnaKphELt8aozESxIdtEa6-aQw-tmWJcx99oDKQ7MalGV7r4Em9m34kgOlZXYxUJXVEYTdOIDuylu2EcJgABbejO4NeBFYhk';
        $message = '{"total":"125","updated_at":"2016-07-02 23:14:16","phone":"098709870987","drugs":[{"total":25,"quantity":"5","cost":"5","updated_at":{},"name":"paradon","created_at":{},"_id":{}},{"total":100,"quantity":"10","cost":"10","updated_at":{},"name":"vitamin a","created_at":{},"_id":{}}],"name":"Nguyễn Kiến Phước","created_at":"2016-07-02 23:11:50","_id":"5777e7c6100b8c1a10004d5c","addr":"Uit","email":"example@gmail.com","token":"dNEEB9PVa7k:APA91bHU39_I6H8WoF-UEInGN_AyZxWfsmwsGHjp0zxrHz5RHlqIwXMjQEYM7Zh7nX3abaLuqM3sNqMGE4opaf-N2t2ewXBRQ9D9To9o1obBaGVxVq2Ni3or0b-p6ou0kpdmvXj4pZ1U","status":"2"}';

        $flag = '2';    
        $push = new Push();
        $push->setFlag($flag);
        $push->setMessage($message);
        $gcm = new GCM();
        $msg = $gcm->send($token, $push->getPush());
		return $msg;
	}
	
}
?>