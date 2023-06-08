<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('auth/index', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            $email = $request->email;
            $data = User::where('email',$email)->first();
            if ($data){
                Session::put('role_id',$data->role_id);
                return redirect('/dashboard');
            }else{

                return back()->with('loginError', 'Username atau password anda salah');
            }
        }
        return back()->with('loginError', 'Username atau password anda salah');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
