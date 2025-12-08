<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function ShowSignUp()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return (view('auth.login'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->WithErrors(['email', 'Invalid credentials'])->withInput();

    }
    public function SignUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $eleveController = new EleveController();
        $user = $eleveController->create($request);
        Mail::to($user->email)->send(new WelcomeEmail($user));
        return redirect()->route('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function showDashboard()
    {
        $user = Auth::user();
        $users = User::all();
        return view('dashboard', ['user' => $user, 'users' => $users]);
    }

}
