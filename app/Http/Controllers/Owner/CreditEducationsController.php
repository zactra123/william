<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

use App\HomePageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreditEducationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }


    /**
     * @return \Illuminate\View\View "owner.home-page-content.index"
     * @contents credit education paginated 10
     */
    public function index()
    {
        $contents = HomePageContent::paginate(10);
        return view('owner.credit_education.index', compact('contents'));
    }

    /**
     *  Newly created credit education
     * @return \Illuminate\View\View "owner.credit_education.create"
     *
     */
    public function create()
    {
        return view('owner.credit_education.create');
    }

    /**
     * Create credit education
     * @param Request $request
     * request structure [content=>[title:required, url:required, content:required]]
     * add credit education content  stored on "home_page_contents" table
     * @return redirect on success owner.credit_education.index, on failed admin.credit_education.create
     */
    public function store(Request $request)
    {
        $content = $request['content'];
        $validation =  Validator::make($content, [
            'title' => ['required', 'string', 'max:255'],
            'url'=>['required','string', 'max:255','unique:home_page_contents'],
            'content' => ['required', 'string'],
        ]);

        if ($validation->fails()){
            // return view('owner.credit_education.create')->withErrors($validation);
            return view('owner.credit_education.create')->with('error','Your fields are empty please add data in it!');
        }

        HomePageContent::create([
            'title' => $content['title'],
            'url' => $content['url'],
            'category' => $content['category'],
            'sub_content' => $content['sub_content'],
            'content'=>$content['content'],
        ]);
        return redirect('owner/credit-education')->with('success','You successfully store educations!');
    }

    /**
     *  Show credit education content
     * @param $url
     * @return \Illuminate\View\View "owner.credit_education.show"
     *
     */
    public function show($url)
    {
        $content = HomePageContent::where('url', $url)->get();
        return view('owner.credit_education.show', compact('content'));
    }

    /**
     * Update credit education
     * @param $url
     * @return \Illuminate\View\View 'owner.credit_education.edit', @content
     */

    public function edit($url)
    {
        $content = HomePageContent::where('url', $url)->first();
        return view('owner.credit_education.edit', compact('content'));
    }

    /**
     * Update existing credit eduction
     * update credit education content  stored on "home_page_contents" table should be stored on "home_page_contents" table
     * @param Request $request
     * request structure [content=>[title:required, url:required, category:required, content:array,required]
     * @return redirect on success owner.credit_education.index, on failed owner.credit_education.edit
     */
    public function update(Request $request, $url)
    {
        $content = HomePageContent::where('url', $url)->first();
        $update = $request['content'];

        $validation =  Validator::make($update, [
            'title' => ['required', 'string', 'max:255'],
            'url'=>['required','string',  'max:255'],
            'category' => ['required', 'numeric'],
            'content' => ['required', 'string'],
        ]);

        if ($validation->fails()){
            // return view('owner.credit_education.edit', compact('content'))->withErrors($validation);
            return view('owner.credit_education.edit', compact('content'))->with('error','Your fields are empty please add data in it!');
        }

        HomePageContent::where('url', $url)->update([
            'title' => $update['title'],
            'url' => $update['url'],
            'category' => $update['category'],
            'sub_content' => $update['sub_content'],
            'content'=>$update['content'],
        ]);

        return redirect('owner/credit-education')->with('success','You successfully update educations!');

    }

    /**
     * Should remove existing credit education from database
     * @param $url
     * @return JsonResponse
     */
    public function destroy($url)
    {
        try {
            HomePageContent::where('url', $url)->delete();

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Delete Credit Education.
     * @param $url
     * @return JsonResponse
     */
     public function delete_credit_education($id)
     {
       HomePageContent::where('id',$id)->delete();

       return back()->with('success','You successfully delete credit eduction!');
     }

}
