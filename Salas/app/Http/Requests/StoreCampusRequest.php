<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreCampusRequest extends Request {

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
                'nombre' => 'required|between:3,25|alpha',
                'direccion' => 'required|between:3,25',
                'latitud' => 'required|numeric',
                'longitud' => 'required|numeric',
                'rut_encargado' => 'required|integer',
                'descripcion' => 'required|between:3,25'];
        }
	}

}
