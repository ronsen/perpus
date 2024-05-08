<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function store(Request $request): RedirectResponse
	{
		if (!Auth::attempt($request->only(['email', 'password']), true)) {
			throw ValidationException::withMessages([
				'email' => 'Invalid credentials'
			]);
		}

		session()->flash('status', 'Login success.');

		return redirect()->intended('/admin');
	}
}
