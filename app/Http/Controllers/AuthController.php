<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ], [
                'email.required' => 'Email must be filled!',
                'password.required' => 'Passowrd must be filled!'
            ]);

        Auth::attempt($request->only('email', 'password'));

        if (Auth::check()) {

            return redirect()->route('ticket');

        } else {
            return redirect()->back()->withErrors('Username or password is wrong!');
        }


    }

    public function register()
    {
        return view("pages.register");
    }

    public function createAccount(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'confirmPassword' => ['required'],
        ], [
                'name.required' => 'Name must be filled!',
                'email.required' => 'Email must be filled!',
                'password.required' => 'Password must be filled!',
                'confirmPassword.required' => 'Confirm Password must be filled!'
            ]);

        if ($request->password == $request->confirmPassword) {
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->save();

            return redirect()->back()->with('success', 'Successfully');

        } else {

            return redirect()->back()->with('failed', 'Password and Confirm Password must same!');

        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

}