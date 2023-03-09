<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function show(): View
    {
        return view('front/login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        //autentifikavimo logika
        if (Auth::attempt($data, $request->get('remember'))) {
            $request->session()->regenerate();

            return redirect(route('profile'));
        }

        return back()->withErrors(['email' => 'Invalid data provided']);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
