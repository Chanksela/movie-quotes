<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginValidationRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'username' => 'required|min:3|exists:users,username',
			'password' => 'required|min:6',
		];
	}

	public function messages()
	{
		return[
			'username.required'              => __('error.username_required'),
			'username.min'                   => __('error.username_min'),
			'username.exists'                => __('error.username_exists'),
			'password.required'              => __('error.password_required'),
			'password.min'                   => __('error.password_min'),
		];
	}
}