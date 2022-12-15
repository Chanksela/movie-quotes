<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidationRequest;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
	public function login(LoginValidationRequest $request): RedirectResponse
	{
		if (auth()->attempt($request->validated()))
		{
			session()->flash('success', __('flash.login'));
			return redirect()->route('home');
		}
		return back()->withInput();
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		session()->flash('success', __('flash.logout'));
		return redirect()->route('home');
	}
}