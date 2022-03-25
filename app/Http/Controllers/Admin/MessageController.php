<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $paginateNr = 10;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.messages.show', [
            'message' => Message::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.messages.edit', [
            'message' => Message::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();

        Message::find($id)
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
