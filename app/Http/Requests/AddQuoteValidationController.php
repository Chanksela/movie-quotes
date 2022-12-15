<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddQuoteValidationController extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return[
			'movie_id'    => 'required',
			'body_en'     => 'required|min:3|unique:quotes,body->en',
			'body_ka'     => 'required|min:3|unique:quotes,body->ka',
			'thumbnail'   => 'required|image',
		];
	}

	public function messages()
	{
		return[
			'movie_id.required'    => __('error.movie_id_required'),
			'body_en.required'     => __('error.body_en_required'),
			'body_ka.required'     => __('error.body_ka_required'),
			'body_en.unique'       => __('error.body_en_unique'),
			'body_ka.unique'       => __('error.body_ka_unique'),
			'body_en.min'          => __('error.body_en_min'),
			'body_ka.min'          => __('error.body_ka_min'),
			'thumbnail.required'   => __('error.thumbnail_required'),
			'thumbnail.image'      => __('error.thumbnail_image'),
		];
	}
}
