<?php
namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\Review;

class HomeController extends BaseController{
    
    public function home(){
        $reviews = Review::all();
            
        return view('home')->with("reviews", $reviews)->with('account', Session::get('account_id'));
    }

    public function pricing(){

        return view('pricing');
    }

}