<?php

namespace App\Http\Controllers;

use App\Authority;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthoritiesController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'admins', 'owner']);
        $this->middleware('auth');
    }

    public function index()
    {
        $authorities = Authority::paginate(20);
        return view('furnishers.authority.index', compact('authorities'));
    }

    public function create()
    {
        return view('furnishers.authority.create');
    }
    public function store(Request $request)
    {
        $authority= $request->authority;
        $validation =  Validator::make($authority, [
            'name'=>['required', 'string', 'max:255'],

        ]);
        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }

        $pathLogo = '';
        // if (!empty($request['logo']) ) {
        //
        //
        //     $imagesBankLogo = $request->file("logo");
        //     $imageExtension = ['gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
        //     $bankLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
        //     if(!in_array($bankLogoExtension, $imageExtension)){
        //         return redirect()->back()->with('error','Please upload the correct file format (PDF, PNG, JPG)');
        //     }
        //
        //
        //     $ext = $request->file('logo')->getClientOriginalExtension();
        //     $time = time();
        //     $pathLogo = $request->file('logo')->storeAs(
        //         'authorities',
        //         "authorities_$time.$ext",
        //         ['disk'=>'s3', 'visibility'=>'public']
        //     );
        //
        //
        // }
        $authority['path'] = $pathLogo;
        Authority::create($authority);
        return redirect()->route('admins.authority.index');
    }

    public function edit($id)
    {
        $authority = Authority::whereId($id)->first();
        return view("furnishers.authority.edit", compact('authority'));
    }

    public function update(Request $request, $id)
    {

        $authority = Authority::find($id);
        $update = $request->authority;

        if($request->logo != null){
            $imagesBankLogo = $request->file("logo");
            $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
            $bankLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
            if(!in_array($bankLogoExtension, $imageExtension)){
                return redirect()->back()->with('error','Please upload the correct file format (PDF, PNG, JPG)');
            }

            $ext = $request->file('logo')->getClientOriginalExtension();
            $time = time();
            $pathLogo = $request->file("logo")->storeAs(
                'authorities',
                "authorities_$time.$ext",
                ['disk'=>'s3', 'visibility'=>'public']
            );
            $update['path'] = $pathLogo;

            if($authority->checkUrlAttribute()) {
                Storage::delete($authority->path);
            }
            $authority->update($update);
        }else{
            $authority->update($update);
        }
        return redirect()->route('admins.authority.index');
    }



    public function destroy(Request $request)
    {
        $authorityId = $request->id;
        $delete = Authority::find($authorityId);
        if($delete->checkUrlAttribute()) {
            Storage::delete($delete->path);
        }
        $delete->delete();
        if($request->ajax()){
            return response()->json(['status' => 'success']);
        }
        return redirect()->route('admins.authority.index');
    }

    public function delete_authority($id)
    {
      $delete = Authority::where('id',$id)->delete();

      return back()->with('success','You successfully delete authority!');

    }

}
