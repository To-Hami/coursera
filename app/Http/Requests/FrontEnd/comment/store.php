<?php

namespace App\Http\Requests\FrontEnd\comment;

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
            'comment'=>['required','min:10']
        ];
    }
}
