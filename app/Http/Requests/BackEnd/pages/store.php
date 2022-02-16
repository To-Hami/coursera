<?php

namespace App\Http\Requests\BackEnd\pages;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'meta_keywords' => ['max:191'],
            'meta_des' => [ 'max:191',],
            'des' => ['required', 'min:10', ],
        ];
    }
}
