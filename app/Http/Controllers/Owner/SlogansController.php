<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slogan;
use Illuminate\Support\Facades\Validator;

class SlogansController extends Controller
{

    public function index()
    {
        $slogans = Slogan::all();
        return view('owner.slogan.index', compact('slogans'));
    }

    public function create()
    {
        return view('owner.slogan.create');
    }
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

            return redirect(route('owner.faqs.index'))->with('success', "your data saved");
        }

    }

    public function destroy($id)
    {

        try {
            Slogan::where('id', $id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }



}
