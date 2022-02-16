<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Messages\Store;
use App\Mail\ReplayContact;
use App\Models\Message;
use App\Models\video;
use Illuminate\Support\Facades\Mail;

class Messages extends BackEndController
{

    public function __construct(Message $model)
    {
        //  parent::__construct($model);
    }

    public function index()
    {
        $rows = Message::paginate(10);

        return view('back-end.messages.index', compact('rows'));

    }

    public function create()
    {
        return view('back-end.messages.create');
    }

    public function store(\App\Http\Requests\BackEnd\messages\store $request)
    {
        $rows =  Message::create($request->all());
        return redirect()->route('messages.index');
    }

    public function edit($id)
    {
        $row = Message::findOrFail($id);
        return view('back-end.messages.edit', compact('row'));
    }



    public function update($id, store $request)
    {
        $row = Message::findOrFail($id);
        $row->update($request->all());

        return redirect()->route('messages.index');
    }



    public function destroy($id)
    {

        $row = Message::findOrFail($id)->delete();
        return redirect()->route('messages.index');
    }

    public function replay($id, Store $request)
    {
        $message = Message::findOrFail($id);
        Mail::send(new ReplayContact($message, $request->message));
        return redirect()->route('messages.edit',$message->id);
    }
}
