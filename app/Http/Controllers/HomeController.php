<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Bid;
use App\Models\User;
use DB;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $item = Item::All();

        return view('welcome',['item' => $item]);
    }
}
