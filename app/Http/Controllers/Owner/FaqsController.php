<?php

namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use App\Question;
use Illuminate\Support\Facades\Validator;

class FaqsController extends Controller
{
    /**
     * @return \Illuminate\View\View "owner.fax.index" with @faqs
     * @faqs paginated 10
     */
    public function index()
    {
        $faqs = Faq::paginate(10);
        return view('owner.faqs.index', compact('faqs'));
    }

    /**
     *  Newly created faqs
     * @return \Illuminate\View\View "owner.faqs.create"
     */
    public function create()
    {
        return view('owner.faqs.create');
    }

    /**
     * Create FAQs
     * @param Request $request
     * request structure [faqs=>[title:required, description:required]
     * @return redirect on success faqs.index, on failed faqs.create
     */
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

    /**
     * Update FAQs
     * @param $id
     * @return \Illuminate\View\View 'owner.faqs.edit', @faq
     */
    public function edit($id)
    {
        $faq = Faq::where('id', $id)->first();
        return view('owner.faqs.edit', compact('faq'));
    }

    /**
     * Update existing faqs
     * @param Request $request
     * request structure [faqs=>[title:required, description:required]]
     * @return redirect on success faqs.index, on failed faqs.edit
     */
    public function update(Request $request)
    {

        $id = $request->faq;

        $validation = Validator::make($request->faqs, [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        } else {
            Faq::where('id',$id)->update($request->faqs);
            return redirect(route('owner.faqs.index'))->with('success', "your data update");
        }
    }

    /**
     * Should remove existing faqs from database
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            Faq::where('id', $id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }


    /**
     * question  with FAQs
     * @param $questions
     * @return \Illuminate\View\View 'owner.faqs.question', @$questions
     */
    public function question()
    {
        $questions = Question::paginate(20);
        return view('owner.faqs.question', compact('questions'));
    }

    /**
     * Should remove existing question from database
     * @param $id
     * @return JsonResponse
     */
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
