<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\Comment;

class Home extends BackEndController
{
//    public function  index (){
//        return view('back-end.home');
//    }

    public function index(){
        $comments = Comment::with('user' , 'video')->orderby('id' , 'desc')->paginate(20);
        return view('back-end.home' , compact('comments'));
    }
}
