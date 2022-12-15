<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMovieValidationRequest;
use App\Http\Requests\EditMovieValidationRequest;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminMovieController extends Controller
{
	public function index(Movie $movie): View
	{
		return view('admin.movie.index', ['movies'=>$movie->all()]);
	}

	public function store(AddMovieValidationRequest $request): RedirectResponse
	{
		$movie = Movie::create([
			'title'=> [
				'en'=> $request['title_en'],
				'ka'=> $request['title_ka'],
			],
			'slug'    => str_replace(
				' ',
				'_',
				strtolower(
					$request['title_en'],
				)
			),
		]);
		$movie->save();
		return redirect()->route('admin.movie.create')->with('success', __('flash.movie_add'));
	}

	public function edit(Movie $movie): View
	{
		return view('admin.movie.edit', ['movie'=>$movie]);
	}

	public function update(EditMovieValidationRequest $request, Movie $movie): RedirectResponse
	{
		$movie->setTranslations('title', [
			'en'=> $request['title_en'],
			'ka'=> $request['title_ka'],
		]);
		$movie['slug'] = str_replace(
			' ',
			'_',
			strtolower($request['title_en']),
		);
		$movie->save();
		return redirect()->route('home')->with('success', __('flash.movie_title_update'));
	}

	public function destroy(Movie $movie): RedirectResponse
	{
		$movie->delete();
		return back()->with('success', __('flash.movie_delete'));
	}
}