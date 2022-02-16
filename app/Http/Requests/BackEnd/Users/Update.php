<?php

namespace App\Http\Requests\BackEnd\Users;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

                'name' => ['required', 'string', 'max:191'],
                'group' => ['required', 'string', 'max:191'],
                'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email,'.$this->user]

        ];
    }
}
