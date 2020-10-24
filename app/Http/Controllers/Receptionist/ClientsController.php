<?php

namespace App\Http\Controllers\Receptionist;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ClientReport;
use App\Todo;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use App\User;
use App\ClientDetail;
use Response;
use PDF;



use App\Client_detail;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth',  'receptionist']);
    }

    public function list()
    {
        $users = DB::table('users')
            ->leftJoin('affiliates', 'affiliates.user_id', '=', 'users.id')
            ->leftJoin('users as u', 'u.id', '=', 'affiliates.affiliate_id')
            ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name',
                'users.email as email', DB::raw('CONCAT(u.last_name, " ",u.first_name) AS full_name'))
            ->where('users.role', 'client')
            ->paginate(10);

        return view('receptionist.client.list', compact( 'users'));

    }
    public function profile($clientId)
    {
        $client = User::clients()->find($clientId);
        $toDos = Todo::where('client_id', $clientId)->get();
        $user = User::where('role', 'admin')->get()->pluck('full_name', 'id')->toArray();

        return view('receptionist.client.profile', compact('client', 'user','toDos'));


    }
    public function clientToDo(Request $request)
    {

        $toDo = Todo::find($request->id);
        $admins = User::admins()->get()->pluck('full_name', 'id')->toArray();
        $view = view('helpers.to-do-form', compact('toDo', 'admins'))->render();

        return response()->json(['status' => 200, 'view' => $view]);


    }


    public function clientReport(Request $request)
    {
        $clientReportsEQ = null;
        $clientReportsTU = null;
        $clientReportsEX = null;

        if($request->date !=null){
            $clientReports = ClientReport::where('id',$request->date);

        }else{
            $clientReports = ClientReport::where('user_id',$request->client);
        }

        if($request->type == 'equifax'){
            $clientReportsEQ = $clientReports->where('type', "EQ")->first();
            $equifaxDate =$clientReports->where('type', "EQ")
                ->pluck('created_at', 'id')->toArray();
        }elseif($request->type == 'transunion'){
            $clientReportsTU = $clientReports->where('type', "TU_DIS")->first();
            $transunionDate = $clientReports->where('type', "TU")
                ->pluck('created_at', 'id')->toArray();

        }elseif($request->type == 'experian'){
            $clientReportsEX = $clientReports->where('type', "EX_LOG")->first();
            $experianDate = $clientReports->where('type', "EX_LOG")
                ->pluck('created_at', 'id')->toArray();
        }

        return view('receptionist.client.report', compact('clientReportsEX','clientReportsTU', 'clientReportsEQ',
            'equifaxDate','experianDate','transunionDate'));
    }


    public function toDoList(Request $request)
    {

        $admins = User::where('role', 'admin')->get()->pluck('full_name', 'id')->toArray();
        if($request->title != null && $request->admin != null && $request->assign == "on"){

            $toDos = Todo::where('user_id',  $request->admin)
                ->where('title',"LIKE", "%".$request->title."%")
                ->where('user_id', "!=", auth()->user()->id)
                ->paginate(15);

        }elseif($request->title == null && $request->admin != null && $request->assign == "on"){

            $toDos = Todo::where('user_id',  $request->admin)
                ->where('user_id', "!=", auth()->user()->id)
                ->paginate(15);
        }elseif($request->title != null && $request->admin == null && $request->assign == "on"){

            $toDos = Todo::where('title', "LIKE", "%" . $request->title . "%")
                ->where('user_id', "!=", auth()->user()->id)
                ->paginate(15);
        }elseif($request->title != null && $request->admin != null && $request->assign != "on"){

            $toDos = Todo::where('user_id',  $request->admin)
                ->where('title',"LIKE", "%".$request->title."%")
                ->paginate(15);
        }elseif($request->title != null && $request->admin == null && $request->assign != "on"){

            $toDos = Todo::where('title',"LIKE", "%".$request->title."%")->paginate(15);
        }elseif($request->title == null && $request->admin != null && $request->assign != "on"){

            $toDos = Todo::where('user_id',  $request->admin)->paginate(15);
        }elseif($request->title == null && $request->admin == null && $request->assign == "on"){

            $toDos = Todo::where('user_id', "!=", auth()->user()->id)->paginate(15);
        }else{
            $toDos = Todo::paginate(15);
        }



        return view('receptionist.client.todo-list', compact('toDos', 'admins'));
    }


    public function changeTodoAssignment(Request $request) {
        $todo = Todo::find($request->id)->update(['user_id' => $request->user_id]);;

        return response()->json(['status' => 200, 'view' => $todo]);
    }

}
