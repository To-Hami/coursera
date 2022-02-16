<?php

namespace App\Http\Requests\BackEnd\Messages;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'message' => ['required' ,'min:10' , 'max:500']
        ];
    }
}
