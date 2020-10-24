<?php

namespace App\Http\Controllers;

use App\ClientReport;
use App\Disputable;
use App\Todo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function clientList()
    {
        $users = DB::table('users')
            ->leftJoin('affiliates', 'affiliates.user_id', '=', 'users.id')
            ->leftJoin('users as u', 'u.id', '=', 'affiliates.affiliate_id')
            ->select('users.id as id', 'users.email as email',
                DB::raw('CONCAT(users.last_name, " ",users.first_name) AS full_name'))
            ->where('users.role', 'client')
            ->paginate(10);

        return view('todo.list', compact( 'users'));

    }


    public function profile($clientId)
    {
        $client = User::clients()->find($clientId);
        $toDos = Todo::where('client_id', $clientId)->get();
        $user = User::where('role', 'admin')->get()->pluck('full_name', 'id')->toArray();
        return view('todo.profile', compact('client', 'user','toDos'));


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

        return view('todo.report', compact('clientReportsEX','clientReportsTU', 'clientReportsEQ',
            'equifaxDate','experianDate','transunionDate'));
    }

    public function clientToDo(Request $request)
    {

        $toDo = Todo::find($request->id);
        $admins = User::admins()->get()->pluck('full_name', 'id')->toArray();
        $view = view('helpers.to-do-form', compact('toDo', 'admins'))->render();

        return response()->json(['status' => 200, 'view' => $view]);


    }

    public function toDoList(Request $request)
    {
        if(auth()->user()->role=='receptionist'){
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
            return view('todo.todo-list', compact('toDos', 'admins'));

        }elseif(auth()->user()->role=='admin'){
            if($request->title != null){
                $toDos = Todo::where('title',"LIKE", "%".$request->title."%")->paginate(15);
            }else{
                $toDos = Todo::paginate(15);
            }
            return view('todo.todo-list', compact('toDos'));
        }


    }


    public function changeTodoAssignment(Request $request) {
        $todo = Todo::find($request->id)->update(['user_id' => $request->user_id]);;

        return response()->json(['status' => 200, 'view' => $todo]);
    }

    public function toDoDestroy($id)
    {
        try {
            Disputable::where('todo_id', $id)->delete();
            Todo::where('id', $id)->delete();

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);


    }

    public function clientToDoUpdate(Request $request)
    {
        $todo = $request->todo;
        $client= Todo::where('id', $request->todoId)->first()->client_id;
        Todo::where('id', $request->todoId)->update($todo);

        foreach($request->dispute as $dispute){
            Disputable::where('id',$dispute['id'])
                ->update(['status'=>$dispute['status']]);
        }

        $allvalues = Disputable::where('todo_id', $request->todoId)->pluck('status')->toArray();

        if (count(array_unique($allvalues)) === 1 && end($allvalues) === 'true') {
            Todo::where('id', $request->todoId)->update(['status'=>end($allvalues)]);
        }else{
            Todo::where('id', $request->todoId)->update(['status'=>min($allvalues)]);
        }

        return redirect()->route('adminRec.client.profile', $client);
    }

    public function disputeDestroy($id)
    {
        try {
            $todoId = Disputable::where('id', $id)->fisrt()->todo_id;
            Disputable::where('id', $id)->delete();
            if(empty(Disputable::where('todo_id', $todoId)->first())){
                Todo::where('id', $todoId)->delete();
            }

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);


    }


}
