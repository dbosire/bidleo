<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Log;
use DB;

class SmsController extends Controller
{

    //public function sendBulkSMS($phone_number, $message){
        public function sendBulkSMS(){
        $phone_number='254716880932';
        $message="Hello, this is a test SMS";
        $senderID='Silicon';
        $url="https://api.semasms.co.ke/send";
        $dlr_callback="http://call_back_url.com";

        $data='{
                "sender": "'.$senderID.'",
                "recipient": "'.$phone_number.'",
                "message": "'.$message.'",
                "call_back": "'.$dlr_callback.'",
                "bulk": 1
                }';


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Basic YmlkbGVvOlBAc3N3MHJk',
                'Cookie: CAKEPHP=ntpbmrqbp6q3htfmq3bjvkgbu4'
            )
        );

        $results = curl_exec($ch);
        Log::info('Message sent to  '. $phone_number.' Response '.$results);

return $results;
    }

    public function parsePhoneNumber($phone_number){
        $number = "";

        if(strlen($phone_number) == 12){ //254722000000

            $number = substr($phone_number,3,11);

        }else if(strlen($phone_number) == 10){ //0722000000
            $number = substr($phone_number,1,9);

        } else if(strlen($phone_number) == 9){ //722000000
            $number = $phone_number;

        }

        return $number;

    }

}

?>
