<?php

namespace App\Http\Requests\website;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            'text' => 'required',
            'title' => 'required',
        ];
    }

    public function attributes(){
        return [
            'title' => 'Probléma megnevezése',
            'text' => 'Probléma leírás'
        ];
    }
}
