<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMovieValidationRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'title_en'     => 'required|unique:movies,title->en',
			'title_ka'     => 'required|unique:movies,title->ka',
		];
	}

	public function messages()
	{
		return[
			'title_en.required'  => __('error.title_en_required'),
			'title_ka.required'  => __('error.title_ka_required'),
			'title_en.unique'    => __('error.title_en_unique'),
			'title_ka.unique'    => __('error.title_ka_unique'),
		];
	}
}
