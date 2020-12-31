<?php

namespace App\Console\Commands;

use App\BankLogo;
use Illuminate\Console\Command;

class CreditUnion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cu:types';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Federal credit union or credit union';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $credit_unions = json_decode(file_get_contents(storage_path('furnishers/credit_union_charter.json')), true);
        $cu_charters = json_decode(file_get_contents(storage_path('furnishers/charter_number_credit_unions.json')), true);
        $cu_charters = array_column($cu_charters,'charter_number');
        $fcu_charters = json_decode(file_get_contents(storage_path('furnishers/charter_number_federal_credit_unions.json')), true);
        $fcu_charters = array_column($fcu_charters,'charter_number');

        foreach ($credit_unions as $cu) {
            $type = "";
            if (in_array($cu["charter_number"], $cu_charters)) {
                $type = "CREDIT UNION";
            }
            if (in_array($cu["charter_number"], $fcu_charters)) {
                $type = "FEDERAL CREDIT UNION";
            }

            if (!empty($type)) {
                $banksLogos = BankLogo::join('bank_addresses', 'bank_logos.id', '=', 'bank_addresses.bank_logo_id')
                    ->where("bank_logos.name", $cu["bank_name"])
                    ->where("bank_addresses.street", $cu["address"])
                    ->where("bank_addresses.city", $cu["city"])
                    ->where("bank_addresses.zip", $cu["zip_code"])
                    ->where("bank_addresses.state", $cu["state"])
                    ->select("bank_logos.*")
                    ->first();

                if ($banksLogos) {
                    // yete arden ka anuni mej
                    if (strpos( mb_strtolower($banksLogos["name"]),  "credit union") != false){
                        continue;
                    }
                    $banksLogos->name = implode(" ", [$banksLogos->name, $type]);
                    $banksLogos->save();
                }
            }
        }

        dd("done");
    }
}
