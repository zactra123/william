<?php

namespace App\Console\Commands;

use App\BankLogo;
use Illuminate\Console\Command;

class CollectionTypes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collection:types';

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
        $collection = BankLogo::where('additional_information', '!=', null)
            ->get();

        $rdPartyCa = ['Affiliate', ' Miscellaneous services', 'Third Party Collections', 'Outsourced First Party or Billing Company', 'Commercial accounts accepted', 'All types of health care accounts', ' All types of professional accounts accepted',  ];
        $assetBuyer = "Asset Buying Company";
        $lawFirm = ['Law Firm','Legal collection network', 'Attorney', 'Partner', ' LLP', ' PC'];


        foreach ($collection as $id =>$item){
            $additional_information = $item->additional_information;
            $additional_information["collection_type"] = [];
            foreach($rdPartyCa as $check1){
                if (!empty($item->additional_information['collection_info1']) && strpos(strtolower($item->additional_information['collection_info1']), strtolower($check1)) !== FALSE) {
                    $additional_information["collection_type"][] = "3RD PARTY CA" ;
                    break;
                }elseif(!empty($item->additional_information['collection_info2']) && strpos(strtolower($item->additional_information['collection_info2']), strtolower($check1)) !== FALSE){
                    $additional_information["collection_type"][] = "3RD PARTY CA" ;
                    break;
                }
            }
            if (!empty($item->additional_information['collection_info1']) && strpos(strtolower($item->additional_information['collection_info1']), strtolower($assetBuyer)) !== FALSE) {
                $additional_information["collection_type"][] =  "ASSET BUYER CA" ;
            }elseif(!empty($item->additional_information['collection_info2']) && strpos(strtolower($item->additional_information['collection_info2']), strtolower($assetBuyer)) !== FALSE){
                $additional_information["collection_type"][]= "ASSET BUYER CA" ;
            }
            foreach($lawFirm as $check2){
                if (!empty($item->additional_information['collection_info1']) && strpos(strtolower($item->additional_information['collection_info1']), strtolower($check2)) !== FALSE) {
                    $additional_information["collection_type"][]= "LAW FIRM CA" ;
                    break;
                }elseif(!empty($item->additional_information['collection_info2']) && strpos(strtolower($item->additional_information['collection_info2']), strtolower($check2)) !== FALSE){
                    $additional_information["collection_type"][] = "LAW FIRM CA" ;
                    break;
                }elseif(strpos($item->name, $check2) !== FALSE){
                    $additional_information["collection_type"][] = "LAW FIRM CA" ;
                    break;
                }

            }
            $item->additional_information = $additional_information;
            $item->save();


        }
        echo "done";
    }
}
