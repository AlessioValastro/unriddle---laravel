<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Account;

class LoginController extends BaseController{
    
    public function login(){
        if(Session::has('account_id')){
            return redirect('profile');
        }
        return view('login');
    }

    public function do_login(Request $request){
        $error = [];
        if(!empty($request->username) && !empty($request->password)){
            $account = Account::where('username', $request->username)->first();
            if(!$account){
                $error['username'] = "Username non trovato";
            } else {
                if(!password_verify($request->password, $account->password)){
                    $error['password'] = "Password errata";
                }
            }
        } else {
            $error['username'] = "Inserisci username e password";
        }

        if(count($error) == 0){
            Session::put('account_id', $account->id);
            return redirect('profile');
        } else {
            return redirect('login')->withInput()->withErrors($error);
        }
    }
}