<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\History;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ],[
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            History::create([
                'activity' => 'Melakukan Login',
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->intended('home');
        }
 
        return back()
        ->withInput()
        ->withErrors(['loginError' => 'Username dan Password tidak valid.']);
    }
    public function registerForm(){
        return view('register');
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'passwordconfirm' => 'required|same:password',
        ],[
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
            'passwordconfirm.required' => 'Konfirmasi Password harus diisi.',
            'passwordconfirm.same' => 'Konfirmasi Password tidak sama.',
        ]);
 
        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role_id' => 2,
        ]);
        History::create([
            'activity' => 'Membuat akun',
            'user_id' => $user->id,
        ]);
        return redirect('/');

    }
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
