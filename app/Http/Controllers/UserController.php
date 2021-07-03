<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\pass_key;
use DB;
use Log;

class UserController extends Controller
{
    /**
     * Processes the login form
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     **/

     //===============
     //User Dashboard
     //===============
     public function dashboard(){
         $current_user_number = Auth::user()->phone_number;

         $active_bids_count = DB::table('bid')
         ->where('bidder','=',$current_user_number)
         ->where('bid_status', '=', 'active')
         ->count();

        $items_won= DB::table('winners')
        ->where('phone_number','=',$current_user_number)
        ->count();

         $alltime_bids = DB::table('bid')
         ->where('bidder','=',$current_user_number)
         ->count();

         $active_bids = DB::table('bid')
         ->where('bidder','=',$current_user_number)
         ->paginate(15);

         $won_bids = DB::table('bid')
         ->where('bidder','=',$current_user_number)
         ->where('bid_status','=','won')
         ->paginate(15);

         $bid_history = DB::table('bid')
         ->where('bidder','=',$current_user_number)
         ->paginate(15);


        return view('dashboard.dashboard',[
            //Counts
            'active_bids' => $active_bids_count,
            'items_won' => $items_won,
            'alltime_bids' => $alltime_bids,
            //Tables
            'active'     => $active_bids,
            'history'    => $bid_history,
            'won'        => $won_bids,
            'user' => Auth::user(),
        ]);
     }

     public function my_bids(){
        $current_user_number = Auth::user()->phone_number;

        $upcoming = DB::table('bid')
        ->select('*')
        ->where('bidder','=',$current_user_number)
        ->where('bid_status','=','active')
        ->get();

        $past = DB::table('bid')
        ->select('*')
        ->where('bidder','=',$current_user_number)
        ->where('bid_status','=','closed')
        ->get();


        return view('dashboard.dashboard-bids',[
            'upcoming' => $upcoming,
           'past' => $past,
            'user' => Auth::user(),
        ]);
     }


     //=================================
    //  End Of User Dashboard Function
    //==================================



    public function update(Request $request){

        $phone_number = $_POST['phone_number'];
        $name = $_POST['name'];
        $email = $_POST['email'];        
        

        $user = User::where('phone_number', '=', $phone_number)            
            ->update([
                'name' => $name,
                'email' => $email,                                                                                  
            ]);

            return redirect()->to('/dashboard-profile');

    }


    public function update_password(Request $request){
        $phone_number = $_POST['phone_number'];
        $password = Crypt::encrypt($_POST['password']);       

        $user = User::where('phone_number', '=', $phone_number)            
            ->update([
                'password' => $password,
                'first_pass_change' => true                                                                                            
            ]);


            return redirect()->to('/dashboard-profile');
    }


    //Create Admin Account
    public function create_admin(Request $request){
        $phone_number = $_POST['phone_number'];
        $phone_number = substr($phone_number, -9);
        $phone_number = 254 . $phone_number;
        $pass_key = $_POST['pass_key'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $bidder_unique_id= substr( bin2hex( random_bytes( 12 ) ),  0, 12 );       
        $password = Crypt::encrypt($phone_number. substr( bin2hex( random_bytes( 4 ) ),  0, 4 ));   


        $check = DB::table('pass_key')
        ->where('id', '=', 1)
        ->get();           

        if ($check = $pass_key) {

            $new_user = new User([
                'phone_number' => $phone_number,
                'email'        => $email,
                'name'         => $name,
                'password' => $password,
                'bidder_unique_id' => $bidder_unique_id,
                'role' => 'admin',
                'eligible' => true,           
            ]);

            $new_user->save();

            auth()->login($new_user);

            return redirect()->to('/dashboard-profile');

        } else {

            return redirect()->to('/create-admin');

        }

    }


    //Create Customer Care Account

    public function create_customer_care(Request $request){

        $phone_number = $_POST['phone_number'];
        $phone_number = substr($phone_number, -9);
        $phone_number = 254 . $phone_number;
        $pass_key = $_POST['pass_key'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $bidder_unique_id= substr( bin2hex( random_bytes( 12 ) ),  0, 12 );       
        $password = Crypt::encrypt($phone_number. substr( bin2hex( random_bytes( 4 ) ),  0, 4 ));    

        $check = DB::table('pass_key')
                ->where('id', '=', 1)
                ->get();           

            if ($check = $pass_key) {

                $new_user = new User([
                    'phone_number' => $phone_number,
                    'email'        => $email,
                    'name'         => $name,
                    'password' => $password,
                    'bidder_unique_id' => $bidder_unique_id,
                    'role' => 'customer_care',
                    'eligible' => true,           
                ]);

                $new_user->save();

                auth()->login($new_user);

                return redirect()->to('/dashboard-profile');

            } else {

                return redirect()->to('/create-customer-care');

            }

       
    }

}
