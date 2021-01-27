<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
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
            return view('blog.create')->withErrors($validator);
        }
        $data['path'] = $pathTitleImage;
        Blog::create($data);
        return redirect()->route('bank.index');
    }
    public function edit($id)
    {
        $blog = Blog::whereId($id)->first();
        return view("blog.edit", compact('blog'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $blog = Blog::whereId($id);

        $data = $request->except("_token", "attach");
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
        return redirect()->route('bank.index');
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

}
