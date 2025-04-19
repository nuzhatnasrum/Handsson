<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return $this->redirectBasedOnRole(Auth::user()->role);
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    
    public function showRegisterForm()
    {
        return view('auth.register');
    }

   
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'nullable|string|in:Owner,HR,Event Manager,Client,Volunteer', // Validate role input
        ]);

        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'Client',  
        ]);

        return redirect()->route('login');
    }

   
    public function redirectBasedOnRole($role)
    {
        switch (strtolower($role)) {  // Using strtolower for case-insensitive matching
            case 'owner':
                return redirect()->route('owner.dashboard');
            case 'hr':
                return redirect()->route('hr.dashboard');
            case 'event manager':
                return redirect()->route('event-manager.dashboard');
            case 'client':
                return redirect()->route('client.dashboard');
            case 'volunteer':
                return redirect()->route('volunteer.dashboard');
            default:
                return redirect()->route('home');
        }
    }

    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}


