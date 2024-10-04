<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            return redirect()->route('dashboard');
        }

        // Jika login gagal
        return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();  // Invalidasi session
        session()->regenerateToken();  // Regenerasi CSRF token

        return redirect('/');
    }


    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'phone' => 'required',
        'address' => 'required',
        'last_education' => 'required',
        'work_history' => 'required',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cv' => 'required|mimes:pdf|max:2048'
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->last_education = $request->last_education;
    $user->work_history = $request->work_history;
    $user->photo = $request->file('photo')->store('public/photos');
    $user->cv = $request->file('cv')->store('public/cvs');
    $user->save();

    Auth::login($user);

    return redirect()->route('dashboard')->with('success', 'Registration successful. Welcome!');
}
}
