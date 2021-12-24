<?php

namespace App\Http\Requests\website;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePoemRequest extends FormRequest
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
            'category' => 'required',
            'text' => 'required|min:30',
            'title' => 'required',
        ];
    }

    public function attributes(){
        return [
            'category' => 'Kategória',
            'title' => 'Cím',
            'text' => 'Versszöveg'
        ];
    }
}
