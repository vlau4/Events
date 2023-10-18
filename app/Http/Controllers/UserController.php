<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('roles.user.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
    
        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in.');
    }

    // Log User Out
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been loged out.');
    }

    // Show Login Form
    public function login(Request $request) {
        return view('roles.user.login');   
    }

    // Log In USer
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in.');
        }
        
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Manage Users
    public function manage() {
        return view('roles.admin.manage-users', ['users' => request()->user()->get()]);
    }

    // Edit User Role
    // public function edit() {
    //     return view('', ['users' => request()->user()->get()]);
    // }
}
