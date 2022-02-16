<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\skills\store;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\Request;

class Skills extends BackEndController
{


    public function index(Request $request)
    {


        $rows = Skill::paginate(3);


        return view('back-end.skills.index', compact('rows'));
    }


    public function create()
    {
        return view('back-end.skills.create');
    }

    public function store(Store $request)
    {
        $rows =  Skill::create($request->all());
        return redirect()->route('skills.index');
    }

    public function edit($id)
    {
        $row = Skill::findOrFail($id);
        return view('back-end.skills.edit', compact('row'));
    }

    public function update($id, store $request)
    {
        $row = Skill::findOrFail($id);
        $row->update($request->all());

        return redirect()->route('skills.index');
    }

    public function destroy($id)
    {

        $row = Skill::findOrFail($id)->delete();
        return redirect()->route('skills.index');
    }
}
