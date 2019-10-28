<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\users;
use App\user_answers;
use Validator;
use Exception;
use Session;

class ApiController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:25',
            'email'=>'required|string|email|max:255|unique:users',
            'phone'=>'required|unique:users',
            'password'=>'required|string|min:6'
        ]);

        if($validator->fails()){
           $error = $validator->messages();

           Session::flash('error', 'Registered failed');
           return redirect('/register');
        }
        $request->merge(['password' => Hash::make($request->password)]);

        try{
            $users = new users();

            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->phone = $request->input('phone');
            $users->password = $request->input('password');


            $users->save();
            Session::flash('success', 'Registered successfully');
            return redirect('/register');
        }
        catch(Exception $e){
            return response()->json([
                "error" => "could_not_register",
                "message" => "Unable to register user"
            ], 400);
        }
    }

    public function update(Request $request){
        $id = session('id');

        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:25',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6'
        ]);

        if($validator->fails()){
           return response()->json([
               "error" => 'validation_error',
               "message" => $validator->errors()
           ],422);
        }
        
        $request->merge(['password' => Hash::make($request->password)]);

        $user = users::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');

        $user->save();

        return back();
    }

    public function test()
    {
        event(new MessagePushed(1));
    }

    public function storeQuestion(Request $request){

        Schema::disableForeignKeyConstraints();

        $id = session('id');

        $userId = $request->user_id;

        $answers = $request->correct_answer;

        $user = users::find($userId);

        $points = $user->total_points;

        foreach ($answers as $key => $value) {
            if(!empty($value)){
                user_answers::create([
                    'u_id' => $id,
                    'q_id' => $value['id'],
                    'user_id' => $userId,
                    'user_answer' => $value['choosen_answer'],
                ]);

                if($value['difficulty'] == 'easy'){
                    $points += 1;
                } else if($value['difficulty'] == 'medium'){
                    $points += 2;
                } else {
                    $points += 3;
                }
            }
        }     

        $user->update(['total_points' => $points]);

        Schema::enableForeignKeyConstraints();

        return [
            'total_points' => $points
        ];

    }
}