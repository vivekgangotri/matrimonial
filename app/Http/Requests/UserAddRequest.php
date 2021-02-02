<?php

/*
* UserAddRequest.php - Request file
*
* This file is part of the Company component.
*-----------------------------------------------------------------------------*/

namespace App\Http\Requests;

use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserAddRequest extends FormRequest
{

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
     * Get the validation rules that apply to the user register request.
     *
     * @return bool
     *-----------------------------------------------------------------------*/
    public function rules()
    {
        return [
			'name' 			=> 'required|min:6|max:255',
			'email' 		=> 'required',
			'password' 		=> 'required',
        ];
    }

    // public function messages()
    // {
   	// 	return [
   	// 		'name.required' => "Name is empty. please enter your name"
   	// 	];
    // }
}
