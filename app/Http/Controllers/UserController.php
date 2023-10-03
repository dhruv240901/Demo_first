<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
class UserController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function customsignup(Request $request){
        $checkemailunique=User::where('email',$request->email)->first();
        if($checkemailunique==null){
            $validated = $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required|min:6',
            ]);
            $insertdata=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ];

            User::create($insertdata);
            return redirect('/')->with('success','Account created successfully');
        }
        else{
            return redirect('/signup')->with('error','Email Id already exists');
        }
    }

    public function login(){
        return view('login');
    }

    public function customlogin(Request $request){
        $validation =  $request->validate([
            'email' => 'required|email',
            'password' =>'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $user_details = auth()->user();
            return redirect('/')->with('success', 'Signed in successfully');
        }

        return redirect("/login")->with('error','Invalid email or password.');
    }

    public function logout(){
        auth()->logout();
        return redirect("/");
    }
}
