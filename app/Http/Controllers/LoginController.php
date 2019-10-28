<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Auth;
use App\users;
use Session;

class LoginController extends Controller
{
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $user = users::where('email', '=', $email)->first();
       
        if(!$user){
            Session::flash('error', 'Please enter the correct email');
            return redirect('/login');
        }
        if(!Hash::check($password, $user->password)){
            Session::flash('error', 'Please enter the correct password');
            return redirect('/login');
        }
        
        // start session section
        $request->session()->put('data', $email);
        $output = $request->session()->get('data');

        $datas = DB::table('users')->where('email', $output)->value('id');
        $request->session()->put('id', $datas);
       // end session section

        $user->last_login = now();

        $user->update();
        //Artisan::call('send:question');
        return redirect('welcome');
        
    }

    function logout(){
        Auth::logout();
       // $id = session('id');
        //$update = users::where('id',$id)
               // ->update(['last_login' => null]);
        return redirect('login');
    }
}
