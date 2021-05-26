<?php

namespace App\Console\Commands;

use App\BankAddress;
use Illuminate\Console\Command;

class replcaeAddresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bank:replace_addresses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Replace in Bank addresses # DRIVE=DR. STREET=ST. AVENUE=AVE. BOULVARD=BLVD. CIRCLE=CIR. COURT=CT. EXPRESSWAY=EXPY. FREEWAY=FWY. LANE=LN. PARKWAY=PKY. SQUARE=SQ. SUIT=STE. UNIT=STE';

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
        $bank_addresses = BankAddress::all();

        foreach ($bank_addresses as $address) {
            if( strpos(strtoupper($address->street),"AVENUE OF STARS") == false) {
                $street_name = str_replace("AVENUE","AVE.,",strtoupper($address->street));
            }

            $street_name = str_replace("DRIVE","DR.,",strtoupper($street_name));
            $street_name = str_replace("STREET","ST.,",strtoupper($street_name));
            $street_name = str_replace("BOULVARD","BLVD.,",strtoupper($street_name));
            $street_name = str_replace("CIRCLE","CIR.,",strtoupper($street_name));
            $street_name = str_replace("COURT","CT.,",strtoupper($street_name));
            $street_name = str_replace("EXPRESSWAY","EXPY.,",strtoupper($street_name));
            $street_name = str_replace("FREEWAY","FWY.,",strtoupper($street_name));
            $street_name = str_replace("LANE","LN.,",strtoupper($street_name));
            $street_name = str_replace("PARKWAY","PKY.,", $street_name);
            $street_name = str_replace("SQUARE","SQ.,", $street_name);
            $street_name = str_replace("SUITE ","STE. ", $street_name);
            $street_name = str_replace("SUIT ","STE. ", $street_name);
//            $street_name = str_replace("UNIT ","STE.", $street_name);
            $street_name = str_replace(",,",",", $street_name);
            $street_name = trim($street_name, ',');
            if (strtoupper($address->street) != $street_name) {
                echo $address->street . '--> ' . $street_name;
                echo "\r\n";
                $address->street = $street_name;
                $address->save();
            }
        }
        echo "done";

    }
}
