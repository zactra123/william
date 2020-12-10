<?php

namespace App\Console\Commands;

use App\BankAddress;
use App\BankLogo;
use Illuminate\Console\Command;

class importCollections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:collection';

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
        $collectionPath= storage_path('furnishers/collectionXumb.json');
        $collectionJson = json_decode(file_get_contents($collectionPath), true);
        foreach ($collectionJson as $collection){
            $additional = $collection;
            unset($additional['collection_street']);
            unset($additional['collection_city']);
            unset($additional['collection_state']);
            unset($additional['collection_zip']);
            unset($additional['collection_phone']);
            unset($additional['collection_fax']);
            unset($additional['collection_name']);

            $bankAddress = [
                'type' =>  'executive_address',
                'street' =>$collection['collection_street'],
                'city' =>$collection['collection_city'],
                'state' =>$collection['collection_state'],
                'zip' =>$collection['collection_zip'],
                'phone_number' =>isset($collection['collection_phone'])?$collection['collection_phone']:null,
                'fax_number' =>isset($collection['collection_fax'])?$collection['collection_fax']:null,

            ];
            $bankLogo =[
                'name' =>$collection['collection_name'],
                'additional_information'=>$additional
            ] ;
            $credit_union = BankLogo::create($bankLogo);
            $bankAddress['bank_logo_id'] = $credit_union->id;
            BankAddress::create($bankAddress);
            BankAddress::create([
                'bank_logo_id'=>$credit_union->id,
                'type' =>  'registered_agent',
            ]);


        }
        echo "done";
    }
}
