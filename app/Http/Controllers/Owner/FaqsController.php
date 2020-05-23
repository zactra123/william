<?php

namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use App\Question;
use Illuminate\Support\Facades\Validator;

class FaqsController extends Controller
{

    public function index()
    {
        $faqs = Faq::paginate(10);

        return view('owner.faqs.index', compact('faqs'));

    }

    public function create()
    {
        return view('owner.faqs.create');
    }
    public function store(Request $request)
    {

        $validation = Validator::make($request->faqs, [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],

        ]);

        if ($validation->fails()) {

            return view('owner.faqs.create')->withErrors($validation);
        } else {
            Faq::create($request->faqs);

            return redirect(route('owner.faqs.index'))->with('success', "your data saved");
        }

    }
    public function edit($id)
    {
        $faq = Faq::where('id', $id)->first();
        return view('owner.faqs.edit', compact('faq'));
    }

    public function update(Request $request)
    {

        $id = $request->faq;


        $validation = Validator::make($request->faqs, [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],

        ]);

        if ($validation->fails()) {

            return view('owner.faqs.create')->withErrors($validation);
        } else {
            Faq::where('id',$id)->update($request->faqs);

            return redirect(route('owner.faqs.index'))->with('success', "your data update");
        }


    }
    public function destroy($id)
    {

        try {
            Faq::where('id', $id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }

    public function question()
    {
        $questions = Question::paginate(20);
        return view('owner.faqs.question', compact('questions'));
    }
    public function questionDelete($id)
    {

        try {
            Question::where('id', $id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);

    }



}
