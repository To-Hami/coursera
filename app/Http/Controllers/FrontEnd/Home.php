<?php

namespace App\Http\Controllers\FrontEnd;


class Home extends FrontEndController
{
    public function  index (){
        return view('front-end.landing');
    }
}
