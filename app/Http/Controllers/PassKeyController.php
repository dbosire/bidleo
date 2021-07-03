<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\pass_key;

use Log;
use DB;

class PassKeyController extends Controller
{
    public function generate_pass_key(){

        $pass_hash = substr( bin2hex( random_bytes( 8 ) ),  0, 8 );
        $pass_key = 'bidleo-'. $pass_hash; 

        if($pass_key!=='') {
            $check = DB::table('pass_key')
                ->where('id', '=', 1)
                ->count();
            if ($check >= 1) {
                pass_key::where('id',1)
                    ->update(['pass_key'=>$pass_key]);
            } else {

                $pass_key = new pass_key([
                    'pass_key' => $pass_key
                ]);
                $pass_key->save();
            }


        }

        return $pass_key;
    }
}
