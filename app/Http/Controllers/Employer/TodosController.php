<?php

namespace App\Http\Controllers\Employer;

use App\ClientReportExAccount;
use App\Http\Controllers\Controller;
use App\Disputable;
use App\Todo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use PDF;
use function Sodium\compare;

class TodosController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admins']);
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
            return view('employer.todo-list', compact('toDos', 'admins'));

        }elseif(auth()->user()->role=='admin'){
            if($request->title != null){
                $toDos = Todo::where('title',"LIKE", "%".$request->title."%")->paginate(15);
            }else{
                $toDos = Todo::paginate(15);
            }
            return view('employer.todo-list', compact('toDos'));
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

    public function toDoDetails(Request $request)
    {
        $todo = Todo::whereId($request->id)->first();
        $dispute  = Disputable::where('todo_id', $request->id)->first();
        if($dispute->disputable_type == "App\ClientReportExAccount"){
            $exAccount = ClientReportExAccount::whereId($dispute->disputable_id)->first();
//            dd($exAccount->getTodoAttributes());

            $view = view('helpers.account-details', compact('exAccount', "dispute"))->render();
//////
//            return $view;
//            dd($view);

            return response()->json(['status' => 200, 'view' => $view]);
        }
        dd($exAccount);






    }

    public function disputeDestroy($id)
    {
        try {
            $todoId = Disputable::where('id', $id)->first()->todo_id;
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
