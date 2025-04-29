<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirm' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'credentials' => 'Netocni podaci. Molimo pokusajte ponovo.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        return redirect()->route('login');
    }
}
