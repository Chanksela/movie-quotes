<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddQuoteValidationController;
use App\Http\Requests\EditQuoteValidationRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminQuoteController extends Controller
{
	public function index(Movie $movie): View
	{
		return view('admin.quote.index', ['movies' => $movie->all()]);
	}

	public function create(Movie $movie): View
	{
		return view('admin.quote.create', ['movies'=>$movie->all()]);
	}

	public function store(AddQuoteValidationController $request): RedirectResponse
	{
		$quote = Quote::create([
			'movie_id' => $request['movie_id'],
			'body'     => [
				'en'=> $request['body_en'],
				'ka'=> $request['body_ka'],
			],
			'thumbnail'=> $request['thumbnail']->store('thumbnails'),
		]);
		$quote->save();
		return redirect()->route('home')->with('success', __('flash.quote_add'));
	}

	public function show(Movie $movie): View
	{
		return view('admin.quote.show', ['movie' => $movie, 'quotes'=>$movie->quotes]);
	}

	public function edit(Quote $quote): View
	{
		return view('admin.quote.edit', ['quote'=>$quote]);
	}

	public function update(EditQuoteValidationRequest $request, Quote $quote): RedirectResponse
	{
		if ($quote->getTranslation('body', 'en') === $request['body_en'] && $quote->getTranslation('body', 'ka') === $request['body_ka'] && $request['thumbnail'] === null)
		{
			return back()->with('fail', __('error.empty_inputs'));
		}

		$quote->setTranslations('body', [
			'en'=> $request['body_en'],
			'ka'=> $request['body_ka'],
		]);

		$request['thumbnail'] !== null && $quote['thumbnail'] = $request['thumbnail']->store('thumbnails');

		$quote->save();

		return redirect()->route('home')->with('success', __('flash.quote_update'));
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();
		return back()->with('success', __('flash.quote_delete'));
	}
}