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
class Home extends Controller
{
    private $arrNum;
    
	public function index()
	{
        $this->getData();
        return view('index', ['arrNum' => $this->arrNum]);
	}

    public function getData()
    {
        $model = Prescriptions::all();
        $num0 = 0;
        $num1 = 0;
        $num2 = 0;
        $num3 = 0;
        $num4 = 0;
        foreach ($model as $value) {
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
