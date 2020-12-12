<?php

namespace App\Console\Commands;

use App\BankAddress;
use App\BankLogo;
use Illuminate\Console\Command;

class CollectionExecutiveName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collection:executive_name';

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
        $bank = BankLogo::where('additional_information', '!=', null)->get();
        $data = [];
        foreach ($bank as $item) {
            if (count($item->additional_information) > 2) {
                $name = explode(',', $item->additional_information['collection_contact1']);
            } else {
                $name = explode(',', $item->additional_information['collection_info1']);
            }

            $data[] = [
                'bank_logo_id' => $item->id,
                'name' => $name[0]
            ];

            $bankLogoId = $item->id;
            $name = $name[0];
            BankAddress::where('bank_logo_id', $bankLogoId)
                ->where('type', 'executive_address')
                ->update(['name'=> $name]);
        }
        echo "done";
    }
}
