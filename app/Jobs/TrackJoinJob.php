<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Models\QuizAnswers;
use App\Models\DisplayedQuestions;
use App\Models\Participant;
use App\Models\EligibleParticipant;
use App\Http\Controllers\Mpesa\MpesaController;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Sms\SmsController;

class TrackJoinJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $requestLog;

    public function __construct(Request $request)
    {
        
        //Get the request parameters
        $mytime = Carbon::now();

      //  Log::info("Job 2 executed");
         $this->requestLog = [
             'URI'           => $request->getUri(),
             'METHOD'        => $request->getMethod(),
             'REQUEST_BODY'  => $request->all() //,
             //'RESPONSE'      => $response->getContent()
         ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         //
        //
        //$json_response  = json_encode( $this->requestLog );
        //$join_arr       = json_decode( $this->requestLog, true );
        //	Log::info("TrackJoinJob3:RequestParams:".json_encode($this->requestLog));
	     $join_arr = $this->requestLog;

         //	Log::info("ResponseParams:".$join_arr);
    
            $params  =$join_arr['REQUEST_BODY']['requestParam']['data'];
            $request_type = "";
            foreach($params as $data){
                $val =  $data['name'];
                if($val == 'Type'){
                    $request_type = $data['value'];
                }
            }
    
             Log::info("TrackAnswerBidJob1: RequestType: ".$request_type);
    
            if($request_type == 'NOTIFY_LINKID'){
    
            $request_id             = $join_arr['REQUEST_BODY']['requestId'];
            $timestamp              = $join_arr['REQUEST_BODY']['requestTimeStamp'];
            $LinkId                 = $join_arr['REQUEST_BODY']['requestParam']['data']['0']['value'];
            $OfferCode              = $join_arr['REQUEST_BODY']['requestParam']['data']['1']['value'];
            $RefernceId             = $join_arr['REQUEST_BODY']['requestParam']['data']['2']['value'];
            $ClientTransactionId    = $join_arr['REQUEST_BODY']['requestParam']['data']['3']['value'];
            $channel                = $join_arr['REQUEST_BODY']['requestParam']['data']['5']['value'];
            $Type                   = $join_arr['REQUEST_BODY']['requestParam']['data']['6']['value'];
            $answer                 = $join_arr['REQUEST_BODY']['requestParam']['data']['7']['value'];
            $phone_number           = $join_arr['REQUEST_BODY']['requestParam']['data']['8']['value'];
    
            //strip answer into digit and char
        if(strtoupper(trim($answer)) == 'JOIN' || strtoupper(trim($answer)) == 'PLAY'){
            //Check If already Exists
            $eligible = DB::table( 'eligible_participants' )
                    ->where('phone_number', '=', $phone_number)
                    ->where('eligible', '=', 1)->count();
    
            
            if($eligible == 0){
                    //This is a fresh join, so let us delete the data that was there before, if any.
                    $del_participant = DB::table('participants')->where('phone_number', $phone_number)->delete();
                    $del_participant2 = DB::table('eligible_participants')->where('phone_number', $phone_number)->delete();
    
                    $participant_id = substr( bin2hex( random_bytes( 12 ) ),  0, 12 );
    
                    $participant = new Participant([
                        'phone_number'          => $phone_number,
                        'participant_unique_id' => $participant_id,
                        'request_timestamp'     => $timestamp,
                    ]);
    
                    $participant->save();
    
                    //save participant id in the eligible participants table
    
                    $eligible_participant = new EligibleParticipant([
                        'eligible_participant_id' => $participant_id,
                        'phone_number'            => $phone_number,
                        //'eligible'            	  => true,
                    ]);
    
                    $eligible_participant->save();
    
                    //$message = "We have received your enrollment for the The Big Quiz Show. We will send you an M-Pesa push notification to join this weeks quiz.";
                    $message ='Your enrollment received. You will receive M-Pesa STK to pay to join this week quiz.If it fails, use PayBill 4060000, Account as '.$phone_number.' and amount Ksh 50';
    
                    //$message = 'You have successfully enrolled for Episode 5 of The Big Quiz Show this Sunday. Stay Tuned to KTN Home at 8pm and participate for a chance to win.';
                    $smsController = new SmsController();
                    $smsController->sendSms($phone_number,$message, $LinkId,$OfferCode,$channel);
                    
    
                    $mpesaController = new MpesaController();
    
                    $mpesaController->customerMpesaSTKPush( $phone_number, $participant_id );
    
            }else{
                $message = "You are already enrolled for the service.";
                        $smsController = new SmsController();
                        $smsController->sendSms($phone_number,$message, $LinkId, $OfferCode,$channel);
            }
     Log::info("Registration Job2: Phone:".$phone_number."|request_id:".$request_id."|timestamp:".$timestamp."|LinkId:".$LinkId."|OfferCode:".$OfferCode."|answer:".$answer);
        }else{
            //Check If already Exists
          
            $eligible = DB::table( 'eligible_participants' )
                    ->where('phone_number', '=', $phone_number)
                    ->where('eligible', '=', 1)->count();
    
            
    
                $smsController = new SmsController();
                $smsController->sendSms($phone_number,$message,$LinkId,$OfferCode,$channel); 
    Log::info("ReceivedAnswer-Not Registered Job2: Phone:".$phone_number."|request_id:".$request_id."|timestamp:".$timestamp."|LinkId:".$LinkId."|OfferCode:".$OfferCode."|answer:".$answer);
    
            }else{
    
                $displayed_question_id = preg_replace('/[A-Z]+/', '', $answer);
                $displayed_question_id = intval( $displayed_question_id );
                $actual_answer         = preg_replace('/[0-9]+/', '', $answer);
                $actual_answer         = strtoupper($actual_answer);
    
          //      Log::info("ReceivedAnswer: Phone:".$phone_number.",Question:".$displayed_question_id.",Answer:".$actual_answer);
    
            Log::info("ReceivedAnswer Job2: Phone:".$phone_number."|Question:".$displayed_question_id."|Answer:".$actual_answer."|request_id:".$request_id."|timestamp:".$timestamp."|LinkId:".$LinkId."|OfferCode:".$OfferCode."|answer:".$answer);
                $ans_f = DB::table('displayed_questions')
                ->join( 'quiz_questions','displayed_questions.question_id','=','quiz_questions.id' )
                ->select('quiz_questions.answer')
                ->get();
    
                if ( $ans_f !== $actual_answer ){
                    // echo 'answers dont match';
                    $correct_flag = false;
                 }
                 else{
                    // echo 'you are correct';
                    $correct_flag = true;
                 }
    
                $quiz_answer = new QuizAnswers([
    
                    'request_id'            => $request_id,
                    'request_timestamp'     => $timestamp,
                    'link_id'               => $LinkId,
                    'offer_code'            => $OfferCode,
                    'reference_id'          => $RefernceId,
                    'client_transaction_id' => $ClientTransactionId,
                    'type'                  => $Type,
                    'user_data'             => $answer,
                    'displayed_question_id' => $displayed_question_id,
                    'displayed_question_id' => $displayed_question_id,
                    'answer'                => $actual_answer,
                    'correct_flag'          => $correct_flag,
                    'phone_number'          => $phone_number,
                ]);
    
                $quiz_answer->save();
                
    
            }
    
    
            }
        }
    
    }
}
