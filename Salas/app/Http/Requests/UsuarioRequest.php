<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request {

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
        switch($this->method()) {
            case 'POST':
                return [
                    'nombres' => 'required|between:3,25|alpha_space',
                    'apellidos' => 'required|between:3,80|alpha_space',
                    'rut' => 'required|numeric'
                ];
        }
	}

}
