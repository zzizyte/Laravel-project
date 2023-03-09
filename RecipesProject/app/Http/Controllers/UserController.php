<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(): View|RedirectResponse
    {
        return view('user/show', ['user' => Auth::user()]);
    }
    public function register(): View
    {
        return view('user/register');
    }
    public function store (Request $request): RedirectResponse
    {
    $request->validate(
       [  'name' => 'required|string',
           'email' => 'required|unique:users,email',
           'password' => ['required', 'confirmed', Password::min(8)->mixedCase()],
    ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
    return redirect('profile')
        ->with('success', 'User created successfully');
    }
}
