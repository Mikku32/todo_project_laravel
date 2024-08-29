<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public $name, $email, $password, $password_confirmation;
    public function registerStore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Successfull');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }
        return redirect()->route('login')->with('error', 'Invalid email or password');

        // $request->addError('email', 'Invalid email');
        // $request->addError('password', 'Invalid password');


    }
    public function logout(Request $request)
    {
        auth()->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
