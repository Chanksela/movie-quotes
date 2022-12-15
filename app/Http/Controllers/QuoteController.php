<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\View\View;

class QuoteController extends Controller
{
	public function index(): View
	{
		if (Quote::all()->isEmpty())
		{
			return view('emptyPage');
		}
		else
		{
			return view('quote', ['quote'=> Quote::all()->random()]);
		}
	}
}