<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
  public function showRegister()
  {
    return view('auth.register');
  }

  public function register(Request $request)
  {
    $validated = $request->validate([
      'name' => ['required', 'string', 'max:100'],
      'email' => ['required', 'email', 'max:120', 'unique:users'],
      'phone' => ['required', 'string', 'max:30'],
      'password' => ['required', 'min:6', 'confirmed', 'max:255'],
      'agree' => ['required', 'accepted'],
    ]);

    $user = User::create([
      'name' => $validated['name'],
      'email' => $validated['email'],
      'phone' => $validated['phone'],
      'password' => Hash::make($validated['password']),
      'role' => 'user',
    ]);

    Auth::login($user);
    return redirect()->route('dashboard')->with('success', 'Registrasi berhasil! Selamat datang.');
  }
}
