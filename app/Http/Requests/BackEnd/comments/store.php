<?php

namespace App\Http\Requests\BackEnd\comments;

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
           'comment'=>['required','min:10'],
           'video_id'=>['required','integer']
        ];
    }
}
