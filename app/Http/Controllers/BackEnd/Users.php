<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class Users extends BackEndController
{


    public function index(Request $request)
    {


        $rows = User::paginate(3);


        return view('back-end.users.index', compact('rows'));
    }


    public function create()
    {
        return view('back-end.users.create');
    }

    public function store(Store $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'group' => $request['group'],
            'password' => Hash::make($request['password'])
        ]);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $row = User::findOrFail($id);

        return view('back-end.users.edit', compact('row'));
    }

    public function update($id, Update $request)
    {
        $row = User::findOrFail($id);
        $requestArray = $request->all();


        if (isset($requestArray['password']) && $requestArray['password'] != '') {
            $requestArray['password'] = Hash::make($request['password']);

        } else {
            unset($requestArray['password']);
        }
        $row->update($requestArray);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {

        $row = User::findOrFail($id)->delete();
        return redirect()->route('users.index');
    }
}
