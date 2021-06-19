<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slogan;
use Illuminate\Support\Facades\Validator;

class SlogansController extends Controller
{

    /**
     * @return \Illuminate\View\View "owner.slogan.index" with @slogans
     * @slogan paginated 20
     */
    public function index()
    {
        $slogans = Slogan::paginate(20);
        return view('owner.slogan.index', compact('slogans'));
    }

    /**
     *  Newly created slogan
     * @return \Illuminate\View\View "owner.slogan.create"
     */
    public function create()
    {
        return view('owner.slogan.create');
    }

    /**
     * Create Slogan
     * @param Request $request
     * request structure [slogan=>[author:required, slogan:required]
     * @return redirect on success slogan.index, on failed slogan.create
     */
    public function store(Request $request)
    {

        $validation = Validator::make($request->slogan, [
            'author' => ['required', 'string'],
            'slogan' => ['required', 'string'],
        ]);

        if ($validation->fails()) {
            return view('owner.slogan.create')->withErrors($validation);
        } else {
            Slogan::create($request->slogan);
            return redirect(route('owner.slogan.index'))->with('success', "your data saved");
        }
    }

    /**
     * Should remove existing slogan from database
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            Slogan::where('id', $id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Delete Slogan.
     * @param $id
     * @return JsonResponse
     */
     public function slogan_delete($id)
     {
       Slogan::where('id', $id)->delete();

       return back()->with('success','You successfully delete slogan!');
     }
}
