<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Contracts\Validation\Rule;

class UserController extends Controller
{
    //Show Register/Create Form
    public function create() {
        return view('user.register');
    }

    //Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required, confirmed, min:6']
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        //Login
        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'User created and logged in!');
        }

       return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

    }
}
