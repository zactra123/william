<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Response;

class BlogsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'seo']);
    // }
    public function __construct()
    {
        // $this->middleware(['auth', 'admins']);
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        if(empty($request['attach'])){
          return redirect()->back()
              ->withInput()
              ->with('error', 'Please upload both files');
        }
        $titleImage  = $request->file("attach");
        $imageExtension = [ 'png', 'jpg', 'jpeg'];

        $titleImageExtension = strtolower($titleImage->getClientOriginalExtension());
        if (!in_array($titleImageExtension, $imageExtension)) {
            return redirect()->back()
                ->with('error', 'Please upload the correct file format (PNG, JPG)');
        }

        $path = "image/blog/";
        $titleImageName =  "title_image_".date("Y_m_d_h_m_s").".".$titleImageExtension;
        $titleImage->move(public_path() . '/' . $path, $titleImageName);
        $pathTitleImage = '/' . $path . $titleImageName;
        $data = $request->except("_token", "attach");

        $validate = new Blog();
        $validator = Validator::make($data, $validate->rules);
        if ($validator->fails()) {
            // return view('blog.create')->withErrors($validator);
            return redirect()->back()->with('error','Your fields are empty please add data in it!');
        }
        $data['path'] = $pathTitleImage;
        Blog::create($data);
        return redirect()->route('blog.index');
    }
    public function edit($id)
    {
        $blog = Blog::whereId($id)->first();
        return view("blog.edit", compact('blog'));
    }

    public function update($id, Request $request)
    {
        $blog = Blog::whereId($id);
        $data = $request->except("_token",  "_method", "attach");
        if(!empty($request['attach'])){
            $titleImage  = $request->file("attach");
            $imageExtension = [ 'png', 'jpg', 'jpeg'];

            $titleImageExtension = strtolower($titleImage->getClientOriginalExtension());
            if (!in_array($titleImageExtension, $imageExtension)) {
                return redirect()->back()
                    ->with('error', 'Please upload the correct file format (PNG, JPG)');
            }
            $path = "image/blog/";
            $titleImageName =  "title_image_".date("Y_m_d_h_m_s").".".$titleImageExtension;
            $titleImage->move(public_path() . '/' . $path, $titleImageName);
            $pathTitleImage = '/' . $path . $titleImageName;

            if(file_exists($blog->first()->path)){
                unlink($blog->first()->path);
            }
            $data['path'] = $pathTitleImage;
        }

        $blog->update($data);
        return redirect()->route('blog.index');
    }


    public function show($url)
    {
        $blog = Blog::where('url', $url)->first();
        return view('blog-show', compact("blog"));
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Blog::find($id);
        if(file_exists($delete->first()->path)){
            unlink($delete->first()->path);
        }
        $delete->delete();

        if($request->ajax()){
            return response()->json(['status' => 'success']);
        }
        return redirect()->route('blog.index');

    }

    public function upload_tinymce_images(Request $request)
    {
        $imagesBankLogo = $request->file("file");
        $imageExtension = ['png', 'jpg', 'jpeg'];
        $bankLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
        if(!in_array($bankLogoExtension, $imageExtension)){
            return Response::json(["error"=>"Please upload the correct file format ( PNG, JPG)"], 400);
        }

        $ext = $request->file('file')->getClientOriginalExtension();
        $time = time();
        $pathLogo = $request->file("file")->storeAs(
            'blogs/tinymce',
            "furnisher_$time.$ext",
            ['disk'=>'s3', 'visibility'=>'public']
        );

      return Response::json(["location"=> Storage::disk('s3')->url($pathLogo)], 200);
    }

}
