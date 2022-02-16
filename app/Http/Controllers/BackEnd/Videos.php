<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\videos\store;
use App\Http\Requests\BackEnd\videos\Update;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\video;
use Illuminate\Http\Request;

class Videos extends BackEndController
{
use commentTrait;
    /***********************************  index  ***************************************************/


    public function index(Request $request)
    {

        $rows = video::with('user', 'cat')->paginate(3);

        return view('back-end.videos.index', compact('rows'));
    }


    /***********************************  create  ***************************************************/


    public function create()
    {
        $categories = Category::get();
        $skills = Skill::get();
        $tags = Tag::get();
        $selectedSkills = [];
        $selectedStags = [];
        return view('back-end.videos.create', compact('categories', 'skills', 'tags', 'selectedSkills', 'selectedStags'));
    }

    /***********************************  store  ***************************************************/


    public function store(Request $request)

    {
        $requestData = $request->except(['skills','tags']);
        $requestSync = $request->only(['skills','tags']);        $file = $request->file('image');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'),$fileName);


        $requestArray =['image' => $fileName,'user_id' => auth()->user()->id] + $requestData ;
        $row = video::create($requestArray);

//
        $this->syncSkillsTags($row, $requestSync);
//
//
        return redirect()->route('videos.index');
    }


    /***********************************  edit  ***************************************************/


    public function edit($id)
    {
        $row = Video::findOrFail($id);

        $categories = Category::get();
        $skills = Skill::get();
        $tags = Tag::get();
        $comments = Comment::get();
       // $myComments =$row::with('comments')->orderBy('id','desc')->with('user')->get();
        $selectedSkills = $row->skills()->get()->pluck('id')->toArray();
        $selectedStags = $row->tags()->get()->pluck('id')->toArray();

        return view('back-end.videos.edit', compact('row', 'categories', 'comments','skills', 'tags', 'selectedSkills', 'selectedStags'));
    }


    /***********************************  update  ***************************************************/


    public function update($id, Request $request)
    {
     // return $request;
      $row = video::findOrFail($request->user_id);
        $requestArray = $request->except(['skills','tags']);
        $requestSync = $request->only(['skills','tags']);




        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'),$fileName);
            $requestArray =['image' =>$fileName]+$requestArray;
        }
        $row->update($requestArray);
        $this->syncSkillsTags($row, $requestSync);

        return redirect()->route('videos.index');

    }


    /***********************************  destroy  ***************************************************/


    public function destroy($id)
    {

        $row = video::findOrFail($id)->delete();
        return redirect()->route('videos.index');
    }


    /***********************************  syncSkillsTags  ***************************************************/


    protected function syncSkillsTags($row, $requestArray)
    {
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $row->skills()->attach($requestArray['skills']);

        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $row->tags()->attach($requestArray['tags']);

        }
    }
}

