<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AccountController extends BaseController{
    
    public function deleteAccount(){
        $account = Account::find(Session::get('account_id'));

        if (!$account) {
            return response("Account not found.", 404);
        }
        Session::forget('account_id');
        Session::flush();
        $account->delete();

        return redirect('/signup');
    }
    public function modifyAccount($par){
        return view('modify-account')->with('par', $par);
    }
    public function changeUsername(Request $request){
        $username = $request->username;
        $account =  Account::find(Session::get('account_id'));

        if (empty($username) || !preg_match('/^[a-zA-Z0-9_]{1,15}$/', $username)) {
            return redirect('modify-account/username')->withErrors(['username' => 'Username non valido']);
        }
    
        $existingAccount = Account::where('username', $username)->first();
        if ($existingAccount) {
            return redirect('modify-account/username')->withErrors(['username' => 'Username già utilizzato']);
        }

        if($account){
            $account->username = $request->username;
            $account->save();
        }
        return redirect('profile');
    }
    public function changePassword(Request $request){
        $account =  Account::find(Session::get('account_id'));
        $password = $request->password;
        if (empty($password) || strlen($password) < 8) {
            return redirect('modify-account/password')->withErrors(['password' => 'Password non valida']);
        }
        if($account){
            $password = bcrypt($request->password);
            $account->password = $password;
            $account->save();
        }
        return redirect('profile');
    }


}