<?php

namespace App\Http\Requests\website;

use Illuminate\Foundation\Http\FormRequest;

class RegistrateRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string|max:50',
            'second_name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'county' => 'required|string|max:50',
            'zip' => 'required|numeric',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ];
    }
}
