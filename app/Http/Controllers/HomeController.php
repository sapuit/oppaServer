<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Model\Prescriptions;
use App\Model\Drug;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
