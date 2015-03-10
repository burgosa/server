<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;


class UpdateCityRequest extends Request {

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

			'slug' => 'required|max:90|unique:cities,slug,'.$this->segment(2),
			'name' => 'required|max:90|unique:cities,name,'.$this->segment(2)

		];
	}

}
