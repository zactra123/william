<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\AllowedIp;
use App\SiteSettings;
use App\Translation;
use Response;
use Auth;
use Hash;

class TranslationController extends Controller
{
    /**
     * TranslationController constructor.
     * Should access only logged in user with Super Admin("superadmin") Role
     * Super Admin can view receptionists list, create, update or delete an receptionist
     * Created receptionist should have Ip address(es), which require to access Admin pages
     */
    public function __construct()
    {
        // $this->middleware(['auth']);
    }

    /**
     * Return View Translation Settings
     */
    public function index()
    {
       $translation = Translation::orderby('id','desc')->get();
      return view('owner.translation.index',compact('translation'));
    }

    /**
     * Create Translation
     */
     public function create()
     {
       return view('owner.translation.create');
     }

     /**
      * Store Translation
      */
      public function store(Request $request)
      {
        $translate = new Translation();
        $translate->key = $request->key;
        $translate->english = $request->english;
        $translate->spanish = $request->spanish;
        $translate->french = $request->french;
        $translate->german = $request->german;
        $translate->save();
        return back()->with('success','You successfully add translation!');
      }

      /**
       * Edit Translation
       */
       public function edit($id)
       {
         $translation = Translation::where('id',$id)->first();
         return view('owner.translation.create', compact('translation'));
       }

       /**
        * Update Translation
        */
        public function update(Request $request)
        {
          $translate = Translation::where('id',$request->id)->update([
          'key' => $request->key,
          'english' => $request->english,
          'spanish' => $request->spanish,
          'french' => $request->french,
          'german' => $request->german
          ]);

          return back()->with('success','You successfully update translation!');
        }

        /**
         * Delete Translation
         */
         public function delete($id)
         {
           $delete = Translation::where('id',$id)->delete();
           return back()->with('success','You successfully delete translation!');
         }

       /**
        * Change Language
        */
        public function change_language($lang)
        {
              setcookie("language_cookie", $lang, time() + (86400 * 30) , "/"); // 86400 = 1 day

              // if (isset($_COOKIE['language_cookie'])) {
              //   $lang = $_COOKIE['language_cookie'];
              //   return $lang;
              // }
              return back();
        }
}
