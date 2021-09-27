<?php

namespace App\Console\Commands;

use App\BankLogo;
use Illuminate\Console\Command;

class medicalInsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'medical:insert';

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
        $file = fopen(storage_path("furnishers/8062.csv"), "r");
        $header = NULL;
        $data = array();
        if ( $file !== FALSE) {
            while (($row = fgetcsv($file, 1000, ',')) !== FALSE) {
                if (!$header) {

                    $header = $row;
                } else {
                    $info = array_combine($header, $row);
                    if (in_array($info["Company"], $data)) {
                        continue;
                    }
                    $data[] = $info["Company"];

                    $bank =
                        [
                            "name" => $info["Company"],
                            "type" => 5,
                            "bank_addresses" => [
                                [
                                    "type" => "executive_address",
                                    "street" => $info["Address"],
                                    "city" => $info["City"],
                                    "state" => $info["State"],
                                    "zip" => $info["Zip"],
                                    "phone_number" => $info["Phone"],
                                    "name" => $info["Contact"],

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
    }
}
