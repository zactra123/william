<?php

namespace App\Console\Commands;

use App\BankLogo;
use Illuminate\Console\Command;

class CollectionRemoveAllDuplicates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collection:remove_all_dup';

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
        $bank = BankLogo::
        Join('bank_addresses', 'bank_logos.id', '=', 'bank_addresses.bank_logo_id')
            ->where('bank_logos.additional_information', '!=', null)
            ->where('bank_addresses.type', 'executive_address')
            ->select('bank_logos.id as bankId', 'bank_logos.name as bankName', 'bank_addresses.*')
            ->get();

        $deleteCollection = [];
        foreach ($bank as $item){
            if(in_array($item->bankId, $deleteCollection)){
                continue;
//                dd($item->bankId, $deleteCollection);
            }

            $delete = BankLogo::
            Join('bank_addresses', 'bank_logos.id', '=', 'bank_addresses.bank_logo_id' )
                ->where('bank_logos.id', '!=', $item->bankId)
                ->where('bank_logos.name', $item->bankName)
                ->where('bank_addresses.name', $item->name)
                ->where('additional_information', '!=', null)
                ->where('bank_addresses.type', 'executive_address')
                ->pluck('bank_logos.id')->toArray();

            $deleteCollection = array_merge($deleteCollection, $delete);

            BankLogo::destroy(array_values($delete));
        }
    }
}
