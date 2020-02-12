<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
use Auth;
use App\Appointment;
use App\User;
use App\Message;
use App\MessageHistory;
use App\QuestionNote;
use Illuminate\Support\Facades\DB;


class AppointmentsController extends Controller
{
    public function index(Request $request)
    {

         $admins = User::where('role', 'admin')
           ->select('id', DB::raw('CONCAT(last_name, " ",first_name) AS full_name'))
           ->pluck('full_name', 'id');


        if(request()->ajax())
        {

            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');


            $appointments = Message::whereDate('call_date', '>=', $start)->get();
            if ($request->type == 'completed' || $request->type == 'pending'){
                $appointments = $appointments->where('completed', $request->type == 'completed');
            }

            $data =[];

            foreach($appointments as $apointment){
                $data[]=[
                    'id'=>$apointment->id,
                    'title'=>$apointment->title,
                    'start'=>$apointment->call_date,
                    'end'=>$apointment->call_date
                ];
            }
            return Response::json($data);
        }


        return view('admin.appointment.index',compact('admins'));
    }

    public function show($id)
    {
        $appointment = Message::find($id)->toArray();
        $note= QuestionNote::all()->toArray();
        if (empty($appointment)) {
            return Response::json(["error" => "Not Found"], 404);
        }


        $data= [
            "appointment" => $appointment,
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

            $appointment = Message::create($insertArr);
            return Response::json($appointment);

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

            $appointment = Message::where('id', $request->id)->update($insertArr);
            return Response::json($appointment);

        }


    }

    public function destroy($id)
    {

        if ($messageHistory = Message::where('id', $id)->first()) {

            $messageHistory = $messageHistory->toArray();
            $messageHistory['message_id'] = $messageHistory['id'];
            unset($messageHistory['id']);

            MessageHistory::create($messageHistory);

            return Response::json(["success" => true]);
        }

        return Response::json(["error"=> "Not Found"], 404);
    }



}
