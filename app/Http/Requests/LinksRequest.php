<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinksRequest extends FormRequest
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
            'link' => 'required | min:5',
        ];
    }

    public function messages()
    {
        return [
            'link.required' => 'Необходимо заполнить поле :attribute',
            'link.min' => 'Некорректное заполнения поля :attribute',

        ];

    }

    public function attributes()
    {
        return [
            'link' => 'Ресурс',

        ];

    }
}
