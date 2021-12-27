<?php

namespace App\Http\Requests\website;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'first_name' => 'required|string|max:50',
            'second_name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'county' => 'required|string|max:50',
            'zip' => 'required|numeric',
            'title' => 'string|nullable|max:30',
            'education' => 'string|nullable|max:100',
            'note' => 'string|nullable|max:200'
        ];
    }

    public function attributes(){
        return [
            'title' => 'Titulus',
            'education' => 'Tanulmányok',
            'note' => 'Bemutató szöveg'
        ];
    }
}
