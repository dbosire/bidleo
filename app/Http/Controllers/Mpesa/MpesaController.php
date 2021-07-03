<?php

namespace App\Http\Controllers\Mpesa;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

use Log;
use DB;

use App\Models\Auction;
use App\Models\Bidder;
use App\Models\User;
use App\Models\Bid;
use App\Models\mpesa_token;

class MpesaController extends Controller
{
    /**
     * Lipa na M-PESA password
     * */
    public function lipaNaMpesaPassword(){

        $lipa_time              = Carbon::rawParse('now')->format('YmdHms');
        $passkey                = env('MPESA_PASS_KEY', '' );
        $BusinessShortCode      = 174379;
        $timestamp              = $lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);

        return $lipa_na_mpesa_password;
    }
    /**
     * Lipa na M-PESA STK Push 
     * 
     * @return [curl] response
     *
     **/
    public function customerMpesaSTKPush($phone_number,$bid_amount){

        $url    = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl   = curl_init();

        curl_setopt( $curl, CURLOPT_URL, $url );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()) );
        

        $curl_post_data = [

            //Fill in the request parameters with valid values
            
            'BusinessShortCode' => 174379,
            'Password'          => $this->lipaNaMpesaPassword(),
            'Timestamp'         => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType'   => 'CustomerPayBillOnline',
            'Amount'            => 1,
            'PartyA'            => $phone_number, // replace this with your phone number
            'PartyB'            => 174379,
            'PhoneNumber'       => $phone_number, // replace this with your phone number
            'CallBackURL'       => 'https://c52e5ec177a8.ngrok.io/api/mpesa_response',
            'AccountReference'  => $phone_number,
            'TransactionDesc'   => "Testing stk push on sandbox"
        ];

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);

        return $curl_response;
    }

    /**
     * Generate an access token for every stk push
     * 
     * return [string] access_token
     */
    // public function generateAccessToken(){
        
    //     $consumer_key       = env('MPESA_CONSUMER_KEY', '');
    //     $consumer_secret    = env('MPESA_CONSUMER_SECRET', '');
    //     $credentials        = base64_encode($consumer_key.":".$consumer_secret);

    //     $url    = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
    //     $curl   = curl_init();

    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
    //     curl_setopt($curl, CURLOPT_HEADER,false);
    //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //     $curl_response  = curl_exec($curl);

    //     $access_token   = json_decode($curl_response);
        

    //     Log::info($curl_response);
    //     return $access_token->access_token;
    // }



    // Access Token Alternative


    public function generateAccessToken(){


        $token_m=DB::table('mpesa_tokens')->limit(1)->get();

        if($token_m) {
            foreach ($token_m as $x) {
                $token = $x->access_token;
           }

        }
        else {


            $consumer_key = env('MPESA_CONSUMER_KEY', '');
            $consumer_secret = env('MPESA_CONSUMER_SECRET', '');
            $credentials = base64_encode($consumer_key . ":" . $consumer_secret);

            $url    = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
            // $url = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic " . $credentials));
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $curl_response = curl_exec($curl);
            //$curl_info = curl_getinfo($curl);
            $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $access_token = json_decode($curl_response);

            $token= $access_token->access_token;
            Log::info('URL fxn tkn '.$token);
        }
        return $token;
    }

    /**
     * Mpesa callback, gives response which is then stored in the DB
     */
    public function mpesaCallback( Request $request ){

        $reciept_number     = $request['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
        Log::info( $reciept_number );
        $transaction_date   = $request['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
        Log::info( $transaction_date );
        $phone_number       = $request['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
        Log::info( $phone_number );
        
        if (User::where('phone_number', '=', $phone_number)->exists()) {
            $mpesa_response = DB::table('users')
                                ->where('phone_number', $phone_number )
                                ->update([
                                    'mpesa_transaction_codes' => $reciept_number,
                                    'mpesa_transaction_dates' => $transaction_date,                                  
                                ]);
        
        
        $message = "test mpesa confirmation";
        $offerCode = "001030900869"; 
        $cpId = 253 ; 
        $linkId = '';
        $this->sendConfirmationSMS( $phone_number, $message, $offerCode, $cpId, $linkId );

            return $request;

         }else{

            $mpesa_response = DB::table('users')
                                ->where('phone_number', $phone_number )
                                ->update([
                                    'mpesa_transaction_codes' => $reciept_number,
                                    'mpesa_transaction_dates' => $transaction_date,
                                    'eligible'             => true,
                                ]);
        
        
        $message = "test mpesa confirmation and sigup";
        $offerCode = "001030900869"; 
        $cpId = 253 ; 
        $linkId = '';        
        $this->sendConfirmationSMS( $phone_number, $message, $offerCode, $cpId, $linkId );

        return $request;
         }
        
    }

    public function confirmationMpesa( Request $request ){
        Log::info("confirmation mpesa". $request );
    }

    public function validationMpesa( Request $request ){
        Log::info( "validation mpesa" . $request );
    }

    public function registerMpesaUrls(){

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: Bearer '. $this->generateAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            'ShortCode' => "600141",
            'ResponseType' => 'Completed',
            'ConfirmationURL' => "https://c52e5ec177a8.ngrok.io/api/confirmation",
            'ValidationURL' => "https://c52e5ec177a8.ngrok.io/api/validation"
        )));
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }

    /**
     * Send confirmation SMS when user has paid
     */
    public function sendConfirmationSMS( $phone_number, $message, $offerCode, $cpId, $linkId ){
        
        $token = $this->GenerateToken();
        Log::info( $token );
        $phone = $phone_number;        
        $message = $message;
        Log::info($message);
        $url12 = 'https://dsvc.safaricom.com:9480/api/auth/login';
        $timeStamp =  date("YdmGis");
        $sms = 'API';
        $uniqueId = $phone.'_'.$timeStamp;
        $LinkId=$linkId;
        $OfferCode=$offerCode;
        $CpId=$cpId;
        $data='{
					                        "requestId":"'.$uniqueId.'",					                    					                
                                            "requestTimeStamp": "'.date("YdmGis").'", 
                                            "channel": "'.$sms.'",   
                                            "sourceAddress": "224.223.10.27",									                                      
                                            "requestParam": 
                                              {
                                                "data": 
                                                [
                                                {
                                                    "name": "LinkId",
                                                    "value":"'.$LinkId.'"
                                                  },
                                                  
                                                  {
                                                    "name": "OfferCode",
                                                    "value":"'.$OfferCode.'"
                                                  },
                                                  {
                                                    "name": "Msisdn",
                                                    "value": "'.$phone.'"
                                                  },
                                                    {
                                                    "name": "Content",
                                                        "value": "'.$message.'"
                                                      },
                                                  {
                                                    "name": "CpId",
                                                    "value":"'.$CpId.'"
                                                  }
                                                ]
                                              },
                                              "operation": "SendSMS"
                                            }';

                                    $data_strings12=$data;
                                    Log::info('req '.$data_strings12);
                                    $ch = curl_init($url12);

                                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_strings12);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                            'Content-Type: application/json',
                                            'X-Requested-With: XMLHttpRequest',
                                            'X-Authorization:Bearer ' . $token
                                        )
                                    );

                                    $results12 = curl_exec($ch);
                                    Log::info( $results12 );
                                    
    }

    public function GenerateToken(){
        try {
            $username = "amwaytech_apiuser";
            $password = "AMWAYTECH_APIUSER@ps2545";

            $url12 = "https://dsvc.safaricom.com:9480/api/auth/login";

            $data12 = array(
                "username" => $username,
                "password" => $password
            );

            $data_strings12 = json_encode($data12);
            $ch = curl_init($url12);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_strings12);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'X-Requested-With: XMLHttpRequest'
                )
            );
            $results12 = curl_exec($ch);
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            $objs12 = json_decode($results12,true);
            $token=$objs12['token'];
            Log::info('token '.$token);
            $refreshToken = $objs12['refreshToken'];


        }
        catch(\Exception $e)
        {
            $token=$e->getMessage();
        }

        $temporary_token = new mpesa_token([
            'access_token' => $token,                      
        ]);

        $temporary_token->save();

        return $token;
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

    public function place_bid( Request $request ){

        $phone_number = $request->input('phone_number'); 
        
        $country_code = '254';

        $message ='';

        if(Str::startsWith($phone_number, $country_code)){
            $phone_number = $_POST['phone_number'];             
        }else{            
            $phone_number = substr($phone_number, -9);
            $phone_number = 254 . $phone_number;
        }
        
        $item_name = $_POST['item_name'];
        $item_kepyphrase = $_POST['item_keyphrase'];
        $item_category = $_POST['item_category'];
        $bid_amount =   $_POST['bid_amount']; 
        $bid_unique_id = $item_category. substr( bin2hex( random_bytes( 6 ) ),  0, 6 );
        $auction_id = $_POST['auction_id'];
        $item_unique_id = $_POST['item_unique_id'];

        $bidder_unique_id= substr( bin2hex( random_bytes( 12 ) ),  0, 12 );

        $password = Crypt::encrypt($phone_number. substr( bin2hex( random_bytes( 4 ) ),  0, 4 ));  

        $existing_auction = DB::table('auction')
            ->where('item_unique_id', '=', $item_unique_id)
            ->first();

        $existing_bid = Bid::where('bid_unique_id', '=', $bid_unique_id)->first();
        
        $check_unique = Bid::where('auction_id', $auction_id )
                            ->where('bid_amount', '=', $bid_amount)
                            ->where('bid_status', '=','active')
                            ->count();
        
        $number_of_bids = DB::table('auction')
             ->where('auction_id', $auction_id )
            ->select('number_of_bids')
            ->first();

        $lowest_unique_bid_amount = DB::table('auction')
                ->where('auction_id', $auction_id )
                ->min('lowest_unique_bid');                
                
        $lowest_unique_bidder = DB::table('auction')
                ->where('auction_id', $auction_id )                
                ->select('lowest_unique_bidder')   
                ->first();                                                                     
       
        $user = User::where('phone_number', '=', $phone_number)->first();
        if ($user === null) {
        //======================
        // user doesn't exist
        //======================

        $new_user = new User([
            'phone_number' => $phone_number,
            'password' => $password,
            'bidder_unique_id' => $bidder_unique_id,
            'role' => 'bidder',
            'eligible' => true,           
        ]);

        $new_user->save();

        $new_bid = new Bid([
                'auction_id' => $auction_id,
                'bid_amount' =>$bid_amount,
                'item_name' => $item_name,
                'bidder' => $phone_number,
                'bid_unique_id' => $bid_unique_id,
                'bid_start_time' => Carbon::now(),
                'item_unique_id' => $item_unique_id,
                'item_category' => $item_category
            ]);

        $new_bid->save();

        //Find and update lowest unique bid if bid is unique and lower than previous amount.        

        if($check_unique >= 1){
            //Bid is not unique
            $message = 'Sorry, your bid was neither unique or the lowest, please try again.';
            // $this->sendConfirmationSMS($phone_number, $message);  
            
            $all_other_bids = Bid::where('auction_id', $auction_id )
                            ->where('bid_amount', '<', $bid_amount)
                            ->orWhere('bid_amount','>',$bid_amount)
                            ->orderBy('bid_amount','asc')
                            ->select('bid_amount')                            
                            ->get();

            $arr = array();            
            
            $forget = $all_other_bids;

            foreach ($all_other_bids as $bids) {
               
                    array_push($arr, $bids->bid_amount);
               
            }
            
           
            $result = array_keys(array_filter(array_count_values($arr), function($v){
                return $v == 1;
            }));
            

            $lowest_next_unique = $result[0] ?? "";
                                                      
                                          
                if($lowest_next_unique == null){
                    //Doesn't exist
                    $update_lowest_unique_bid = DB::table('auction')
                    ->where('auction_id', $auction_id )                               
                    ->update([                                                                       
                    'lowest_unique_bidder' => 'None at the moment',
                    'lowest_unique_bid'     => 10000000                                                                
                    ]);
                    
                }else{

                    $next_unique_bidder = Bid::where('bid_amount','=',$lowest_next_unique)                                    
                                    ->select('bidder')
                                    ->first();
                    //Does exist
                    $update_lowest_unique_bid = DB::table('auction')
                    ->where('auction_id', $auction_id )                               
                    ->update([                                                                       
                    'lowest_unique_bidder' => $next_unique_bidder->bidder,
                    'lowest_unique_bid'     => $lowest_next_unique                                                              
                    ]);

                    Log::info('Updated to next lowest unique bid');
                }
                       
        }else{
            //Bid is unique
            if ($bid_amount < $lowest_unique_bid_amount) {
            //Bid is also lowest    
            $update_lowest_unique_bid = DB::table('auction')
                            ->where('auction_id', $auction_id )                               
                            ->update([                                                                       
                            'lowest_unique_bidder' => $phone_number,
                            'lowest_unique_bid'     => $bid_amount                                                                
            ]);
            $message = 'Congratulations '.$phone_number.', your bid of '.$bid_amount.' is both unique and the lowest bid. We shall inform you instanly if you are outbidded.';
            // $this->sendConfirmationSMS($phone_number, $message);
            Log::info('New Lowest Unique Bid');
            }else{
                //Bid is unique but higher than current lowest unique bid
                $message = 'Sorry'.$phone_number.', your bid of '.$bid_amount.' is unique but not the lowest bid. Please try again.';
            // $this->sendConfirmationSMS($phone_number, $message);
            Log::info('Unique but not lowest');
            }

        }   
       
        
        $update_auction = DB::table('auction')
                             ->where('auction_id', $auction_id )
                             ->increment('number_of_bids');
                                   

         $this->customerMpesaSTKPush($phone_number, $bid_amount);
         auth()->login($new_user);
        
        return redirect()->to('/dashboard-profile');
             
         }else{
        
        //======================    
        // user already exists
        //======================
         
            $new_bid = new Bid([
                'auction_id' => $auction_id,
                'bid_amount' =>$bid_amount,
                'bidder' => $phone_number,
                'item_name' => $item_name,
                'bid_unique_id' => $bid_unique_id,
                'bid_start_time' => Carbon::now(),
                'item_unique_id' => $item_unique_id,
                'item_category' => $item_category
            ]);

             $new_bid->save();

             //Find and update lowest unique bid if bid is unique and lower than previous amount.        

        if($check_unique >= 1){
            //Bid is not unique
            $message = 'Sorry, your bid was neither unique or the lowest, please try again.';
            // $this->sendConfirmationSMS($phone_number, $message);  
            
            $all_other_bids = Bid::where('auction_id', $auction_id )
                            ->where('bid_amount', '<', $bid_amount)
                            ->orWhere('bid_amount','>',$bid_amount)
                            ->orderBy('bid_amount','asc')
                            ->select('bid_amount')                            
                            ->get();

            $arr = array();            
            
            $forget = $all_other_bids;

            foreach ($all_other_bids as $bids) {
               
                    array_push($arr, $bids->bid_amount);
               
            }
            
           
            $result = array_keys(array_filter(array_count_values($arr), function($v){
                return $v == 1;
            }));
            

            $lowest_next_unique = $result[0] ?? "";
                                                      
                                          
                if($lowest_next_unique == null){
                    //Doesn't exist
                    $update_lowest_unique_bid = DB::table('auction')
                    ->where('auction_id', $auction_id )                               
                    ->update([                                                                       
                    'lowest_unique_bidder' => 'None at the moment',
                    'lowest_unique_bid'     => 10000000                                                                
                    ]);
                    
                }else{

                    $next_unique_bidder = Bid::where('bid_amount','=',$lowest_next_unique)                                    
                                    ->select('bidder')
                                    ->first();
                    //Does exist
                    $update_lowest_unique_bid = DB::table('auction')
                    ->where('auction_id', $auction_id )                               
                    ->update([                                                                       
                    'lowest_unique_bidder' => $next_unique_bidder->bidder,
                    'lowest_unique_bid'     => $lowest_next_unique                                                              
                    ]);

                    Log::info('Updated to next lowest unique bid');
                }
                       
        }else{
            //Bid is unique
            if ($bid_amount < $lowest_unique_bid_amount) {
            //Bid is also lowest    
            $update_lowest_unique_bid = DB::table('auction')
                            ->where('auction_id', $auction_id )                               
                            ->update([                                                                       
                            'lowest_unique_bidder' => $phone_number,
                            'lowest_unique_bid'     => $bid_amount                                                                
            ]);
            $message = 'Congratulations '.$phone_number.', your bid of '.$bid_amount.' is both unique and the lowest bid. We shall inform you instanly if you are outbidded.';
            // $this->sendConfirmationSMS($phone_number, $message);
            Log::info('New Lowest Unique Bid');
            }else{
                //Bid is unique but higher than current lowest unique bid
                $message = 'Sorry'.$phone_number.', your bid of '.$bid_amount.' is unique but not the lowest bid. Please try again.';
            // $this->sendConfirmationSMS($phone_number, $message);
            Log::info('Unique but not lowest');
            }

        }             

             $update_auction = DB::table('auction')
                                ->where('auction_id', $auction_id )
                                ->increment('number_of_bids');                                    

            $this->customerMpesaSTKPush($phone_number, $bid_amount);
            
            return redirect('/login');
        }

    }
}
