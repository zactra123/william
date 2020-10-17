<?php

namespace App\Http\Controllers;
use App\ClientReport;
use App\Message;
use App\Todo;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use App\User;
use App\ClientDetail;
use Illuminate\Http\Request;
use Response;
use PDF;

//Twilio
use Twilio\Rest\Client;
use Validator;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {

        if(request()->ajax())
        {
            $messages = Message::whereDate('call_date', '>=', $request->start)
                ->whereDate('call_date', '<=', $request->end);
            if ($request->type == 'completed' || $request->type == 'pending'){
                $messages = $messages->where('completed', $request->type == 'completed');
            }
            $messages = $messages->select("id", "title", "call_date as start", "call_date as end")->get()->toArray();

            return Response::json($messages);
        }


        return view('admin.message.index');
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

        return view('admin.user-list', compact( 'users'));

    }

    public function affiliateList()
    {
        $users = DB::table('users')
            ->leftJoin('affiliates', 'affiliate_id', '=', 'users.id')
            ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name',
                'users.email as email', DB::raw('COUNT(affiliates.affiliate_id) as client'))
            ->where('role', 'affiliate')
            ->groupBy('users.id')
            ->paginate(10);
        return view('admin.affiliate-list', compact('users'));
    }

    public function clientProfile($clientId)
    {
        $client = User::clients()->find($clientId);
        $toDos = Todo::where('client_id', $clientId)->get();



        //       return view('admin.client-profile', compact('client'));
       return view('admin.client-profile-1', compact('client', 'toDos'));


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

        return view('admin.client-report', compact('clientReportsEX','clientReportsTU', 'clientReportsEQ',
            'equifaxDate','experianDate','transunionDate'));
    }


    public function printPdfClientProfile($id)
    {

        $client = User::clients()->find($id);
        $pdf = PDF::loadView('admin.client-profile-pdf', compact('client'));
        return $pdf->download('invoice.pdf');
        return view('admin.client-profile-pdf', compact('client'));

        dd($client);

        $pdf = $pdf->setPaper('a4', 'portrait');

        return  $pdf->stream('client-profile'.$id.'.pdf');
        return view('admin.client-profile-pdf', compact('client'));

        return $pdf->download('client-profile'.$id.'.pdf');

    }


//Twilio
    public function sendSms( Request $request )
    {

        $sid    = env( 'TWILIO_SID' );
        $token  = env( 'TWILIO_AUTH_TOKEN' );
        $client = new Client( $sid, $token );

        //test

//        $ok = $client->messages->create(
//            '+374 93 050093',
//            [
////                'from' => '+15005550006',
//                'from' => env( 'TWILIO_NUMBER' ),
//                'body' => "Hello world",
//            ]
//        );
//
//        dd($ok );
        $validator = Validator::make($request->all(), [
            'numbers' => 'required',
            'message' => 'required'
        ]);

        if ( $validator->passes() ) {

            $numbers_in_arrays = explode( ',' , $request->input( 'numbers' ) );

            $message = $request->input( 'message' );
            $count = 0;

            foreach( $numbers_in_arrays as $number )
            {
                $count++;

                $client->messages->create(
                    $number,
                    [
                        'from' => env( 'TWILIO_FROM' ),
                        'body' => $message,
                    ]
                );
            }

            return back()->with( 'success', $count . " messages sent!" );

        } else {
            return back()->withErrors( $validator );
        }
    }




    public function clientReportNumber(Request $request)
    {

        $data = $request->except('_token');

        $fullName = explode(' ',$data['full_name']);
        $firstName = $fullName['0'];
        $lastName = !emtpy($fullName['1'])?$fullName['1']:"";

        $update = User::where('id', $data['user_id'])->update([
            'first_name'=> strtoupper($firstName),
            'full_name'=> strtoupper($lastName)
        ]);

        $updateClient = ClientDetail::where('user_id', $data['user_id'])
            ->update([
                'sex' =>$data['sex'],
                'address' => strtoupper($data['address']),
                'phone_number'=> $data['phone_number'],

            ]);

//        @Todo: haskanal vortex enq pahum report numbernere
//        ReportNumber::cretae([
//
//            'user_id'=>$data['user_id'],
//            'ex_number'=>$data['ex_number'],
//            'eq_number'=>$data['eq_number'],
//            'tu_number'=>$data['tu_number'],
//            'ftc_number'=>$data['ftc_number'],
//            'dr_number'=>$data['dr_number'],
//        ]);

        echo json_encode(['success'=>1,'data'=>$data]);
        return;

    }

    public function getNotifications()
    {
        $appointments = Message::where("call_date", ">", date("Y-m-d H:i:s"))
            ->where("call_date", "<", date("Y-m-d H:i:s", strtotime("+10 minutes")))
            ->get();


        return Response::json($appointments);
    }

}
