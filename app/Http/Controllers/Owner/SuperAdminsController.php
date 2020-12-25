<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\HomePageContent;
use Illuminate\Support\Facades\Validator;
use App\Events\LiveChat;
use Auth;

class SuperAdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    /**
     * @return \Illuminate\View\View "owner.index"
     *
     */
    public function index(Request $request)
    {

        return view('owner.index');
    }


    public function create()
    {

        return view('owner.create');

    }

    /**
     * @return \Illuminate\View\View "owner.home-page-content.index"
     * @contents credit education paginated 10
     */
    public function homePageContent()
    {
        $contents = HomePageContent::paginate(10);
        return view('owner.home-page-content.index', compact('contents'));

    }

    /**
     *  Newly created credit education
     * @return \Illuminate\View\View "owner.home-page-content.create"
     *
     */
    public function homePageContentCreate()
    {
        return view('owner.home-page-content.create');
    }

    /**
     * Create credit education
     * @param Request $request
     * request structure [content=>[title:required, url:required, content:required]]
     * add credit education content  stored on "home_page_contents" table
     * @return redirect on success owner.home-page-content.index, on failed admin.home-page-content.create
     */
    public function homePageContentStore(Request $request)
    {
        $content = $request['content'];
        $validation =  Validator::make($content, [
            'title' => ['required', 'string', 'max:255'],
            'url'=>['required','string', 'max:255','unique:home_page_contents'],
            'content' => ['required', 'string'],
        ]);

        if ($validation->fails()){
            return view('owner.home-page-content.create')->withErrors($validation);
        }

        HomePageContent::create([
            'title' => $content['title'],
            'url' => $content['url'],
            'category' => $content['category'],
            'sub_content' => $content['sub_content'],
            'content'=>$content['content'],
        ]);

        return redirect('owner/home-page-content');
    }

    /**
     *  Show credit education content
     * @param $url
     * @return \Illuminate\View\View "owner.home-page-content.show"
     *
     */
    public function homePageContentShow($url)
    {
        $content = HomePageContent::where('url', $url)->get();
        return view('owner.home-page-content.show', compact('content'));

    }

    /**
     * Update credit education
     * @param $url
     * @return \Illuminate\View\View 'owner.home-page-content.edit', @content
     */
    public function homePageContentEdit($url)
    {
        $content = HomePageContent::where('url', $url)->first();
        return view('owner.home-page-content.edit', compact('content'));
    }

    /**
     * Update existing credit eduction
     * update credit education content  stored on "home_page_contents" table should be stored on "home_page_contents" table
     * @param Request $request
     * request structure [content=>[title:required, url:required, category:required, content:array,required]
     * @return redirect on success owner.home-page-content.index, on failed owner.home-page-content.edit
     */
    public function homePageContentUpdate(Request $request, $url)
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
            return view('owner.home-page-content.edit', compact('content'))->withErrors($validation);
        }

        HomePageContent::where('url', $url)->update([
            'title' => $update['title'],
            'url' => $update['url'],
            'category' => $update['category'],
            'sub_content' => $update['sub_content'],
            'content'=>$update['content'],
        ]);

        return redirect('owner/home-page-content');

    }

    /**
     * Should remove existing credit education from database
     * @param $url
     * @return JsonResponse
     */
    public function homePageContentDestroy($url)
    {

    }



}
