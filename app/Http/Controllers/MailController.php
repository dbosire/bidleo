<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WinnerMail;
use App\Mail\SigninEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_mail(){
        $data = [
            'name'           => 'Calvin',
            'phone_number'   => '254741925996',
            'item_name'      => 'Voucher',
            'item_unique_id' => 'JgE20',
            'bid_amount'     => '1,100',
            'date'           => Carbon::now()
        ];

        Mail::to(users:'calvinmagezi@ymail.com')->send(new WinnerMail($data));
    }
}
