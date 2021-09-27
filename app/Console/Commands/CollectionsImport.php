<?php

namespace App\Console\Commands;

use App\BankLogo;
use Illuminate\Console\Command;

class CollectionsImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collections:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $file = fopen(storage_path("furnishers/collection.csv"), "r");

        $header = NULL;
        if ( $file !== FALSE) {
            while (($row = fgetcsv($file, 1000, ',')) !== FALSE) {
                if (!$header) {
                    $header = $row;
                } else {

                    $info = array_combine($header, $row);
                    if ($info["Country"] != "USA") {
                        continue;
                    }

                    $furnisher = BankLogo::leftJoin('bank_addresses', 'bank_logos.id', '=', 'bank_addresses.bank_logo_id')
                        ->where('bank_logos.name', '=', $info["Company Name"])
                        ->orWhere('bank_addresses.street', '=', $info["Street Address"])->first();

                    if(!empty($furnisher)) {
                        continue;
                    }

                    $bank =
                        [
                            "name" => $info["Company Name"],
                            "type" => 5,
                            "bank_addresses" => [
                                [
                                    "type" => "executive_address",
                                    "street" => $info["Street Address"],
                                    "city" => $info["City"],
                                    "state" => $info["State"],
                                    "zip" => $info["Postal Code"],
                                    "phone_number" => $info["Contact Phone Number"],
                                    "name" => $info["Contact Name"],
                                    "email" => $info["Contact Email"],

                                ],
                                [
                                    "type" => "registered_agent"
                                ]
                            ],
                        ];
                    $b =  BankLogo::create($bank);
                    $b->bankAddresses()->createMany($bank["bank_addresses"]);
                }
            }
            fclose($file);
        }
        dd("done");
    }
}
