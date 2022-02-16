<?php

namespace App\Http\Requests\BackEnd\videos;

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
            'meta_keywords' => ['max:191'],
            'meta_des' => [ 'max:191',],
            'des' => ['required', 'min:10', ],
            'cat_id' => ['required', 'integer'],
            'published' => ['required', ],
            'youtube'  => ['required', 'url', ],
            'image'  => ['image','nullable' ],
        ];
    }
}
