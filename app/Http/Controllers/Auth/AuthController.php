<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.login');
    }  

    public function registration()
    {
        return view('login.registration');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        try{
            $credentials = $request->only('email', 'password');
        
            if (Auth::attempt($credentials)) {
                return redirect()->intended('dashboard')
                            ->with('success','You have Successfully logged-in');
            }
    
            return redirect("login")->with('error','Opps! You have entered invalid credentials');
        }catch(\Exception $e){

            return Redirect::back()->with('error',$e->getMessage());

        }
    }
      
    public function postRegistration(Request $request)
    {  
        
            $request->validate([
                'name' => 'required',
                'number' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
        try{
            \DB::beginTransaction();

            $input = $request->all();
    
            \App\Models\User::store($input);

            \DB::commit();

            return redirect("login")->with('success','You have Successfully Registered');
        }catch(\Exception $e){
            \DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
        
    }

    public function dashboard()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
  

        return redirect("login")->with('error','Opps! You do not have access');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('login');
    }

}
