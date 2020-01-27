<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;

class MessagesController extends Controller
{
    public function index()
    {
       $messages = Message::paginate(5);
       return view ('admin.message.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $messages = Message::paginate(5);
        $userId = Auth::user()->id;
        $message = $request->except('_token');

        $validation = Validator::make($message, [
            'full_name' => ['required', 'string', 'max:255'],
            'call_date' => ['required'],
            'phone_number'=> ['required', 'string', 'max:255'],
            'question'=> ['required', 'string', 'max:255'],

        ]);


        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);

        }else{

            Message::create([
                'user_id' => $userId,
                'name' => $message['full_name'],
                'phone_number' => $message['phone_number'],
                'call_date' => $message['call_date'],
                'question' => $message['question'],
            ]);
            return view ('admin.message.index', compact('messages'));
        }

    }

    public function edit($id)
    {
        $message = Message::where('id', $id)->first();


        return view('admin.message.index', compact('message'));

    }

    public function update(Request $request, $id)
    {
        $userId = Auth::user()->id;
        $messages = Message::paginate(5);
        $message = $request->except('_token');

        $validation = Validator::make($message, [
            'full_name' => ['required', 'string', 'max:255'],
            'call_date' => ['required'],
            'phone_number'=> ['required', 'string', 'max:255'],
            'question'=> ['required', 'string', 'max:255'],

        ]);

        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);

        }else {
            if (!empty($message['answer'])) {
                $message['completed'] = true;
            }

            Message::where('id', $id)->where('user_id', $userId)->update($message);

            return view('admin.message.index', compact('messages'));
        }
    }

    public function show($id)
    {
            $message = Message::where('id', $id)->get();
            return ;

    }

    public function myMessage()
    {
        $userId = Auth::user()->id;

        $messages = Message::where('user_id', $userId)->paginate(5);
        return ;
    }









}
