<?php
namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\Review;

class HomeController extends BaseController{
    
    public function home(){
        $reviews = Review::all();
        $account = Session::get('account_id');
            
        return view('home')
            ->with("reviews", $reviews)
            ->with('account', $account);
    }

    public function pricing(){

        $account = Session::get('account_id');
        return view('pricing')
        ->with('account', $account);
    }

}