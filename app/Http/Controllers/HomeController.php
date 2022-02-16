<?php

namespace App\Http\Controllers;


use App\Http\Controllers\BackEnd\Comments;
use App\Http\Requests\FrontEnd\comment\store;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only([
            'commentUpdate', 'commentStore', 'profileUpdate'
        ]);
    }


    public function index(Request $request)
    {
        $videos = Video::all();
        $videos_count = $videos->count();
        $comments_count = Comment::count();
        $tags_count = Tag::count();


        if (request()->has('search') && request()->get('search') != '') {
            $videos = $videos->where('name',  request()->get('search') );
        }

           return view('home', compact('videos','videos_count','comments_count','tags_count'));
    }



    public function youWelcome(Request $request)
    {
        $videos = Video::all();
        $videos_count = $videos->count();
        $comments_count = Comment::count();
        $tags_count = Tag::count();
        if (request()->has('search') && request()->get('search') != '') {
            $videos = $videos->where('name',  request()->get('search') );
        }

        return view('welcome', compact('videos','videos_count','comments_count','tags_count'));
    }

    public function category($id)
    {
        $cat = Category::findOrFail($id);
        $videos = Video::where('cat_id', $id)->orderBy('id', 'desc')->paginate(30);
        return view('front-end.category.index', compact('videos', 'cat'));
    }

    public function video($id)
    {


        $skills = Video::with('skills')->findOrFail($id);
        $tags = Video::with('tags')->findOrFail($id);
        $allSkills = $skills->skills()->get();
        $allTags = $tags->tags()->get();
//        foreach ($allSkills as $theSkill) {
//            return $theSkill->name;
//
//        }
         $video = Video::with( 'cat' , 'user' , 'comments.user')->findOrFail($id);
          return  view('front-end.video.index' , compact('video','allSkills','allTags'));




    }

    public function skills($id)
    {
        $skill = Skill::findOrFail($id);
        $videos = Video::whereHas('skills', function ($query) use ($id) {
            $query->where('skill_id', $id);
        })->orderBy('id', 'desc')->paginate(30);
        return view('front-end.skill.index', compact('videos', 'skill'));
    }

    public function tags($id)
    {
        $tag = Tag::findOrFail($id);
        $videos = Video::whereHas('tags', function ($query) use ($id) {
            $query->where('tag_id', $id);
        })->orderBy('id', 'desc')->paginate(30);
        return view('front-end.tag.index', compact('videos', 'tag'));
    }


    /***********************************   comment   ********************************************/


    public function commentUpdate($id, store $request)
    {
        $comment = Comment::findOrFail($id);
        if (($comment->user_id == auth()->user()->id) || auth()->user()->group == 'admin') {
            $comment->update(['comment' => $request->comment]);
           // alert()->success('Your Comment Has Been Updated', 'Done');
        }
      //  alert()->error('we did not found this comment', 'Done');
        return redirect()->route('frontend.video', ['id' => $comment->video_id, '#commnets']);
    }


    /**************************** commentStore  ****************************************/


    public function commentStore($id, \App\Http\Requests\FrontEnd\comment\store $request)
    {
        $video = Video::findOrFail($id);
        Comment::create([
            'user_id' => auth()->user()->id,
            'video_id' => $video->id,
            'comment' => $request->comment
        ]);
     //   alert()->success('Your Comment Has Been Added', 'Done');
        return redirect()->route('frontend.video', ['id' => $video->id, '#commnets']);
    }

    /************************ Messages ************************************/



    public function messageStore(\App\Http\Requests\FrontEnd\Messages\Store $request)
    {
        Message::create($request->all());
      //  alert()->success('You message have been saved , we will call you n 24 hour', 'Done');
        return redirect()->route('home');
    }

    public function welcome()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(9);
        $videos_count = Video::count();
        $comments_count = Comment::count();
        $tags_count = Tag::count();
        return view('welcome', compact('videos', 'tags_count', 'comments_count', 'videos_count'));
    }

    public function page($id, $slug = null)
    {
        $page = Page::findOrFail($id);
        return view('front-end.page.index', compact('page'));
    }


    /***************************  profile   *******************************************/


    public function profile($id, $slug = null)
    {
        $user = User::findOrFail($id);
        return view('front-end.profile.index', compact('user'));
    }

    public function profileUpdate(\App\Http\Requests\FrontEnd\Users\Store $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $array = [];
        if ($request->email != $user->email) {
            $email = User::where('email', $request->email)->first();
            if ($email == null) {
                $array['email'] = $request->email;
            }
        }
        if ($request->name != $user->name) {
            $array['name'] = $request->name;
        }
        if ($request->password != '') {
            $array['password'] = Hash::make($request->password);
        }
        if (!empty($array)) {
            $user->update($array);
        }
//        alert()->success('Your Profile Has Been Updated', 'Done');
           return redirect()->route('front.profile', $user->id);
    }

}
