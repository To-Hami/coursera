<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\tags\store;
use App\Models\Tag;
use Illuminate\Http\Request;

class Tags extends BackEndController
{


    public function index(Request $request)
    {


        $rows = Tag::paginate(3);


        return view('back-end.tags.index', compact('rows'));
    }


    public function create()
    {
        return view('back-end.tags.create');
    }

    public function store(Store $request)
    {
        $rows =  Tag::create($request->all());
        return redirect()->route('tags.index');
    }

    public function edit($id)
    {
        $row = Tag::findOrFail($id);
        return view('back-end.tags.edit', compact('row'));
    }

    public function update($id, store $request)
    {
        $row = Tag::findOrFail($id);
        $row->update($request->all());

        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {

        $row = Tag::findOrFail($id)->delete();
        return redirect()->route('tags.index');
    }
}
