<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\Review;

class HomeController extends BaseController{
    
    public function home(){
        $reviews = Review::with('account')->get();
        
        return view('home', compact('reviews'));
    }

    public function pricing(){

        return view('pricing');
    }

}