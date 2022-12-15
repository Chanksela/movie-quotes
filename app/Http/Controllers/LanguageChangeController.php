<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageChangeController extends Controller
{
	public function change(string $locale): RedirectResponse
	{
		if (in_array($locale, config('app.avaiable_locale')))
		{
			session()->put('lang', $locale);
		}
		else
		{
			session()->put('lang', 'ka');
		}
		return redirect()->back();
	}
}