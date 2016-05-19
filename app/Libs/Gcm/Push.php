<?php
namespace App\Libs\Gcm;
/**
 * Chứa message để push lên 
 * google cloud message
 */

class Push{
    // push message title
    private $title;
    
    // push message payload
    private $message;
    
    // flag indicating background task on push received
    // private $is_background;
    
    // flag to indicate the type of notification
    private $flag;
     
    function __construct() {
        
    }
    
    public function setTitle($title){
        $this->title = $title;
    }
    
    public function setMessage($message){
        $this->message = $message;
    }
    
    // public function setIsBackground($is_background){
    //     $this->is_background = $is_background;
    // }
    
    public function setFlag($flag){
        $this->flag = $flag;
    }
    
    public function getPush(){

        if ($this->flag) {
            switch ($this->flag) {
                case '1':
                    return $this->resendPrescription();
                    break;
                 case '-1':
                    return $this->unavailablePrescription();
                    break;
                 case '2':
                    return $this->conformPrescription();
                    break;
                
                default:
                        
                    break;
            }
        }
    }

    //  Gửi response yêu cầu gửi lại toa   
    private function resendPrescription(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $res = array();
        $res['title'] = 'Yêu cầu gửi lại toa thuốc';
        $res['message'] = 'Vì lý do toa thuốc của bạn thông tin không chính xác hoặc hình ảnh toa thuốc chưa rõ, xin bạn vui lòng gửi lại toa thuốc hoặc liên hệ trực tiếp đến quầy thuốc.';
        $res['flag'] = $this->flag;
        $res['created_at'] =  date('Y-m-d G:i:s');;
        return $res;
    }

    //  Gửi response toa không được đáp ứng 
    private function unavailablePrescription(){
         date_default_timezone_set("Asia/Ho_Chi_Minh");

        $res = array();
        $res['title'] = 'Toa thuốc chưa được đáp ứng';
        // $res['is_background'] = $this->is_background;
        $res['flag'] = $this->flag;
        $res['message'] = 'Hiện tại số thuốc trong toa của bạn chưa có trong nhà thuốc, vui lòng trở lại sau.';
        $res['created_at'] =  date('Y-m-d G:i:s');
        return $res;
    }

    //  Gửi response xác nhận có đặt toa hay không
    private function conformPrescription(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");

            // //  thuốc
            // $drug1 = array();
            // $drug1['name'] = 'Paradon';
            // $drug1['quantity'] = '10';
            // $drug1['cost'] = '1';
            // $drug1['total'] = '10';

            // $drug2 = array();
            // $drug2['name'] = 'viagra';
            // $drug2['quantity'] = '5';
            // $drug2['cost'] = '5';
            // $drug2['total'] = '25';

            // //  danh sách thuốc
            // $drugs = array();
            // $drugs[0] = $drug1;
            // $drugs[1] = $drug2;

            // //  thông tin đơn thuốc
            // $pre = array();
            // $pre['id'] = '1234';
            // $pre['name'] = 'sap';
            // $pre['phone'] = '123456789';
            // $pre['adrr'] = '123 Lê lợi';
            // $pre['total'] = '35';
            // $pre['image'] = '';
            // $pre['locate'] = 'Quầy số 1 ';
            // $pre['time'] = '8am sáng đến 16pm';
            // $pre['drugs'] = $drugs;

            // $data = array();
            // $data['message'] = '';
            // $data['prescription'] = $pre;

            $res = array();
            $res['title'] = "Xác nhận toa thuốc";
            // $res['is_background'] = $this->is_background;
            $res['flag'] = $this->flag;
            $res['message'] = $this->message;
            $res['created_at'] =  date('Y-m-d G:i:s');

            return $res;
    }    
}