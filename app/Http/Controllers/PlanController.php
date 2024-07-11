<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Subscription;
use App\Models\Plan;

class PlanController extends BaseController{
    
    public function auth($plan_name){
        if(Session::has('account_id')){
            $account = Account::find(Session::get('account_id'));
            $username = $account->username;
            $plan = Plan::where('name', $plan_name)->first();
            $ex_sub = Subscription::where("account_id", Session::get('account_id'))->first();
            $ex_plan = Plan::where('name', $ex_sub->sub_name)->first();
            
            return view('checkout')
                ->with("plan", $plan)
                ->with("username", $username)
                ->with("ex_plan", $ex_plan);
        }
        return view('login');
    }
    public function payment(Request $request){
    
        $account = Account::find(Session::get("account_id"));
        $plan = $request->input('plan_name');

        $existingSubscription = Subscription::where('account_id', $account->id)->first();
    
        if ($existingSubscription) {
                $existingSubscription->delete();
        } 

        $subscription = new Subscription;
        $subscription->account_id = $account->id;
        $subscription->sub_name = $plan;
        $subscription->plan_type = 'Monthly';
        $subscription->save();

        return redirect("profile");
    }
}