<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Categories\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Categories extends BackEndController
{


    public function index(Request $request)
    {


        $rows = Category::paginate(3);


        return view('back-end.categories.index', compact('rows'));
    }


    public function create()
    {
        return view('back-end.categories.create');
    }

    public function store(Store $request)
    {
       $rows =  Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $row = Category::findOrFail($id);
        return view('back-end.categories.edit', compact('row'));
    }



    public function update($id, store $request)
    {
        $row = Category::findOrFail($id);
        $row->update($request->all());

        return redirect()->route('categories.index');
    }



    public function destroy($id)
    {

        $row = Category::findOrFail($id)->delete();
        return redirect()->route('categories.index');
    }
}

