<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Account;
use App\Models\Subscription;

class SignupController extends BaseController{
    
    public function signup(){

        return view('signup');
    }

    public function checkUsername($username){
        $account = Account::where("username", $username)->first();
        return ['exists' => $account ? true : false];
    }
    public function checkEmail($mail){
        $account = Account::where("email", $mail)->first();
        return ['exists' => $account ? true : false];
    }
    

    public function do_signup(Request $request)
{

    $request->validate([
        'username' => ['required', 'regex:/^[a-zA-Z0-9_]{1,15}$/', 'unique:accounts,username'],
        'password' => ['required', 'min:8'],
        'email' => ['required', 'email', 'unique:accounts,email']
    ], [
        'username.regex' => 'Username non valido',
        'username.unique' => 'Username già utilizzato',
        'password.min' => 'Caratteri password insufficienti',
        'email.email' => 'Email non valida',
        'email.unique' => 'Email già utilizzata'
    ]);

    /* 
            if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $request->username)) {
                $error['username'] = "Username non valido";
            } else {
                if(Account::where('username', $request->username)->first())
                {
                    $error['username'] = "Username già utilizzato";
                }
            }

            if (strlen($request->password) < 8) {
                $error['password'] = "Caratteri password insufficienti";
            } 

            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email non valida";
            } else {
                if(Account::where('email', $request->email)->first())
                {
                    $error['email'] = "Email già utilizzata";
                }
            } 
    */

    $password = password_hash($request->password, PASSWORD_BCRYPT);

    $account = new Account;
    $account->username = $request->username;
    $account->password = $password;
    $account->email = $request->email;
    $account->save();

    $subscription = new Subscription;
    $subscription->account_id = $account->id;
    $subscription->sub_name = 'Free';
    $subscription->plan_type = 'Monthly';
    $subscription->save();
    
    Session::put('account_id', $account->id);
    
    return redirect('/profile');
    }
}