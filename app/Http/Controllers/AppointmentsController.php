<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
use Auth;
use App\Appointment;


class AppointmentsController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {

            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');


            $appointments = Appointment::where('user_id', Auth::user()->id)
                ->whereDate('start_date', '>=', $start)->get();

            $data =[];

            foreach($appointments as $apointment){
                $data[]=[
                    'id'=>$apointment->id,
                    'title'=>$apointment->name,
                    'start'=>$apointment->start_date,
                    'end'=>$apointment->start_date
                ];
            }
            return Response::json($data);
        }


        return view('admin.appointment.index');
    }


    public function create(Request $request)
    {

        $insertArr = [

            'name' => $request->title,
            'time' => $request->time,
            'start_date' => $request->start_date,
            'description' => $request->description,
            'phone_number' => $request->phone_number

        ];

        $validation = Validator::make($insertArr, [
            'start_date' => ['required'],
            'time' =>['required'],
            'name' => ['required'],
            'description'=> ['required'],
            'phone_number'=> ['required'],


        ]);

        if ($validation->fails()) {
            return Response::json(["error"=>"All fields are required"], 400);

        }else {

            $insertArr['user_id']=Auth::user()->id;

            $appointment = Appointment::create($insertArr);
            return Response::json($appointment);

        }


    }


    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);

        return Response::json($event);
    }


    public function destroy(Request $request)
    {
        $event = Event::where('id',$request->id)->delete();

        return Response::json($event);
    }



}
