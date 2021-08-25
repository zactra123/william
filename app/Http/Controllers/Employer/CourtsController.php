<?php

namespace App\Http\Controllers\Employer;
use App\CourtJudge;
use App\EqualCourt;
use App\Http\Controllers\Controller;
use App\Court;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourtsController extends Controller
{

    /**
     * CourtsController constructor.
     * Should access logged in users with Super Admin,  admin and receptionist
     * ("superadmin","admin", "receptionist") Roles
     * Users can view furnisher list, create, update or delete an furnishers
     * Created furnisher (bank, credit union etc..)
     *
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'admins','owner']);
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\View\View "furnishers.logo_new" with @banksLogos
     * @banksLogos  form "bank_logo table" all furnishers
     * @banksLogos furnishers paginated 20
     */
    public function index(Request $request)
    {
        $courts = Court::where('name', 'LIKE', "%{$request->term}%");

        if (!empty($request->character)) {
            if ($request->character == '#'){
                $courts = $courts->whereRaw("TRIM(LOWER(name)) NOT REGEXP '^[a-z]'");
            } else {
                $courts = $courts->whereRaw("LOWER(`name`) LIKE '{$request->character}%'");
            }
        }
        $courts =$courts->groupBy('name')->paginate(20);
        return view('employer.court.index', compact('courts'));
//
    }

    /**
     *  Newly created furnishers can have multiple addresses
     * @return \Illuminate\View\View "furnishers.create" with @account_types
     * @account_types form "account_types table"
     */
    public function create()
    {
        return view('employer.court.create');
    }

    /**
     * Create court with type federal, state,
     * @param Request $request
     * request structure []
     * @return redirect on success admins.court.show, on failed court.create
     */
    public function store(Request $request)
    {
        $validation =  Validator::make($request->court, [
            'name'=>['required', 'string', 'max:255'],

        ]);
        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }

        $pathLogo = '';
        // if (!empty($request['logo']) ) {
        //     $imagesBankLogo = $request->file("logo");
        //     $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
        //     $bankLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
        //     if(!in_array($bankLogoExtension, $imageExtension)){
        //         return redirect()->back()->with('error','Please upload the correct file format (PDF, PNG, JPG)');
        //     }
        //
        //
        //     $ext = $request->file('logo')->getClientOriginalExtension();
        //     $time = time();
        //     $pathLogo = $request->file('logo')->storeAs(
        //         'courts',
        //         "court_$time.$ext",
        //         ['disk'=>'s3', 'visibility'=>'public']
        //     );
        // }
        $courtInfo = $request->court;
        $courtInfo['path'] = $pathLogo;

        $court = Court::create($courtInfo);

        $judges_infos = $request->judge;

        foreach ( $judges_infos as $judge) {
            $court->courtJudges()->create($judge);
        }

        $equalCourts = $request->equal_courts;
        if($equalCourts != null){
            $eqs = explode(',', $equalCourts);
            foreach($eqs as $name){
                $data = [
                    'court_id' => $court->id,
                    'name'=>strtoupper($name)
                ];
                EqualCourt::create($data);
            }
        }

        return redirect()->route('admins.court.index');
    }


    /**
     * Update Furnishers
     * @param $id
     * @return \Illuminate\View\View 'furnishers.edit', @bnak, @account_types,
     * @bank_addresses, @bank_types, @registredAgent,
     *  @bank edited furnishers
     * @account_types form "account_types table"
     * @bank_addresses edited furnishers addresses sorted in first executive address
     */
    public function edit(Request $request)
    {
        $id  = $request->court;
        $court = Court::findOrFail($id);


        return view('employer.court.edit', compact('court'));
    }

    /**
     * Update existing Furnishers
     * @param Request $request
     * request structure []
     * @return redirect on success admin.index, on failed furnishers.edit
     */
    public function update(Request $request, $id)
    {

        $court = Court::find($id);
        $courtInfo = $request->court;

        if($request->logo != null){
            $imagesBankLogo = $request->file("logo");
            $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
            $courtLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
            if(!in_array($courtLogoExtension, $imageExtension)){
                return redirect()->back()->with('error','Please upload the correct file format (PDF, PNG, JPG)');
            }

            $ext = $request->file('logo')->getClientOriginalExtension();
            $time = time();
            $pathLogo = $request->file("logo")->storeAs(
                'bank_logos',
                "furnisher_$time.$ext",
                ['disk'=>'s3', 'visibility'=>'public']
            );
            $courtInfo['path'] = $pathLogo;

            if($court->checkUrlAttribute()) {
                Storage::delete($court->path);
            }

            $court->update($courtInfo);
        }else{
            $court->update($courtInfo);
        }

        $judges_infos = $request->judge;
        $judgeId = $court->courtJudges()->pluck('id')->toArray();

        $delete = array_diff($judgeId, array_column($judges_infos, 'id'));
        if(!empty($delete)){
            CourtJudge::destroy($delete);
        }

        foreach ( $judges_infos as $judge) {
            if(isset($judge['id'])){
                CourtJudge::whereId($judge['id'])->update($judge);
            }else{
                $court->courtJudges()->create($judge);
            }
        }


        $existing_names = $court->equalCourts()->pluck('name')->toArray();
        $eqs = explode(',', $request->equal_courts);
        $removeArray = array_values(array_diff($existing_names, $eqs));
        if(!empty($removeArray)){
            $removeExistingName= $court->equalCourts()->whereIn('name', $removeArray)->delete();
            $existing_names = $court->equalCourts()->pluck('name')->toArray();
        }

        foreach($eqs as $eb) {
            if (!in_array($eb, $existing_names)) {
                $court->equalCourts()->create(["name" => strtoupper($eb)]);
            }
        }

        return redirect()->route('admins.court.index');

    }

    /**
     * Should remove existing Court from database
     * @param $id
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $logId = $request->id;

        $delete = Court::find($logId);

        if($delete->checkUrlAttribute()) {
            Storage::delete($delete->path);
        }
        $delete->delete();
        if($request->ajax()){
            return response()->json(['status' => 'success']);
        }
        return redirect()->route('admins.court.index');
    }


    /**
     * Delete Court.
     * @param $id
     * @return JsonResponse
     */
     public function delete_court($id)
     {
       $court = Court::where('id',$id)->delete();

       return back()->with('success','You successfully delete court!');
     }

}
