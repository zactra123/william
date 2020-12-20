<?php

namespace App\Http\Controllers\Employer;
use App\Http\Controllers\Controller;
use App\ClientReport;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;
use PDF;

//Twilio
use Twilio\Rest\Client;
use Validator;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admins']);
    }

    public function index(Request $request)
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

    public function changePassword(Request $request)
    {
        $admin = Auth::user();

        if($request->method()=="GET"){
            return view('employer.change-password', compact('admin'));
        }elseif($request->method()=="PUT"){
            $changePassword = $request->except("_token");

            $validation = \Illuminate\Support\Facades\Validator::make($changePassword, [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            if ($validation->fails()){
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            }
            User::whereId($admin->id)->update([ 'password' => Hash::make($changePassword['password'])]);
            if($admin->role == 'admin'){
                return redirect('admins/');
            }else{
                return redirect('receptionist/message');
            }
        }

    }

    //es el piti tarvi urish tex
    public function getNotifications()
    {
        $appointments = Message::where("call_date", ">", date("Y-m-d H:i:s"))
            ->where("call_date", "<", date("Y-m-d H:i:s", strtotime("+10 minutes")))
            ->get();
        return Response::json($appointments);
    }


    //es peteq chi piti jnjvi
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

    //es peteq chi piti jnjvi
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

}
