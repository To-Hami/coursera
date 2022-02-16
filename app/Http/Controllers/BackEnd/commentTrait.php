<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\comments\store;
use App\Models\Comment;
use App\Models\video;
use Illuminate\Http\Request;

trait commentTrait
{
    public function commentsStore(store $request)
    {
        $requestArray= $request->all()+['user_id'=>auth()->user()->id,'video_id' => $request->video_id];

        Comment::create($requestArray);
        return  redirect()->route('videos.edit',$request->video_id);
    }

    public function commentDelete($id )
    {

       $row = Comment::findOrFail($id);
        $row->delete();
        return  redirect()->back();
    }

    public function commentUpdate($id , store $request)
    {

       $row = Comment::findOrFail($id);
        $row->update($request->all());
        return  redirect()->back();
    }
}
