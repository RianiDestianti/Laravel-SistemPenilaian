<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Guru;
use App\Models\Murid;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

   public function login(Request $request)
{
    $request->validate([
        'identifier' => 'required',
        'password' => 'required',
    ]);

    $guru = Guru::where('nip', $request->identifier)->first();
    if ($guru && Hash::check($request->password, $guru->user->password)) {
        Auth::login($guru->user);
        return redirect()->intended('/dashboard/guru');
    }

    $murid = Murid::where('nis', $request->identifier)->first();
    if ($murid && Hash::check($request->password, $murid->user->password)) {
        Auth::login($murid->user);
        return redirect()->intended('/dashboard/murid');
    }

    $user = User::where('username', $request->identifier)->first();
    if ($user && $user->role === 'admin' && Hash::check($request->password, $user->password)) {
        Auth::login($user);
        return redirect()->intended('/dashboard/admin');
    }

    return back()->withErrors([
        'identifier' => 'NIP atau NIS atau password salah.',
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
