<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;

use App\users;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function correct(){

       $s = session('id');

       $data = DB::table('user_answers')
               ->join('quiz_questions','user_answers.user_answer','=','quiz_questions.correct_answer')
                ->select(DB::raw("count(user_answers.q_id) as numero"))
                ->where('user_answers.u_id',$s)
                ->groupBy('user_answers.u_id')
                ->get();
        
        $rank = DB::table('total_score')
                ->join('users','total_score.user_id','=','users.id')
                ->select('users.name')
                ->orderBy('total_score.scores','desc')
                ->take(5)
                ->get();

        $point = DB::table('users')
                ->select('users.total_points')
                ->where('users.id','=', $s)
                ->get();

        return view('dashboard',compact('data','rank','point'));
    }

    function user_redirect(){
        $s = session('id');
        $data = DB::table('user_answers')
                ->select('user_answers.q_id')
                ->where('user_answers.u_id','=', $s)
                ->where('user_answers.q_id','<=',10)
                ->get();
        if(count($data) > 0){
            return redirect('dashboard');
        }
    }
    function run(){
        \Artisan::call('send:question');
        return redirect('/welcome');
    }

}
