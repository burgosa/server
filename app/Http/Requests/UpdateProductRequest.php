<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;


class UpdateProductRequest extends Request {

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

			'description' => 'max:255',
			'slug' => 'required|max:90|unique:products,slug,'.$this->segment(3),
			'name' => 'required|max:90|unique:products,name,'.$this->segment(3)

		];
	}

}
