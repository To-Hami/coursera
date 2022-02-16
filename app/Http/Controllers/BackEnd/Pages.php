<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\pages\store;
use App\Models\Page;
use Illuminate\Http\Request;

class Pages extends BackEndController
{


    public function index(Request $request)
    {


        $rows = Page::paginate(3);


        return view('back-end.pages.index', compact('rows'));
    }


    public function create()
    {
        return view('back-end.pages.create');
    }

    public function store(Store $request)
    {
        $rows =  Page::create($request->all());
        return redirect()->route('pages.index');
    }

    public function edit($id)
    {
        $row = Page::findOrFail($id);
        return view('back-end.pages.edit', compact('row'));
    }

    public function update($id, store $request)
    {
        $row = Page::findOrFail($id);
        $row->update($request->all());

        return redirect()->route('pages.index');
    }

    public function destroy($id)
    {

        $row = Page::findOrFail($id)->delete();
        return redirect()->route('pages.index');
    }
}
