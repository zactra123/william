<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;
use App\QuestionNote;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    public function index(Request $request)
    {


        $messages = Message::orderBy('created_at', 'desc');
        if ($request->type == 'completed' || $request->type == 'pending'){
            $messages = $messages->where('completed', $request->type == 'completed');
        }

        if ($request->term) {
            $messages = $messages->whereRaw("`name` LIKE  '%". $request->term ."%'")
                            ->orWhereRaw("`phone_number` LIKE '%". $request->term ."%'");
        }
        $messages = $messages->paginate(5);
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
            'question'=> ['required', 'string'],

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
           return redirect()->route('admin.message.index');
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

    public function show(Request $request)
    {
        $id = $request->id;
        $message = Message::where('id', $id)->first();
        $notes = QuestionNote::where('message_id', $id)->get();

        $data = [
            'message' => $message,
            'notes' => $notes,
        ];

       echo json_encode(['success'=>1,'data'=>$data]);
       return;

    }
    public function messageCompleted(Request $request)
    {
        $messageId = $request->id;
        Message::where('id', $messageId)
            ->update(['completed' => 1]);

        return response()->json(['status' => 'success']);

    }

    public function addNote(Request $request)
    {
        $userId = Auth::user()->id;
        $note = $request->except('_token');
        $note['user_id'] = $userId;

        $validation = Validator::make($note, [
            'user_id' => ['required'],
            'message_id' => ['required'],
            'notes'=> ['required', 'string'],

        ]);

        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);

        }else{

            QuestionNote::create($note);
            return redirect()->route('admin.message.index');
        }



    }













}
