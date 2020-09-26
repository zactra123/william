<?php

namespace App\Http\Controllers;

use App\BankLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function showBankLogo()
    {
        $banksLogos = DB::table('bank_logos')->paginate(10);
        return view('owner.bank.logo', compact('banksLogos'));

    }

    public function deleteBankLogo(Request $request)
    {

        $logId = $request->id;

        $delete = BankLogo::where('id', $logId);

        if (file_exists(public_path($delete->first()->path))) {
            unlink(public_path($delete->first()->path));
            $delete->delete();
        } else {
            $delete->delete();
        }
        return response()->json(['status' => 'success']);

    }
}
