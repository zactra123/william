<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\HomePageContent;
use Illuminate\Support\Facades\Validator;

class SuperAdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    public function index()
    {


        return view('owner.index');
    }


    public function create()
    {

        return view('owner.create');

    }

    public function homePageContent()
    {
        $contents = HomePageContent::paginate(10);
        return view('owner.home-page-content.index', compact('contents'));

    }

    public function homePageContentCreate()
    {
        return view('owner.home-page-content.create');
    }

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

    public function homePageContentShow($url)
    {

        $content = HomePageContent::where('url', $url)->get();
        return view('owner.home-page-content.show', compact('content'));

    }
    public function homePageContentEdit($url)
    {

        $content = HomePageContent::where('url', $url)->first();
        return view('owner.home-page-content.edit', compact('content'));
    }

    public function homePageContentUpdate(Request $request, $url)
    {
        dd('dasdasd');
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


    public function homePageContentDestroy($url)
    {

    }



}
