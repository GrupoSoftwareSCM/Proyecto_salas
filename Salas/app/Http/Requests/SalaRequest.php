<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalaRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'nombre' => 'required|string|between:3,25',
            'descripcion' => 'required|string|between:3,255'
		];
	}

}
