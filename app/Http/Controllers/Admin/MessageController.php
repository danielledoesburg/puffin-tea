<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $paginateNr = 15;

        if ($request->search) {            
            $messages = Message::search($request->search, $request->exact)->paginate($paginateNr);
        } else {
            $messages = Message::paginate($paginateNr);
        }

        return view('admin.messages.index', [
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for creating a new message.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.messages.create');
    }

    /**
     * Display the specified message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.messages.show', [
            'message' => Message::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.messages.edit', [
            'message' => Message::findOrFail($id)
        ]);
    }

    /**
     * Update the specified message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();

        $message = Message::find($id);
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;

        if ($message->isDirty()) $message->save();

        return redirect('/admin/messages/'.$id)->with('success', 'changes saved');
    }


    /**
     * Validate incoming message update data
     * 
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator (array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:1000'],
        ]);
    }

    /**
     * Remove the specified message from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::find($id)->delete();

        return redirect('/admin/messages')->with('success', 'message has been deleted.'); 
    }
}
