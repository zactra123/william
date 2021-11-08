<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\HomePageContent;
use App\MessageHistory;
use App\QuestionNote;
use App\Message;
use App\User;
use App\Todo;
use Response;
use Auth;

class MessagesController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['auth', 'receptionist']);
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $admins = User::where('role', 'admin')->get()->pluck('full_name', 'id');

        if(request()->ajax())
        {
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');

            $messages = Message::whereDate('call_date', '>=', $start)->get();
            if ($request->type == 'completed' || $request->type == 'pending'){
                $messages = $messages->where('completed', $request->type == 'completed');
            }
            $data =[];

            foreach($messages as $message){
                $data[]=[
                    'id'=>$message->id,
                    'title'=>$message->title,
                    'start'=>$message->call_date,
                    'end'=>$message->call_date
                ];
            }
            return Response::json($data);
        }

        return view('receptionist.message.index',compact('admins'));
    }

    public function show($id)
    {
        $message = Message::find($id)->toArray();
        $note= QuestionNote::where('message_id', $id)->get()->toArray();
        if (empty($message)) {
            return Response::json(["error" => "Not Found"], 404);
        }
        $data= [
            "message" => $message,
            "note" => $note
        ];

        return Response::json($data);
    }

    public function create(Request $request)
    {
        $insertArr = [
            'name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'time' => $request->time,
            'title'=> $request->title,
            'start_date' => $request->start_date,
            'description' => $request->description,
        ];

        $validation = Validator::make($insertArr, [
            'start_date' => ['required'],
            'time' =>['required'],
            'title' => ['required'],
            'description'=> ['required'],
            'phone_number'=> ['required'],
        ]);

        if ($validation->fails()) {
            return Response::json(["error"=>"All fields are required"], 400);
        }else {
            $insertArr['user_id']= $request->admin_id?$request->admin_id: Auth::user()->id;
            $insertArr['email'] = $request->email?$request->email:null;
            $insertArr["call_date"] = $insertArr["start_date"] . " " . $insertArr["time"];

            $message = Message::create($insertArr);
            return Response::json($message);
        }

    }

    public function update(Request $request)
    {
        $insertArr = [
            'name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'title'=> $request->title,
            'description' => $request->description,
        ];

        $validation = Validator::make($insertArr, [
            'title' => ['required'],
            'description'=> ['required'],
            'phone_number'=> ['required'],
        ]);

        if ($validation->fails()) {
            return Response::json(["error"=>"All fields are required"], 400);

        }else {
            $insertArr['user_id']= $request->admin_id?$request->admin_id: Auth::user()->id;
            $insertArr['email'] = $request->email?$request->email:null;
            $insertArr["call_date"] = $request->date . " " . $request->time;
            $messageHistory = Message::where('id', $request->id)->first()->toArray();
            $messageHistory['message_id'] = $messageHistory['id'];
            unset($messageHistory['id']);
            MessageHistory::create($messageHistory);
            $message = Message::where('id', $request->id)->update($insertArr);
            return Response::json($message);
        }

    }

    public function destroy($id)
    {
        if ($messageHistory = Message::where('id', $id)->first()) {
            $messageHistory = $messageHistory->toArray();
            $messageHistory['message_id'] = $messageHistory['id'];
            unset($messageHistory['id']);
            MessageHistory::create($messageHistory);
            Message::find($id)->delete();
            return Response::json(["success" => true]);
        }
        return Response::json(["error"=> "Not Found"], 404);
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
            // return redirect()->back()
            //     ->withInput()
            //     ->withErrors($validation);
                return redirect()->back()->with('error','Your fields are empty please add data in it!');
        }else{

            QuestionNote::create($note);
            return redirect()->route('receptionist.message.index');
        }
    }


    public function userData(Request $request)
    {
        $phoneNumber = $request->phone_number;
        $data = DB::table('users')
            ->leftJoin('client_details as cd', 'cd.user_id','=', 'users.id')
            ->whereIn('users.role', ['client', 'affiliate'])
            ->where('cd.phone_number', $phoneNumber)
            ->select('users.email as email', DB::raw('CONCAT(users.last_name, " ",users.first_name) AS full_name'))
            ->first();

        $data = $data!= null?$data:'';
        return Response::json($data);
    }

/**
 * Receptionist Dashboard
 */

 public function receptionist_dashbord()
 {
   $client = User::where('role','client')->orderby('id','desc')->take(10)->get();
   $receptionist = User::where('role','receptionist')->get();
   $crediteducation = HomePageContent::all();
   $pendingtodo = Todo::where('status','0')->get();
   $compeletetodo = Todo::where('status','1')->get();
   $todolist = Todo::orderby('id','desc')->take(10)->get();
   return view('receptionist.index',compact('client','receptionist','crediteducation','pendingtodo','compeletetodo','todolist'));
 }

}
