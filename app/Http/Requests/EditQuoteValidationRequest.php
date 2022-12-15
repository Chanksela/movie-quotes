<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditQuoteValidationRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			// 'body_en'  => 'required|min:3|unique:quotes,body->en',
			// 'body_ka'  => 'required|min:3|unique:quotes,body->ka',
			// 'thumbnail'=> 'nullable|image',
			'body_en'  => 'required|min:3|',
			'body_ka'  => 'required|min:3|',
			'thumbnail'=> 'nullable|image',
		];
	}

	public function messages()
	{
		return[
			'body_en.required'     => __('error.body_en_required'),
			'body_ka.required'     => __('error.body_ka_required'),
			'body_en.min'          => __('error.body_en_min'),
			'body_ka.min'          => __('error.body_ka_min'),
			'body_en.unique'       => __('error.body_en_unique'),
			'body_ka.unique'       => __('error.body_ka_unique'),
			'thumbnail.image'      => __('error.thumbnail_image'),
		];
	}
}