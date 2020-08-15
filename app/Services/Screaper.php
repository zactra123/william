<?php

namespace App\Services;
use App\User;
use App\ClientReport;

class Screaper
{
    protected $client_id;

    public function __construct($id = null)
    {
     $this->client_id = $id;
    }

    public function transunion_dispute($arguments = [])
    {
//        if ($client_id) {
//            $cilient = User::find($client_id);
//            $username = $client->credentials
//            $password =
//        }
        array_push($arguments, $this->client_id);
        $command = $this->make_run_command('transunion_dispute.py',$arguments);
        $output = shell_exec($command);
        dd($output);
    }

    public function trnsunion_membership( $arguments = [])
    {
        array_push($arguments, $this->client_id);
        $command = $this->make_run_command('transunion_payment_status.py',$arguments);
        $output = shell_exec($command);
        $this->prepare_transunion_membership_data(str_replace('\'', '"',$output));
    }

    public function experian_login($arguments = [])
    {
        array_push($arguments, $this->client_id);
        $command = $this->make_run_command('experian_login.py',$arguments);
        $output = shell_exec($command);
        dd($output);
    }

    public function experian_view_report($arguments = [])
    {
        array_push($arguments, $this->client_id);
        $command = $this->make_run_command('experian_view_report.py',$arguments);
//        dd($command);
        $output = shell_exec($command);
        var_dump($output);
        dd('asd');
        $output = "{'status': 'success', 'report_filepath': '../storage/reports/areev/experian_view_report/report_data_2020_08_15_15_32_53.json'}";
        $this->prepare_experian_view_report_data(str_replace('\'', '"',$output));
        dd($output);
    }


    private function make_run_command($script_name, $command_args)
    {
        $script_path = resource_path('scripts/'. $script_name);
        $command_args = array_merge(['python3', $script_path], $command_args);
        $command = escapeshellcmd(implode( " ", $command_args));
        return $command;
    }

    public function prepare_experian_login_data()
    {

//        $path = public_path() . "/Data_ARUTYUN.json";
        $path = public_path() . "/Data_TIGRAN,.json";
        $json = json_decode(file_get_contents($path), true);
        $type = 'EX_LOG';

        $reportNumber = $json['id']?$json['id']:null;
        $reportDate = $json['date']?$json['date']:null;
        $full_name = null;
        if(!empty($json['consumerName'])){
            $full_name = $json['consumerName']['firstName'].' '.$json['consumerName']['lastName'];
        }
        $dob = isset($json['consumerDOB']['dateOfBirth'])?$json['consumerDOB']['dateOfBirth']:null;

        $dataClientReports = [
            'user_id' => $this->client_id,
            'type' => $type,
            'full_name' => $full_name,
            'ssn' => null,
            'dob' => $dob,
            'report_date' => $reportDate,
            'report_number'=> $reportNumber,
            'current_address' => null,
            'current_phone' => null,
            'file_path' => $path
        ];

        $dataName = [];
        if(!empty($json['consumerInfoNames'])){
            foreach($json['consumerInfoNames'] as $info){
                $fullName = $info['name']['firstName'];
                $fullName = $info['name']['middleName'] != "" ? $fullName. ' '. $info['name']['middleName'] :$fullName;
                $fullName = $fullName. ' '.$info['name']['lastName'];
                $nin = $info['nin'];
                $dataName[] = [
                    'client_report_id' => 'id',
                    'full_name'=> $fullName,
                    'nin'=> $nin
                ] ;
            }
        }

        $dataPhone = [];
        if(!empty($json['consumerInfoPhones'])){
            foreach($json['consumerInfoPhones'] as $infoPhone)
            {
                $phone = $infoPhone['telephone']['number'];
                $type = $infoPhone['telephone']['tail'];
                $dataPhone[] = [
                    'client_report_id' => 'id',
                    'current'=> 0,
                    'number'=> $phone,
                    'type'=> $type
                ] ;
            }
        }

        $dataAddress = [];
        if(!empty($json['consumerInfoAddresses'])){
            foreach($json['consumerInfoAddresses'] as $infoAddress)
            {
                $street = $infoAddress['address']['street'];
                $city = $infoAddress['address']['city'];
                $state = $infoAddress['address']['state'];
                $zip = $infoAddress['address']['zip'];
                $type = $infoAddress['type']['type'];
                $ain = $infoAddress['ain'];

                $dataAddress[] = [
                    'client_report_id' => 'id',
                    'current'=> 0,
                    'street' => $street,
                    'city' => $city,
                    'state'=>$state,
                    'zip'=> $zip,
                    'type'=>$type,
                    'ain'=>$ain,
                    'geographical_code' => null,
                    'date_reported'=>null
                ] ;
            }
        }

        $dataEmployer = [];
        if(!empty($json['consumerInfoEmployers'])){
            foreach($json['consumerInfoEmployers'] as $infoEmployer)
            {
                $name = $infoEmployer['name'];
                $street = $infoEmployer['address']['street'];
                $city = $infoEmployer['address']['city'];
                $state = $infoEmployer['address']['state'];
                $zip = $infoEmployer['address']['zip'];
                $phone = $infoEmployer['address']['telephone']['number'];
                $phoneTail = $infoEmployer['address']['telephone']['tail'];

                $dataEmployer[] = [
                    'client_report_id' => 'id',
                    'current'=> 0,
                    'name' => $name,
                    'occupation' => null,
                    'street' => $street,
                    'city' => $city,
                    'state'=>$state,
                    'zip'=> $zip,
                    'phone'=>$phone,
                    'type'=>$phoneTail,
                ] ;
            }
        }

        $dataPublicRecords = [];
        if(!empty($json['publicRecords'])){
            foreach($json['publicRecords'] as $infoPublicRecords)
            {
                $dataPublicRecords[] = [
                    'client_report_id' =>'id',
                    'is_dispute' => $infoPublicRecords['auxData']['isDisputable'],
                    'under_dispute' => $infoPublicRecords['auxData']['underDispute'],
                    'negative_item' =>$infoPublicRecords['auxData']['negativeItem'],
                    'date_filed' => $infoPublicRecords['dateFiled'],
                    'date_resolved' => $infoPublicRecords['dateResolved'],
                    'responsibility' => $infoPublicRecords['responsibility'],
                    'claim_amount' => $infoPublicRecords['claimAmount'],
                    'liability_amount' => $infoPublicRecords['liabilityAmount'],
                    'source_name' => $infoPublicRecords['sourceName'],
                    'source_id' => $infoPublicRecords['sourceId'],
                    'location_number' => $infoPublicRecords['locationNumber'],
                    'source_address_street' => $infoPublicRecords['sourceAddress']['street'],
                    'source_address_city' => $infoPublicRecords['sourceAddress']['city'],
                    'source_address_state' => $infoPublicRecords['sourceAddress']['state'],
                    'source_address_zip' => $infoPublicRecords['sourceAddress']['zip'],
                    'source_address_phone' => $infoPublicRecords['sourceAddress']['telephone']['number'],
                    'source_address_phone_type' => $infoPublicRecords['sourceAddress']['telephone']['tail'],
                    'ain' => $infoPublicRecords['ain'],
                    'your_statement' => $infoPublicRecords['yourStatement'],
                    'reinvestigation' => $infoPublicRecords['reinvestigation'],
                    'plaintiff' => $infoPublicRecords['plaintiff'],
                    'status' => $infoPublicRecords['status'],
                    'on_record_until' => $infoPublicRecords['onRecordUntil'],
                ];
            }
        }

        if(!empty($json['negativeTradeRecords'])){
            foreach($json['negativeTradeRecords'] as $infoNegativeTrade) {
                $dataAccount = [
                    'client_report_id' => 'id',
                    'is_dispute' => $infoNegativeTrade['auxData']['isDisputable'],
                    'under_dispute' => $infoNegativeTrade['auxData']['underDispute'],
                    'negative_item' => true,
                    'opened_date' => $infoNegativeTrade['openedDate'],
                    'report_started_date' => $infoNegativeTrade['reportStartedDate'],
                    'status_date' => $infoNegativeTrade['statusDate'],
                    'last_reported_date' => $infoNegativeTrade['lastReportedDate'],
                    'type' => $infoNegativeTrade['type'],
                    'classification' => $infoNegativeTrade['classification'],
                    'term' => $infoNegativeTrade['term'],
                    'monthly_payment' => $infoNegativeTrade['monthlyPayment'],
                    'responsibility' => $infoNegativeTrade['responsibility'],
                    'credit_limit' => $infoNegativeTrade['creditLimitOrBalance'],
                    'credit_limit_label' =>$infoNegativeTrade['creditLimitOrBalanceLabel'],
                    'high_balance' => $infoNegativeTrade['highBalance'],
                    'source_name' => $infoNegativeTrade['sourceName'],
                    'source_id' => $infoNegativeTrade['sourceId'],
                    'source_address_street' => $infoNegativeTrade['sourceAddress']['street'],
                    'source_address_city' => $infoNegativeTrade['sourceAddress']['city'],
                    'source_address_state' => $infoNegativeTrade['sourceAddress']['state'],
                    'source_address_zip' => $infoNegativeTrade['sourceAddress']['zip'],
                    'source_address_phone' => $infoNegativeTrade['sourceAddress']['telephone']['number'],
                    'source_address_phone_type' => $infoNegativeTrade['sourceAddress']['telephone']['tail'],
                    'ain' => $infoNegativeTrade['ain'],
                    'original_creditor' => $infoNegativeTrade['originalCreditor'],
                    'sold_to' => $infoNegativeTrade['soldTo'],
                    'purchased_from' => $infoNegativeTrade['purchasedFrom'],
                    'mortgage_id' => $infoNegativeTrade['status'],
                    'recent_balance_date' => !empty($infoNegativeTrade['recentBalance']) ? $infoNegativeTrade['recentBalance']['date'] : null,
                    'recent_balance_amount' => !empty($infoNegativeTrade['recentBalance']) ? $infoNegativeTrade['recentBalance']['amount'] : null,
                    'recent_balance_pay_amount' => !empty($infoNegativeTrade['recentBalance']) ? $infoNegativeTrade['recentBalance']['payAmount'] : null,
                    'status' => $infoNegativeTrade['status'],
                    'statement' => $infoNegativeTrade['statement'],
                    'reinvestigation' => $infoNegativeTrade['reinvestigation'],
                    "positive" => $infoNegativeTrade['positive'],
                    "secondary_agency_name_as_title" => $infoNegativeTrade['secondaryAgencyNameAsTitle'],
                    "secondary_agency_id" => $infoNegativeTrade['secondaryAgencyId'],
                    "on_record_until" => $infoNegativeTrade['onRecordUntil'],
                    "complianceCode" => $infoNegativeTrade['complianceCode'],
                    "subscriberStatement" => $infoNegativeTrade['subscriberStatement'],
                ];

                $dataAccountPayStates = [];
                $dataAccountLimitHighBalances = [];
                $dataAccountBalanceHistories = [];
                if (!empty($infoNegativeTrade['payStates'])) {
                    foreach ($infoNegativeTrade['payStates'] as $payState) {
                        $dataAccountPayStates[] = [
                            'experian_account_id' => 'id',
                            'name' => $payState
                        ];
                    }

                }

                if (!empty($infoNegativeTrade['limitHighBalances'])) {
                    foreach ($infoNegativeTrade['limitHighBalances'] as $limitHighBalances) {
                        $dataAccountLimitHighBalances[] = [
                            'experian_account_id' => 'id',
                            'name' => $limitHighBalances
                        ];
                    }

                }
                if (!empty($infoNegativeTrade['balanceHistories'])) {
                    foreach ($infoNegativeTrade['balanceHistories'] as $balanceHis) {
                        $dataAccountBalanceHistories[] = [
                            'experian_account_id' => 'id',
                            "date" => $balanceHis['date'],
                            "amount" => $balanceHis['amount'],
                            "date_PR" => $balanceHis['datePR'],
                            "amount_Sch" => $balanceHis['amountSch'],
                            "amount_act" => $balanceHis['amountAct']

                        ];

                    }

                }

                if (!empty($infoNegativeTrade['paymentHistories'])) {
                    foreach ($infoNegativeTrade['paymentHistories'] as $paymentHistories) {
                        $dataAccountBalanceHistories[] = [
                            'experian_account_id' => 'id',
                            "month" => $paymentHistories['month'],
                            "day" => $paymentHistories['day'],
                            "year" => $paymentHistories['year'],
                            "status" => $paymentHistories['status'],

                        ];

                    }

                }
            }
        }

        if(!empty($json['positiveTradeRecords'])){
            foreach($json['positiveTradeRecords'] as $infoPositiveTrade) {
                $dataAccount = [
                    'client_report_id' => 'id',
                    'is_dispute' => $infoPositiveTrade['auxData']['isDisputable'],
                    'under_dispute' => $infoPositiveTrade['auxData']['underDispute'],
                    'negative_item' => false,
                    'opened_date' => $infoPositiveTrade['openedDate'],
                    'report_started_date' => $infoPositiveTrade['reportStartedDate'],
                    'status_date' => $infoPositiveTrade['statusDate'],
                    'last_reported_date' => $infoPositiveTrade['lastReportedDate'],
                    'type' => $infoPositiveTrade['type'],
                    'classification' => $infoPositiveTrade['classification'],
                    'term' => $infoPositiveTrade['term'],
                    'monthly_payment' => $infoPositiveTrade['monthlyPayment'],
                    'responsibility' => $infoPositiveTrade['responsibility'],
                    'credit_limit' => $infoPositiveTrade['creditLimitOrBalance'],
                    'credit_limit_label'=> $infoPositiveTrade['creditLimitOrBalanceLabel'],
                    'high_balance' => $infoPositiveTrade['highBalance'],
                    'source_name' => $infoPositiveTrade['sourceName'],
                    'source_id' => $infoPositiveTrade['sourceId'],
                    'source_address_street' => $infoPositiveTrade['sourceAddress']['street'],
                    'source_address_city' => $infoPositiveTrade['sourceAddress']['city'],
                    'source_address_state' => $infoPositiveTrade['sourceAddress']['state'],
                    'source_address_zip' => $infoPositiveTrade['sourceAddress']['zip'],
                    'source_address_phone' => $infoPositiveTrade['sourceAddress']['telephone']['number'],
                    'source_address_phone_type' => $infoPositiveTrade['sourceAddress']['telephone']['tail'],
                    'ain' => $infoPositiveTrade['ain'],
                    'original_creditor' => $infoPositiveTrade['originalCreditor'],
                    'sold_to' => $infoPositiveTrade['soldTo'],
                    'purchased_from' => $infoPositiveTrade['purchasedFrom'],
                    'mortgage_id' => $infoPositiveTrade['status'],
                    'recent_balance_date' => !empty($infoPositiveTrade['recentBalance']) ? $infoPositiveTrade['recentBalance']['date'] : null,
                    'recent_balance_amount' => !empty($infoPositiveTrade['recentBalance']) ? $infoPositiveTrade['recentBalance']['amount'] : null,
                    'recent_balance_pay_amount' => !empty($infoPositiveTrade['recentBalance']) ? $infoPositiveTrade['recentBalance']['payAmount'] : null,
                    'status' => $infoPositiveTrade['status'],
                    'statement' => $infoPositiveTrade['statement'],
                    'reinvestigation' => $infoPositiveTrade['reinvestigation'],
                    "positive" => $infoPositiveTrade['positive'],
                    "secondary_agency_name_as_title" => $infoPositiveTrade['secondaryAgencyNameAsTitle'],
                    "secondary_agency_id" => $infoPositiveTrade['secondaryAgencyId'],
                    "on_record_until" => $infoPositiveTrade['onRecordUntil'],
                    "complianceCode" => $infoPositiveTrade['complianceCode'],
                    "subscriberStatement" => $infoPositiveTrade['subscriberStatement'],
                ];
                $dataAccountPayStates = [];
                $dataAccountLimitHighBalances = [];
                $dataAccountBalanceHistories = [];
                if (!empty($infoPositiveTrade['payStates'])) {
                    foreach ($infoPositiveTrade['payStates'] as $payState) {
                        $dataAccountPayStates[] = [
                            'experian_account_id' => 'id',
                            'name' => $payState
                        ];
                    }

                }

                if (!empty($infoPositiveTrade['limitHighBalances'])) {
                    foreach ($infoPositiveTrade['limitHighBalances'] as $limitHighBalances) {
                        $dataAccountLimitHighBalances[] = [
                            'experian_account_id' => 'id',
                            'name' => $limitHighBalances
                        ];
                    }

                }
                if (!empty($infoPositiveTrade['balanceHistories'])) {
                    foreach ($infoPositiveTrade['balanceHistories'] as $balanceHis) {
                        $dataAccountBalanceHistories[] = [
                            'experian_account_id' => 'id',
                            "date" => $balanceHis['date'],
                            "amount" => $balanceHis['amount'],
                            "date_pr" => $balanceHis['datePR'],
                            "amount_sch" => $balanceHis['amountSch'],
                            "amount_act" => $balanceHis['amountAct']

                        ];

                    }

                }

                if (!empty($infoPositiveTrade['paymentHistories'])) {
                    foreach ($infoPositiveTrade['paymentHistories'] as $paymentHistories) {
                        $dataAccountBalanceHistories[] = [
                            'experian_account_id' => 'id',
                            "month" => $paymentHistories['month'],
                            "day" => $paymentHistories['day'],
                            "year" => $paymentHistories['year'],
                            "status" => $paymentHistories['status'],

                        ];

                    }


                }
            }
        }
        $dataInquiry = [];
        if(!empty($json['inquiryOthers'])){
            foreach($json['inquiryOthers'] as $inquiryOthers){

                $dataInquiry = [
                    'client_report_id' => 'id',
                    'is_dispute' => $inquiryOthers['auxData']['isDisputable'],
                    'under_dispute' => $inquiryOthers['auxData']['underDispute'],
                    'subscriber_id' => $inquiryOthers['auxData']['subscriberID'],
                    'negative_item' => true,
                    'ain'=> $inquiryOthers['subscriberID'],
                    'end_user' =>  null,
                    'source_name' => $inquiryOthers['sourceName'],
                    'source_address_street' => $inquiryOthers['sourceAddress']['street'],
                    'source_address_city' => $inquiryOthers['sourceAddress']['city'],
                    'source_address_state' => $inquiryOthers['sourceAddress']['state'],
                    'source_address_zip' => $inquiryOthers['sourceAddress']['zip'],
                    'source_address_phone' => $inquiryOthers['sourceAddress']['telephone']['number'],
                    'source_address_phone_type' => $inquiryOthers['sourceAddress']['telephone']['tail'],
                    'date_of_inquiry' => $inquiryOthers['dateOfInquiry'],
                    'comment' => $inquiryOthers['comment'],
                    'permissible_purpose' => null,
                ];

            }

        }
        if(!empty($json['consumerInquiries'])){
            foreach($json['consumerInquiries'] as $consumerInquiries){

                $dataInquiry = [
                    'client_report_id' => 'id',
                    'is_dispute' => $consumerInquiries['auxData']['isDisputable'],
                    'under_dispute' => $consumerInquiries['auxData']['underDispute'],
                    'subscriber_id' => $consumerInquiries['auxData']['subscriberID'],
                    'negative_item' => false,
                    'ain'=> null,
                    'end_user' =>  $consumerInquiries['end_user'],
                    'source_name' => $consumerInquiries['sourceName'],
                    'source_address_street' => $consumerInquiries['sourceAddress']['street'],
                    'source_address_city' => $consumerInquiries['sourceAddress']['city'],
                    'source_address_state' => $consumerInquiries['sourceAddress']['state'],
                    'source_address_zip' => $consumerInquiries['sourceAddress']['zip'],
                    'source_address_phone' => $consumerInquiries['sourceAddress']['telephone']['number'],
                    'source_address_phone_type' => $consumerInquiries['sourceAddress']['telephone']['tail'],
                    'date_of_inquiry' => null,
                    'comment' => null,
                    'permissible_purpose' => $consumerInquiries['permissiblePurpose'],
                ];

                if(!empty($consumerInquiries['dateOfInquiry'])){
                    foreach ($consumerInquiries['dateOfInquiry'] as $dateOfInquiry) {
                        $dataAccountLimitHighBalances[] = [
                            'experian_account_id' => 'id',
                            'name' => $dateOfInquiry
                        ];
                    }

                }

            }

        }


    }

    public function prepare_experian_view_report_data($output)
    {
        $data = json_decode($output, true);

        if($data['status'] != 'success') {

            return false;
        }

        $path = storage_path($data["report_filepath"]);

        $json = json_decode(file_get_contents($path), true);
        $type = 'EX_VIEW';

        $dob = !empty($json['other_personal_information']) && isset($json['other_personal_information'][0]['year of birth']) ?
            $json['other_personal_information'][0]['year of birth'] : null;

        $full_name = !empty($json['personal_infomation']) && isset($json['personal_infomation'][0]['name']) ?
            $json['personal_infomation'][0]['name'] : null;

        $dataClientReports = [
            'user_id' => $this->client_id,
            'type' => $type,
            'full_name' => $full_name,
            'ssn' => null,
            'dob' => $dob,
            'report_date' => date('m-d-Y'),
            'report_number' => null,
            'current_address' => null,
            'current_phone' => null,
            'file_path' => $path
        ];
//        $clientReport = ClientReport::create($dataClientReports);
        $clientReport = ClientReport::find(1);

        $dataName = [];
        $dataAddress = [];
        $dataEmployer = [];
        $dataPhone = [];
        $dataPublicRecords = [];

        if (!empty($json['personal_infomation'])) {
            foreach ($json['personal_infomation'] as $nameInfo) {
                $dataName[] = [
                    'full_name' => $nameInfo['name'],
                    'nin' => $nameInfo['name_identification_number']
                ];
            }
//            $clientReport->clientNames()->createMany($dataName);
        }

        //address
        if (!empty($json['address'])) {
            foreach ($json['address'] as $infoAddress) {
                $address = $this->splitAddress($infoAddress['address']);
                $type = $infoAddress['residence_type'];
                $ain = $infoAddress['address_identification_number'];
                $geographicalCode = $infoAddress['geographical_code'];
                $dataAddress[] = [
                    'current' => 0,
                    'street' => $address['street'],
                    'city' => $address['city'],
                    'state' => $address['state'],
                    'zip' => $address['zip'],
                    'type' => $type,
                    'ain' => $ain,
                    'geographical_code' => $geographicalCode,
                    'date_reported'=>null
                ];
            }

//            $clientReport->clientAddresses()->createMany($dataAddress);
        }
        //other_personal_information
        if (!empty($json['other_personal_information'])) {
            foreach ($json['other_personal_information'] as $phoneEmployer) {
                if (isset($phoneEmployer['telephone_number'])) {
                    $dataPhone[] = [
                        'current' => 0,
                        'number' => $phoneEmployer['telephone_number'],
                        'type' => $phoneEmployer['telephone_type']
                    ];
                }

                if (isset($phoneEmployer['employer'])) {
                    $address = $this->splitAddress($phoneEmployer['address']);

                    $dataEmployer[] = [
                        'current' => 0,
                        'name' => $phoneEmployer['employer'],
                        'occupation' => null,
                        'street' => $address['street'],
                        'city' => $address['city'],
                        'state' => $address['state'],
                        'zip' => $address['zip'],
                        'phone' => null,
                        'type' => null,
                    ];
                }
            }

            if (!empty($dataPhone)) {
//                $clientReport->ClientPhones()->createMany($dataPhone);
            }

            if (!empty($dataEmployer)) {
//                $clientReport->clientEmployers()->createMany($dataEmployer);
            }
        }

        //bankcrupcy_information
        if (!empty($json['bankcrupcy_information'])) {
            foreach ($json['bankcrupcy_information'] as $publicRecords) {

                $dataPublicRecords[] = [
                    'is_dispute' => null,
                    'under_dispute' => null,
                    'negative_item' => null,
                    'date_filed' => \DateTime::createFromFormat("m/Y", $publicRecords['date_filled'])->format("Y-m-d"),
                    'date_resolved' => \DateTime::createFromFormat("m/Y", $publicRecords['date_resolved'])->format("Y-m-d"),
                    'responsibility' => $publicRecords['responsibility'],
                    'claim_amount' => $publicRecords['claim_amount'],
                    'liability_amount' => $publicRecords['liability'],
                    'source_name' => $publicRecords['item_name'],
                    'source_id' => $publicRecords['item_number'],
                    'location_number' => null,
                    'source_address_street' => $publicRecords['address']['address'],
                    'source_address_city' => $publicRecords['address']['city'],
                    'source_address_state' => $publicRecords['address']['state'],
                    'source_address_zip' => $publicRecords['address']['zip'],
                    'source_address_phone' => $publicRecords['address']['phone'],
                    'source_address_phone_type' => null,
                    'ain' => $publicRecords['address']['identification_number'],
                    'your_statement' => null,
                    'reinvestigation' => $publicRecords['reinvestigation'],
                    'plaintiff' => null,
                    'status' => $publicRecords['value_status'],
                    'on_record_until' => \DateTime::createFromFormat("M Y", $publicRecords['onrecord_until'])->format("Y-m-d"),
                ];
            }

//            $clientReport->clientExPublicRecords()->createMany($dataPublicRecords);
        }
        //potentially statements
        if(!empty($json['potentially_statements'])){
            foreach ($json['potentially_statements'] as $negativeAccount) {
                if (!empty($negativeAccount['recent_balance']) && $negativeAccount['recent_balance'] != "Not reported") {
                    $regBalance = '/\$[0-9\,]{1,}/im';
                    $regDate = '/[0-9\/]{5,}/im';
                    preg_match($regBalance, $negativeAccount['recent_balance'], $matchesBalance);
                    preg_match($regDate, $negativeAccount['recent_balance'], $matchesBalanceDate);
                    $recentBalanceDate = isset($matchesBalanceDate[0]) ? $matchesBalanceDate[0] : null;
                    $recentBalancePayAmount = isset($matchesBalance[0]) ? $matchesBalance[0] : null;
                    if ($recentBalanceDate != null && $recentBalancePayAmount) {
                        $recentBalanceAmount = trim(str_replace([$recentBalancePayAmount, $recentBalanceDate],
                            '', $negativeAccount['recent_balance']));
                    } else {
                        $recentBalanceAmount = null;
                    }
                } else {
                    $recentBalanceDate = null;
                    $recentBalanceAmount = null;
                    $recentBalancePayAmount = null;
                }

                $dataAccount = [
                    'client_report_id' => 'id',
                    'is_dispute' => null,
                    'under_dispute' => null,
                    'negative_item' => false,
                    'opened_date' => $negativeAccount['date_opened'],
                    'report_started_date' => $negativeAccount['first_reported'],
                    'status_date' => $negativeAccount['date_status'],
                    'last_reported_date' => null,
                    'type' => $negativeAccount['account_type'],
                    'classification' => null,
                    'term' => $negativeAccount['term'],
                    'monthly_payment' => $negativeAccount['monthly_payment'],
                    'responsibility' => $negativeAccount['responsibility'],
                    'credit_limit' => $negativeAccount['credit_limit'],
                    'credit_limit_label' => null,
                    'high_balance' => $negativeAccount['high_balance'],
                    'source_name' => $negativeAccount['account_name'],
                    'source_id' => $negativeAccount['account_number'],
                    'source_address_street' => $negativeAccount['address'],
                    'source_address_city' => $negativeAccount['city'],
                    'source_address_state' => $negativeAccount['state'],
                    'source_address_zip' => $negativeAccount['zip'],
                    'source_address_phone' => $negativeAccount['phone'],
                    'source_address_phone_type' => null,
                    'ain' => $negativeAccount['identity'],
                    'original_creditor' => $negativeAccount['original_creditor'],
                    'sold_to' => $negativeAccount['sold_to'],
                    'purchased_from' => $negativeAccount['purchased_from'],
                    'mortgage_id' => $negativeAccount['mortage_id'],
                    'recent_balance_date' => $recentBalanceDate,
                    'recent_balance_amount' => $recentBalanceAmount,
                    'recent_balance_pay_amount' => $recentBalancePayAmount,
                    'status' => $negativeAccount['value_status'],
                    'statement' => $negativeAccount['statement'],
                    'reinvestigation' => null,
                    "secondary_agency_name" => $negativeAccount['agency_name'],
                    "secondary_agency_id" => $negativeAccount['agency_id'],
                    "on_record_until" => $negativeAccount['on_record_until'],
                    "complianceCode" => $negativeAccount['on_record_until'],
                    "subscriberStatement" => null,
                ];
                $dataAccountPayStates = [];
                $dataAccountLimitHighBalances = [];
                $dataAccountBalanceHistories = [];
                if (!empty($negativeAccount['pay_states'])) {

                    foreach ($negativeAccount['pay_states'] as $payState) {
                        $dataAccountPayStates[] = [
                            'experian_account_id' => 'id',
                            'name' => $payState
                        ];
                    }
                }
                if (!empty($negativeAccount['account_history'])) {
                    foreach ($negativeAccount['account_history'] as $paymentHistories) {
                        $dataAccountBalanceHistories[] = [
                            'experian_account_id' => 'id',
                            "month" => $paymentHistories['month'],
                            "day" => null,
                            "year" => $paymentHistories['year'],
                            "status" => $paymentHistories['value'],

                        ];
                    }
                }
                if(!empty($negativeAccount['balance_history'])){
                    foreach ($negativeAccount['balance_history'] as $balanceHistory){
                        $inString1 = 'The following data will appear in the following format:';
                        $inString2 = 'Date: account balance / date payment received / scheduled payment amount / actual amount paid';
                        $checkRegex = '/[A-z]{3}\s[0-9]{4}:/im';
                        if($balanceHistory != $inString1 && $balanceHistory != $inString2){
                            preg_match($checkRegex, $balanceHistory, $matachesNotEmpty);
                            if(!empty($matachesNotEmpty)){
                                $nextValue = explode(" / ", str_replace($matachesNotEmpty[0], '', $balanceHistory));

                                $dataAccountBalanceHistories[] = [
                                    'experian_account_id' => 'id',
                                    "date" =>str_replace(':','',$matachesNotEmpty[0]),
                                    "amount" => isset($nextValue[0])?trim($nextValue[0]):null,
                                    "date_pr" => isset($nextValue[1])?trim($nextValue[1]):null,
                                    "amount_sch" => isset($nextValue[2])?trim($nextValue[2]):null,
                                    "amount_act" => isset($nextValue[3])?trim($nextValue[3]):null
                                ];
                            }else{
                                $dataAccountLimitHighBalances[] = [
                                    'experian_account_id' => 'id',
                                    'name' => $balanceHistory
                                ];
                            }
                        }
                    }
                }
            }
        }

        //good standing accounts information
        if (!empty($json['goodstanding_accountsinformation'])) {
            foreach ($json['goodstanding_accountsinformation'] as $positiveAccount) {

                if (!empty($positiveAccount['recent_balance']) && $positiveAccount['recent_balance'] != "Not reported") {
                    $regBalance = '/\$[0-9\,]{1,}/im';
                    $regDate = '/[0-9\/]{5,}/im';
                    preg_match($regBalance, $positiveAccount['recent_balance'], $matchesBalance);
                    preg_match($regDate, $positiveAccount['recent_balance'], $matchesBalanceDate);
                    $recentBalanceDate = isset($matchesBalanceDate[0]) ? $matchesBalanceDate[0] : null;
                    $recentBalancePayAmount = isset($matchesBalance[0]) ? $matchesBalance[0] : null;
                    if ($recentBalanceDate != null && $recentBalancePayAmount) {
                        $recentBalanceAmount = trim(str_replace([$recentBalancePayAmount, $recentBalanceDate], '', $positiveAccount['recent_balance']));
                    } else {
                        $recentBalanceAmount = null;
                    }
                } else {
                    $recentBalanceDate = null;
                    $recentBalanceAmount = null;
                    $recentBalancePayAmount = null;
                }

                $dataAccount = [
                    'is_dispute' => null,
                    'under_dispute' => null,
                    'negative_item' => false,
                    'opened_date' => \DateTime::createFromFormat("m/Y", $positiveAccount['date_opened'])->format("Y-m-d"),
                    'report_started_date' => \DateTime::createFromFormat("m/Y", $positiveAccount['first_reported'])->format("Y-m-d"),
                    'status_date' => \DateTime::createFromFormat("m/Y", $positiveAccount['date_status'])->format("Y-m-d"),
                    'last_reported_date' => null,
                    'type' => $positiveAccount['account_type'],
                    'classification' => null,
                    'term' => $positiveAccount['term'],
                    'monthly_payment' => $positiveAccount['monthly_payment'],
                    'responsibility' => $positiveAccount['responsibilty'],
                    'credit_limit' => $positiveAccount['credit_limit'],
                    'original_balance' => null,
                    'high_balance' => $positiveAccount['high_balance'],
                    'source_name' => $positiveAccount['account_name'],
                    'source_id' => $positiveAccount['account_number'],
                    'source_address_street' => $positiveAccount['address'],
                    'source_address_city' => $positiveAccount['city'],
                    'source_address_state' => $positiveAccount['state'],
                    'source_address_zip' => $positiveAccount['zip'],
                    'source_address_phone' => $positiveAccount['phone'],
                    'source_address_phone_type' => null,
                    'ain' => $positiveAccount['identity'],
                    'original_creditor' => $positiveAccount['original_creditor'],
                    'sold_to' => $positiveAccount['sold_to'],
                    'purchased_from' => $positiveAccount['purchased_from'],
                    'mortgage_id' => $positiveAccount['mortage_id'],
                    'recent_balance_date' => $recentBalanceDate,
                    'recent_balance_amount' => $recentBalanceAmount,
                    'recent_balance_pay_amount' => $recentBalancePayAmount,
                    'status' => $positiveAccount['value_status'],
                    'statement' => $positiveAccount['statement'],
                    'reinvestigation' => null,
                    "secondary_agency_name" => $positiveAccount['agency_name'],
                    "secondary_agency_id" => $positiveAccount['agency_id'],
                    "on_record_until" => $positiveAccount['on_record_until'],
                    "complianceCode" => $positiveAccount['on_record_until'],
                    "subscriberStatement" => null,
                ];
                $exAccount = $clientReport->clientExAccounts()->create($dataAccount);
                dd($exAccount);
                $dataAccountPayStates = [];
                $dataAccountLimitHighBalances = [];
                $dataAccountBalanceHistories = [];

                if (!empty($positiveAccount['payStates'])) {

                    foreach ($positiveAccount['payStates'] as $payState) {
                        $dataAccountPayStates[] = [
                            'experian_account_id' => 'id',
                            'name' => $payState
                        ];
                    }

                }
                if (!empty($positiveAccount['account_history'])) {
                    foreach ($positiveAccount['account_history'] as $paymentHistories) {
                        $dataAccountBalanceHistories[] = [
                            'experian_account_id' => 'id',
                            "month" => $paymentHistories['month'],
                            "day" => null,
                            "year" => $paymentHistories['year'],
                            "status" => $paymentHistories['value'],

                        ];
                    }
                }
                if(!empty($positiveAccount['balance_history'])){
                    foreach ($positiveAccount['balance_history'] as $balanceHistory){
                        $inString1 = 'The following data will appear in the following format:';
                        $inString2 = 'Date: account balance / date payment received / scheduled payment amount / actual amount paid';
                        $checkRegex = '/[A-z]{3}\s[0-9]{4}:/im';
                        if($balanceHistory != $inString1 && $balanceHistory != $inString2){
                            preg_match($checkRegex, $balanceHistory, $matachesNotEmpty);
                            if(!empty($matachesNotEmpty)){
                                $nextValue = explode(" / ", str_replace($matachesNotEmpty[0], '', $balanceHistory));

                                $dataAccountBalanceHistories[] = [
                                    'experian_account_id' => 'id',
                                    "date" =>str_replace(':','',$matachesNotEmpty[0]),
                                    "amount" => isset($nextValue[0])?trim($nextValue[0]):null,
                                    "date_PR" => isset($nextValue[1])?trim($nextValue[1]):null,
                                    "amount_Sch" => isset($nextValue[2])?trim($nextValue[2]):null,
                                    "amount_act" => isset($nextValue[3])?trim($nextValue[3]):null
                                ];
                            }else{
                                $dataAccountLimitHighBalances[] = [
                                    'experian_account_id' => 'id',
                                    'name' => $balanceHistory
                                ];
                            }
                        }
                    }
                }


            }
        }
        //inquiryOthers
        if(!empty($json['inquiryOthers'])){
            foreach($json['credit_inquiry_information'] as $inquiryOthers){

                $dataInquiry = [
                    'client_report_id' => 'id',
                    'is_dispute' => null,
                    'under_dispute' => null,
                    'subscriber_id' => null,
                    'negative_item' => true,
                    'ain'=> $inquiryOthers['address_id'],
                    'end_user' =>  null,
                    'source_name' => $inquiryOthers['account_name'],
                    'source_address_street' => $inquiryOthers['address'],
                    'source_address_city' => $inquiryOthers['city'],
                    'source_address_state' => $inquiryOthers['state'],
                    'source_address_zip' => $inquiryOthers['zip'],
                    'source_address_phone' => $inquiryOthers['phone'],
                    'source_address_phone_type' => null,
                    'date_of_inquiry' => $inquiryOthers['date_of_request'],
                    'comment' => $inquiryOthers['comment'],
                    'permissible_purpose' => null,
                ];

            }

        }
        //consumer_inquiryblock
        if(!empty($json['consumer_inquiryblock'])){
            foreach($json['consumer_inquiryblock'] as $consumerInquiries){

                $dataInquiry = [
                    'client_report_id' => 'id',
                    'is_dispute' => null,
                    'under_dispute' => null,
                    'subscriber_id' => null,
                    'negative_item' => false,
                    'ain'=> $consumerInquiries['identity'],
                    'end_user' =>  null,
                    'source_name' => $consumerInquiries['account_name'],
                    'source_address_street' => $consumerInquiries['address'],
                    'source_address_city' => $consumerInquiries['city'],
                    'source_address_state' => $consumerInquiries['state'],
                    'source_address_zip' => $consumerInquiries['zip'],
                    'source_address_phone' => $consumerInquiries['phone'],
                    'source_address_phone_type' => null,
                    'date_of_inquiry' => null,
                    'comment' => null,
                    'permissible_purpose' => null,
                ];

                if(!empty($consumerInquiries['date_of_request'])){
                    $dateOfRequests = str_split($consumerInquiries['date_of_request'], 10);
                    foreach ($dateOfRequests as $date) {
                        $dataAccountLimitHighBalances[] = [
                            'experian_account_id' => 'id',
                            'name' => $date
                        ];
                    }

                }
            }

        }
    }

    public function prepare_transunion_dispute_data()
    {
//        $path = storage_path()  . "/report/alisa_khachatryan.json";
        $path = storage_path()  . "/report/Transunion_Experion_Report_EDWARD.json";
        $json = json_decode(file_get_contents($path), true);
        $type = 'TU_DIS';
        $single = $json['Reports']['SINGLE_REPORT_TU'];
        $full_name = $single['Name']["TUC"];
        $ssn = $json['TU_CONSUMER_DISCLOSURE']['Indicative']['SSN'];
        $dob = $single['DOB']["TUC"];
        $reportDate = $single['ReportDate']["TUC"];
        $reportNumber = $json['TU_CONSUMER_DISCLOSURE']['Indicative']['FIN'];
        $currentAddress = $single['CurrentAddr']["TUC"];
        $currentPhone = $json['TU_CONSUMER_DISCLOSURE']['Indicative']["CurrentPhone"];

        $dataClientReports = [
            'user_id' => $this->client_id,
            'type' => $type,
            'full_name' => $full_name,
            'ssn' => $ssn,
            'dob' => $dob,
            'report_date' => $reportDate,
            'report_number'=> $reportNumber,
            'current_address' => $currentAddress,
            'current_phone' => $currentPhone,
            'file_path' => $path
        ];

        $dataName = [];
        $aka = $json['TU_CONSUMER_DISCLOSURE']['Indicative']["AKA"];
        if(!empty($aka)){
            foreach($aka as $info){
                $dataName[] = [
                    'client_report_id' => 'id',
                    'full_name'=> $info,
                    'nin'=> null
                ] ;
            }
        }
//        dd($json);

        $dataPhone = [];

        $currentPhone=[
            'client_report_id' => 'id',
            'current'=> 1,
            'number'=> $currentPhone,
            'type'=> null
        ] ;
        array_push($dataPhone, $currentPhone);
        if(!empty($json['TU_CONSUMER_DISCLOSURE']['Indicative']["Phone"])){

            foreach($json['TU_CONSUMER_DISCLOSURE']['Indicative']["Phone"] as $infoPhone)
            {
                $dataPhone[] = [
                    'client_report_id' => 'id',
                    'current'=> 0,
                    'number'=> $infoPhone,
                    'type'=> null
                ] ;
            }
        }

        $dataAddress = [];
        $address = $json['TU_CONSUMER_DISCLOSURE']['Indicative']["Address"];
        $addressPr = $json['TU_CONSUMER_DISCLOSURE']['Indicative']["PreviousAddress"];
        $cityCurrent = explode(',',$address['Location']);
        $stateCurrent = explode(' ',trim($cityCurrent[1]));
        $currentAddress = [
            'client_report_id' => 'id',
            'current'=> 1,
            'street' => $address['Street'],
            'city' => $cityCurrent[0],
            'state'=>trim($stateCurrent[0]),
            'zip'=> trim($stateCurrent[1]),
            'type'=>null,
            'ain'=>null,
            'geographical_code' => null,
            'date_reported'=>$address['DateReported']
        ] ;
        array_push($dataAddress, $currentAddress);

        if(!empty($addressPr)){

            foreach($addressPr as $infoAddress)
            {
                $city = explode(',',$infoAddress['Location']);
                $state = explode(' ',trim($city[1]));
                $dataAddress[] = [
                    'client_report_id' => 'id',
                    'current'=> 0,
                    'street' => $infoAddress['Street'],
                    'city' => $city[0],
                    'state'=>trim($state[0]),
                    'zip'=> trim($state[1]),
                    'type'=>null,
                    'ain'=>null,
                    'geographical_code' => null,
                    'date_reported'=>$infoAddress['DateReported']
                ] ;
            }
        }

//        dd($json);
        $currentEmployer =  $json['TU_CONSUMER_DISCLOSURE']['Indicative']['CurrentEmployer'];
        $previousEmployer =  $json['TU_CONSUMER_DISCLOSURE']['Indicative']['PreviousEmployer'];
        $dataEmployer = [];
        $currentEmployerArr = [
            'client_report_id' => 'id',
            'current'=> 1,
            'name' => $currentEmployer['EmployerName'],
            'occupation' => $currentEmployer['Occupation'],
            'street' => $currentEmployer['Location'],
            'city' => $currentEmployer['City'],
            'state'=>$currentEmployer['State'],
            'zip'=> null,
            'phone'=>null,
            'type'=>null,
        ] ;
        array_push($dataEmployer, $currentEmployerArr);
        if(!empty($previousEmployer)){
            foreach($previousEmployer as $infoEmployer){

                $dataEmployer[] = [
                    'client_report_id' => 'id',
                    'current'=> 0,
                    'name' => $infoEmployer['EmployerName'],
                    'occupation' => $infoEmployer['Occupation'],
                    'street' => $infoEmployer['Location'],
                    'city' => $infoEmployer['City'],
                    'state'=>$infoEmployer['State'],
                    'zip'=> null,
                    'phone'=>null,
                    'type'=>null,
                ] ;
            }
        }
        $dataSummery= [
            'open_accounts'=>$single['OpenAccts']['TUC'],
            'total_accounts'=>$single['TotalAccounts']['TUC'],
            'total_balances'=>$single['TotalBalances']['TUC'],
            'close_accounts'=>$single['CloseAccounts']['TUC'],
            'total_monthly_payment'=>$single['TotalMonthlyPayments']['TUC'],
            'delinquent_account'=>$single['DelinquentAccounts']['TUC'],
            'derogatory_account'=>$single['DerogatoryAccounts']['TUC'],
            'public_records'=>$single['PublicRecords']['TUC'],
            'inquiry_summary'=> null,
        ];

        $dataPublicRecord = [];
        $publicRecords =  $json['TU_CONSUMER_DISCLOSURE']['publicRecord'];

        if(!empty($publicRecords)) {
            foreach ($publicRecords as $publicRecord) {

                $splitAddress = $this->splitAddress($publicRecord['address']);
                $howFiled = null;
                $status = null;
                $assetsAmount = null;
                $exemptAmount = null;

                if(!empty($single['PublicRecords']['TUC'])){
                    foreach ($single['PubRecs'] as $type =>$infoPublicRec){
                        if(!empty($infoPublicRec)){
                            foreach($infoPublicRec as $records){
                                $month = substr($records['DateFiled']['TUC'], 0,2);
                                $date = substr($records['DateFiled']['TUC'], 2,2);
                                $year = substr($records['DateFiled']['TUC'], 4,4);
                                $dateFiled = date("Y-m-d", strtotime($month.'/'.$date.'/'.$year));
                                if($publicRecord['docketNumber'] ==$records['ReferenceNumber']['TUC'] &&
                                    $publicRecord['dateFiled'] == $dateFiled){
                                    $howFiled = $records['How Filed']['TUC'];
                                    $status = $records['Status']['TUC'];
                                    $assetsAmount = $records['AssetAmount']['TUC'];
                                    $exemptAmount = $records['ExemptAmount']['TUC'];
                                    $remarks = $records['Remarks']['TUC'];

                                }
                            }
                        }
                    }
                }

                $dataPublicRecord[]=[
                    "suppression_indicator" => $publicRecord['suppressionIndicator'],
                    "name" => $publicRecord['name'],
                    "public_record_handle" => $publicRecord['publicRecordHandle'],
                    "address" => $publicRecord['address'],
                    "street" => $splitAddress['street'],
                    "city" => $splitAddress['city'],
                    "state" => $splitAddress['state'],
                    "zip" => $splitAddress['zip'],
                    "docket_number" => $publicRecord['docketNumber'],
                    "phone" => $publicRecord['phone'],
                    "date_effective" => $publicRecord['dateEffective'],
                    "liabilities" => $publicRecord['liabilities'],
                    "date_effective_label" => $publicRecord['dateEffectiveLabel'],
                    "date_filed" => $publicRecord['dateFiled'],
                    "date_paid" => $publicRecord['datePaid'],
                    "type" => $publicRecord['type'],
                    "court_type" => $publicRecord['courtType'],
                    "court_type_description" => $publicRecord['courtTypeDescription'],
                    "responsibility" => $publicRecord['responsibility'],
                    "assets" => $publicRecord['assets'],
                    "amount" => $publicRecord['amount'],
                    "plaintiff" => $publicRecord['plaintiff'],
                    "plaintiff_attorney" => $publicRecord['plaintiffAttorney'],
                    "estimated_deletionDate" => $publicRecord['estimatedDeletionDate'],
                    'how_filed'=>$howFiled,
                    'staus'=>$status,
                    'assets_amount'=>$assetsAmount,
                    'exempt_amount' => $exemptAmount,
                    'remarks'=> $remarks,

                ];

            }
        }

        $trades =  $json['TU_CONSUMER_DISCLOSURE']['trade'];

//        dd($trades, $json);
        if(!empty($trades)){
            foreach($trades as $trade){
                $type = "TU_DIS";
                $sub_type = "trade";
                $singleAccounts = $single['Accounts'];
                $this->dataTransUnionAccount('report_id', $type, $sub_type, $trade, $singleAccounts);
            }
        }

        $collections =  $json['TU_CONSUMER_DISCLOSURE']['trade'];

        if(!empty($trades)){
            foreach($trades as $trade){
                $type = "TU_DIS";
                $sub_type = "trade";
                $singleAccounts = $single['Accounts'];
                $this->dataTransUnionAccount('report_id', $type, $sub_type, $trade, $singleAccounts);
            }
        }

        $inquiries =  $json['TU_CONSUMER_DISCLOSURE']['Inquiries'];

        foreach($inquiries as $inquiryKey => $inquiryValues){

            if(!empty($inquiryValues)){
                foreach($inquiryValues as $inquiryValue){
                    $inquiryDatesJson = null;
                    if($inquiryValue['InquiryDates']!=null){
                        $inquiryDatesArr = explode(',',$inquiryValue['InquiryDates']);
                        $inquiryDates=[];
                        foreach($inquiryDatesArr as $inquiryDate){
                            $inquiryDates[] = $this->dateFormat(trim($inquiryDate));
                        }
                        $inquiryDatesJson = json_encode($inquiryDates);
                    }
                    $state = null;
                    $zipCode = null;
                    $city = null;
                    $addressState = "/.+?(AL|AK|AS|AZ|AR|CA|CO|CT|DE|DC|FM|FL|GA|GU|HI|ID|IL|IN|IA|KS|KY|LA|ME|MH|MD|MA|MI|MN|MS|MO|
                    MT|NE|NV|NH|NJ|NM|NY|NC|ND|MP|OH|OK|OR|PW|PA|PR|RI|SC|SD|TN|TX|UT|VT|VI|VA|WA|WV|WI|WY)+\s+\b[0-9]{5}/";
                    preg_match($addressState, $inquiryValue['Location'], $matcheSate);
                    $state = isset($matcheSate[1])?$matcheSate[1]:null;
                    if($state != null) {
                        $explodeAddress = explode($state, $inquiryValue['Location']);
                        $zipCode = isset($explodeAddress[1]) ? trim($explodeAddress[1]) : null;
                        $city = isset($explodeAddress[1]) ? trim(str_replace(',','',$explodeAddress[1])) : null;
                    }
                    $dataInquiry[]=[
                        "report_id"=>1,
                        "inquiry_type"=>$inquiryKey,
                        "inquiry_id" => $inquiryValue['inquiryId'],
                        "industry_code" => $inquiryValue['industryCode'],
                        "member_code" => $inquiryValue['memberCode'],
                        "description" => $inquiryValue['Description'],
                        "owner"=>null,
                        "date_of_inquiry"=>null,
                        "permissible_purpose" => $inquiryValue['PermissiblePurpose'],
                        "subscriber_name" => $inquiryValue['subscriberName'],
                        "requestor_name" => $inquiryValue['requestorName'],
                        "subscriber_type" => $inquiryValue['SubscriberType'],
                        "date" => $inquiryValue['Date']!= null?$this->dateFormat($inquiryValue['Date']):null,
                        "requested_on_dates" => $inquiryValue['RequestedOnDates']!= null?$this->dateFormat($inquiryValue['RequestedOnDates']):null,
                        "requested_dates" => $inquiryValue['RequestedDates']!= null?$this->dateFormat($inquiryValue['RequestedDates']):null,
                        "inquiry_dates" =>$inquiryDatesJson,
                        "address" => $inquiryValue['Address'],
                        "city" => $city,
                        "state" => $state,
                        "zip" => $zipCode,
                        "phone" => $inquiryValue['Phone'],
                    ];

                }
            }


        }

    }

    public function prepare_transunion_membership_data($output)
    {
        $data = json_decode($output, true);
        if ($data["status"] != "success") {
            // @Todo: Errore save anel mi hat table-um vor heto nayenq inch xndira exel
            // @Todo: integrenq, email, sms ashxatoxnerin hamapatasxan case-eri depqum
            return false;
        }

        $path = storage_path($data["report_filepath"]);
        $json = json_decode(file_get_contents($path), true);
        $type = 'TU_MEM';

        $single = $json['Reports']['SINGLE_REPORT_TU'];
        $full_name = $single['Name']["TUC"];
        $ssn = null;
        $dob = $single['DOB']["TUC"];
        $reportDate = $single['ReportDate']["TUC"];
        $reportNumber = null;
        $currentAddress = $single['CurrentAddr']["TUC"];
        $currentPhone = null;

        $dataClientReports = [
            'user_id' => $this->client_id,
            'type' => $type,
            'full_name' => $full_name,
            'ssn' => $ssn,
            'dob' => $dob,
            'report_date' => $reportDate,
            'report_number'=> $reportNumber,
            'current_address' => $currentAddress,
            'current_phone' => $currentPhone,
            'file_path' => $path
        ];
        //pahel es datan vercnel id

        $dataName = [];
        $aka = $single['AKA']['TUC'];
        if($aka != null){
            $akas = explode('|',$aka);
            foreach($akas as $info){
                $dataName[] = [
                    'client_report_id' => 'id',
                    'full_name'=> trim($info),
                    'nin'=> null
                ] ;
            }
        }

        $dataAddress = [];
        $address = $single['NEW-CurrentAddr']['TUC'];
        $addressPr = $single['NEW-PreviousAddr']['TUC'];

        $currentAddress = [
            'client_report_id' => 'id',
            'current'=> 1,
            'street' => $address[0]['street'],
            'city' => $address[0]['city'],
            'state'=>$address[0]['state'],
            'zip'=>$address[0]['postalCode'],
            'type'=>null,
            'ain'=>null,
            'geographical_code' => null,
            'date_reported'=>$address[0]['date']!=null?$this->dateFormat($address[0]['date']):null,
        ] ;
        array_push($dataAddress, $currentAddress);

        if(!empty($addressPr)){

            foreach($addressPr as $infoAddress)
            {
                $dataAddress[] = [
                    'client_report_id' => 'id',
                    'current'=> 0,
                    'street' => $infoAddress['street'],
                    'city' => $infoAddress['city'],
                    'state'=>$infoAddress['state'],
                    'zip'=>$infoAddress['postalCode'],
                    'type'=>null,
                    'ain'=>null,
                    'geographical_code' => null,
                    'date_reported'=>$infoAddress['date']!=null?$this->dateFormat($infoAddress['date']):null,
                ] ;
            }
        }

        $currentEmployer =  $single['NEW-Employer']["TUC"];
        $previousEmployer =  $single['NEW-PreviousEmployer']["TUC"];
        $dataEmployer = [];

        if(!empty($currentEmployer)){
            foreach($currentEmployer as $current){
                $dataEmployer[] = [
                    'client_report_id' => 'id',
                    'current'=> 1,
                    'name' => $current['name'],
                    'occupation' => null,
                    'street' => null,
                    'city' => null,
                    'state'=>null,
                    'zip'=> null,
                    'phone'=>null,
                    'type'=>null,
                ] ;
            }

        }
        if(!empty($previousEmployer)){
            foreach($previousEmployer as $infoEmployer){

                $dataEmployer[] = [
                    'client_report_id' => 'id',
                    'current'=> 0,
                    'name' => $infoEmployer['name'],
                    'occupation' => null,
                    'street' => null,
                    'city' => null,
                    'state'=>null,
                    'zip'=> null,
                    'phone'=>null,
                    'type'=>null,
                ] ;
            }
        }
        $dataSummery= [
            'open_accounts'=>$single['OpenAccts']['TUC'],
            'total_accounts'=>$single['TotalAccounts']['TUC'],
            'total_balances'=>$single['TotalBalances']['TUC'],
            'close_accounts'=>$single['CloseAccounts']['TUC'],
            'total_monthly_payment'=>$single['TotalMonthlyPayments']['TUC'],
            'delinquent_account'=>$single['DelinquentAccounts']['TUC'],
            'derogatory_account'=>$single['DerogatoryAccounts']['TUC'],
            'public_records'=>$single['PublicRecords']['TUC'],
            'inquiry_summary'=>$single['InquirySummary']['TUC'],
        ];

        $dataPublicRecord = [];
        if(!empty($single['PublicRecords']['TUC'])){
            foreach ($single['PubRecs'] as $type =>$infoPublicRec){
                if(!empty($infoPublicRec)){
                    foreach($infoPublicRec as $records){
                        $month = substr($records['DateFiled']['TUC'], 0,2);
                        $date = substr($records['DateFiled']['TUC'], 2,2);
                        $year = substr($records['DateFiled']['TUC'], 4,4);
                        $dateFiled = date("Y-m-d", strtotime($month.'/'.$date.'/'.$year));
                        $dataPublicRecord[]=[
                            "suppression_indicator" => null,
                            "name" => null,
                            "public_record_handle" => $records['handle']['TUC'],
                            "address" => null,
                            "street" =>null,
                            "city" => null,
                            "state" =>null,
                            "zip" => null,
                            "docket_number" => $records['ReferenceNumber']['TUC'],
                            "phone" =>null,
                            "date_effective" => null,
                            "liabilities" =>  $records['LiabilityAmount']['TUC'],
                            "date_effective_label" => null,
                            "date_filed" => $dateFiled,
                            "date_paid" =>null,
                            "type" => $records['Type']['TUC'],
                            "court_type" =>$type,
                            "court_type_description" => $records['Court']['TUC'],
                            "responsibility" => null,
                            "assets" => null,
                            "amount" => null,
                            "plaintiff" => null,
                            "plaintiff_attorney" =>null,
                            "estimated_deletion_date" => null,
                            'how_filed'=>$records['How Filed']['TUC'],
                            'staus'=>$records['Status']['TUC'],
                            'assets_amount'=>$records['AssetAmount']['TUC'],
                            'exempt_amount' => $records['ExemptAmount']['TUC'],
                            'remarks'=> $records['Remarks']['TUC'],
                        ];

                    }
                }
            }
        }

        $dataAccounts = [];
        foreach ($single['Accounts'] as $type =>$infoAccounts){
            if(!empty($infoAccounts)){
                foreach($infoAccounts as $accounts){
                    $dataAccount[] = [
                        "report_id"=> 1,
                        "type"=>$type,
                        "sub_type"=>null,
                        "suppression_flag" =>null,
                        "adverse_flag" => null,
                        "suppression_indicator" => null,
                        "account_name" => $accounts['CreditorName']["TUC"],
                        "m_account_name" => $accounts['accountName']["TUC"],
                        "account_handle" =>  $accounts['handle']["TUC"],
                        "address" => $accounts['CreditorAddress']["TUC"].', '.$accounts['CreditorCity']["TUC"].', '.$accounts['CreditorState']["TUC"].', '.$accounts['CreditorZip']["TUC"].', '.$accounts['CreditorPhone']["TUC"],
                        "street"=>$accounts['CreditorAddress']["TUC"],
                        "city"=>$accounts['CreditorCity']["TUC"],
                        "state"=>$accounts['CreditorState']["TUC"],
                        "zip"=>$accounts['CreditorZip']["TUC"],
                        "phone" => $accounts['CreditorPhone']["TUC"],
                        "account_number" => $accounts['accountNumber']["TUC"],
                        "payment_frequency" => null,
                        "payment_schedule_monthCount" => $accounts['termMonths']["TUC"],
                        "scheduled_monthly_payment" => $accounts['monthlyPayment']["TUC"],
                        "date_opened" => $accounts['dateOpened']["TUC"] != null?$this->dateFormat($accounts['dateOpened']["TUC"]):null,
                        "date_placed_for_collection" => null,
                        "responsibility" => $accounts['responsibility']["TUC"],
                        "account_type" => $type,
                        "account_type_description" => null,
                        "loan_type" => $accounts['accountType']["TUC"],
                        "balance" => null,
                        "date_effective_label" => null,
                        "date_effective" => null,
                        "date_updated" => null,
                        "last_payment_amount" => null,
                        "high_balance" => $accounts['highBalance']["TUC"],
                        "original_amount" => null,
                        "original_chargeOff" => null,
                        "original_creditor" => $accounts['originalCreditor']["TUC"],
                        "credit_limit" => $accounts['CreditLimit']["TUC"],
                        "past_due" => $accounts['amountPastDue']["TUC"],
                        "pay_status" => null,
                        "terms" => null,
                        "date_closed" => $accounts['dateClosed']["TUC"] != null?$this->dateFormat($accounts['dateClosed']["TUC"]):null,
                        "date_paid" => null,
                        "date_paid_out" => null,
                        "max_delinquency" => null,
                        "hist_high_credit_stmt" => null,
                        "hist_credit_limit_stmt" => null,
                        "special_payment" => null,
                        "mortgage_info" => null,
                        "account_sale_info" => null,
                        "estimated_deletion_date" => null,
                        "last_payment_date" => $accounts['dateLastPayment']["TUC"] != null?$this->dateFormat($accounts['dateLastPayment']["TUC"]):null,
                        "hist_balance_list" => null,
                        "hist_payment_due_list" => null,
                        "hist_payment_amt_list" => null,
                        "hist_past_due_list" => null,
                        "hist_credit_limit_list" => null,
                        "hist_high_credit_list" => null,
                        "hist_remark_list" => null,
                        "remark" => $accounts['remarks']["TUC"],
                        "rating" => null,
                        "current_balance"=> $accounts['currentBalance']["TUC"],
                        "date_account_status"=>$accounts['dateAccountStatus']["TUC"] != null?$this->dateFormat($accounts['dateAccountStatus']["TUC"]):null,
                        "date_reported"=> $accounts['dateReported']["TUC"] != null?$this->dateFormat($accounts['dateReported']["TUC"]):null,
                        "account_condition"=>$accounts['accountCondition']["TUC"],
                        "late_30_count"=>$accounts['late30Count']["TUC"],
                        "late_60_count"=>$accounts['late60Count']["TUC"],
                        "late_90_count"=>$accounts['late90Count']["TUC"],
                        "worst_pay_satus"=>$accounts['WorstPayStatus']["TUC"],
                        "m_pay_status"=>$accounts['PayStatus']["TUC"],
                        "oldest_year"=>isset($accounts['oldestYear']["TUC"])?$accounts['oldestYear']["TUC"]:null,
                        "subscriber_code" =>isset($accounts['subscriberCode']["TUC"])?$accounts['subscriberCode']["TUC"]:null
                    ];

                    if(isset($accounts["PaymentHistory-TUC"]) && !empty($accounts["PaymentHistory-TUC"])){
                        $i = 0;
                        $dataAccountHistory = [];
                        $value = null;
                        foreach($accounts["PaymentHistory-TUC"] as $paymentPattern){
                            if($i%2 == 0){
                                $value = $paymentPattern;
                            }else{
                                $dateMonth = explode('-', $paymentPattern);
                                $dataAccountHistory[] = [
                                    'account_id'=>1,
                                    'month'=>$dateMonth[0],
                                    'year'=>$dateMonth[1],
                                    'value'=>$value

                                ];
                            }
                            $i +=1;

                        }
                    }
                }
            }
        }

        $inquiries =  $single['Inquiries'];

        if(!empty($inquiries)){
            foreach($inquiries as  $inquiryValues){
                $dataInquiry[]=[
                    "report_id"=>1,
                    "inquiry_type"=>null,
                    "inquiry_id" => null,
                    "industry_code" => null,
                    "member_code" => null,
                    "description" => null,
                    "owner"=>$inquiryValues['Owner'],
                    "date_of_inquiry"=>$inquiryValues['DateOfInquiry'] ==null?$this->dateFormat($inquiryValues['DateOfInquiry']):null,
                    "permissible_purpose" => null,
                    "subscriber_name" => null,
                    "requestor_name" =>null,
                    "subscriber_type" => null,
                    "date" => null,
                    "requested_on_dates" => null,
                    "requested_dates" => null,
                    "inquiry_dates" => null,
                    "address" => null,
                    "city" => null,
                    "state" => null,
                    "zip" => null,
                    "phone" => null,
                ];

            }

        }

        dd($dataAccount, $dataClientReports, $dataInquiry, $dataAddress, $dataEmployer, $dataName, $dataPublicRecord, $dataSummery);
        dd( 'ok');

    }



    public function dataTransUnionAccount($report_id, $type, $sub_type, $data, $singleAccounts)
    {
        $currentBalance = null;
        $dateAccountStatus = null;
        $dateReported = null;
        $accountCondition = null;
        $late30Count = null;
        $late60Count = null;
        $late90Count = null;
        $worstPayStatus = null;
        $payStatus = null;
        $oldestYear  = null;
        foreach ($singleAccounts as $accountKey => $accountValue){
            if($accountKey != "Collection" && !empty($accountValue)){
                foreach($accountValue as $accounts){
                    $dateOpened = $this->dateFormat($accounts['dateOpened']['TUC']);
                    $dateLastPayment = $this->dateFormat($accounts['dateLastPayment']['TUC']);

                    if($data['dateOpened']==$dateOpened && $dateLastPayment==$data["lastPaymentDate"]){

                        $currentBalance = $accounts['currentBalance']["TUC"];
                        $dateAccountStatus = $accounts['dateAccountStatus']["TUC"]!=null?
                            $this->dateFormat($accounts['dateAccountStatus']["TUC"]):null;
                        $dateReported = $accounts['dateReported']["TUC"]!=null?
                            $this->dateFormat($accounts['dateReported']["TUC"]):null;
                        $accountCondition = $accounts['accountCondition']["TUC"];
                        $late30Count = $accounts['late30Count']["TUC"];
                        $late60Count = $accounts['late60Count']["TUC"];
                        $late90Count = $accounts['late90Count']["TUC"];
                        $worstPayStatus = $accounts['WorstPayStatus']["TUC"];
                        $payStatus = $accounts['PayStatus']["TUC"];
                        $oldestYear  = isset($accounts['oldestYear']["TUC"])?$accounts['oldestYear']["TUC"]:null;
                        $subscriberCode  = isset($accounts["subscriberCode"]["TUC"])?$accounts['"subscriberCode"']["TUC"]:null;

                    }
                }
            }
        }

        $addressFull = $this->splitAddress($data['address']);
        $dataAccount = [
            "report_id"=>$report_id,
            "type"=>$type,
            "sub_type"=>$sub_type,
            "suppression_flag" =>isset($data['suppressionFlag'])?$data['suppressionFlag']:null,
            "adverse_flag" => isset($data['adverseFlag'])?$data['adverseFlag']:null,
            "suppression_indicator" => isset($data['suppressionIndicator'])?$data['suppressionIndicator']:null,
            "account_name" => $data['accountName'],
            "m_account_name" => $data['accountName'],
            "account_handle" => $data['accountHandle'],
            "address" => $data['address'],
            "street"=>$addressFull['street'],
            "city"=>$addressFull['city'],
            "state"=>$addressFull['state'],
            "zip"=>$addressFull['zip'],
            "phone" => $data['phone'],
            "account_number" => $data['accountNumber'],
            "payment_frequency" => $data['paymentFrequency'],
            "payment_schedule_monthCount" => $data['paymentScheduleMonthCount'],
            "scheduled_monthly_payment" => $data['scheduledMonthlyPayment'],
            "date_opened" => $data['dateOpened'],
            "date_placed_for_collection" => $data['datePlacedForCollection'],
            "responsibility" => $data['responsibility'],
            "account_type" => $data['accountType'],
            "account_type_description" => $data['accountTypeDescription'],
            "loan_type" => $data['loanType'],
            "balance" => $data['balance'],
            "date_effective_label" => $data['dateEffectiveLabel'],
            "date_effective" => $data['dateEffective'],
            "date_updated" => $data['dateUpdated'],
            "last_payment_amount" => $data['lastPaymentAmount'],
            "high_balance" => $data['highBalance'],
            "original_amount" => $data['originalAmount'],
            "original_chargeOff" => $data['originalChargeOff'],
            "original_creditor" => $data['originalCreditor'],
            "credit_limit" => $data['creditLimit'],
            "past_due" => $data['pastDue'],
            "pay_status" => $data['payStatus'],
            "terms" => $data['terms'],
            "date_closed" => $data['dateClosed'],
            "date_paid" => $data['datePaid'],
            "date_paid_out" => $data['datePaidOut'],
            "max_delinquency" => $data['maxDelinquency'],
            "hist_high_credit_stmt" => $data['histHighCreditStmt'],
            "hist_credit_limit_stmt" => $data['histCreditLimitStmt'],
            "special_payment" => $data['specialPayment'],
            "mortgage_info" => $data['mortgageInfo'],
            "account_sale_info" => $data['accountSaleInfo'],
            "estimated_deletion_date" => $data['estimatedDeletionDate'],
            "last_payment_date" => $data['lastPaymentDate'],
            "hist_balance_list" => $data['histBalanceList'],
            "hist_payment_due_list" => $data['histPaymentDueList'],
            "hist_payment_amt_list" => $data['histPaymentAmtList'],
            "hist_past_due_list" => $data['histPastDueList'],
            "hist_credit_limit_list" => $data['histCreditLimitList'],
            "hist_high_credit_list" => $data['histHighCreditList'],
            "hist_remark_list" => $data['histRemarkList'],
            "remark" => $data['remark'],
            "rating" => $data['rating'],
            "current_balance"=> $currentBalance,
            "date_account_status"=>$dateAccountStatus,
            "date_reported"=> $dateReported,
            "account_condition"=>$accountCondition,
            "late_30_count"=>$late30Count,
            "late_60_count"=>$late60Count,
            "late_90_count"=>$late90Count,
            "worst_pay_satus"=>$worstPayStatus,
            "m_pay_status"=>$payStatus,
            "oldest_year"=>$oldestYear,
            "subscriber_code"=>$subscriberCode
        ];

        foreach($data['paymentPattern'] as $paymentPattern){
            if(!empty($paymentPattern)){
                $dataAccountHistory = [];
                foreach($paymentPattern as $date => $value){

                    $month = substr($date, 0,2);
                    $year = substr($date, 2,4);
                    $dataAccountHistory[] = [
                        'account_id'=>1,
                        'month'=>$month,
                        'year'=>$year,
                        'value'=>$value

                    ];
                }
            }
        }
    }

    public function dateFormat($dateString)
    {
        $month = substr($dateString, 0,2);
        $date = substr($dateString, 2,2);
        $year = substr($dateString, 4,4);
        $date = date("Y-m-d", strtotime($month.'/'.$date.'/'.$year));
        return $date;
    }


    public function splitAddress($address)
    {


        $addressState = "/.+?(AL|AK|AS|AZ|AR|CA|CO|CT|DE|DC|FM|FL|GA|GU|HI|ID|IL|IN|IA|KS|KY|LA|ME|MH|MD|MA|MI|MN|MS|MO|
                    MT|NE|NV|NH|NJ|NM|NY|NC|ND|MP|OH|OK|OR|PW|PA|PR|RI|SC|SD|TN|TX|UT|VT|VI|VA|WA|WV|WI|WY)+\s+\b[0-9]{5}/";

        preg_match($addressState, $address, $matcheSate);
        $state = isset($matcheSate[1])?$matcheSate[1]:null;

        if($state != null){
            $explodeAddress = explode($state, $address);
            $zipCode = isset($explodeAddress[1])?trim($explodeAddress[1]):null;
            $city = null;
            $street = null;
            $aptRegex = "/(apt[A-z0-9]{1,2}\s|apt\s[A-z0-9]{1,2}\s|apt\s\#\s[A-z0-9]{1,2}\s|apt\s\#[A-z0-9]{1,2}\s
                    |\#\s[A-z0-9]{1,2}\s|apta[A-z0-9]{1,2}\s|apta\s[A-z0-9]{1,2}\s|\#[A-z0-9]{1,2}|\#\s[A-z0-9]{1,2}
                    |APTA\-[A-Z0-9]{1,2}|APTA\s\-[A-Z0-9]{1,2}|APTA\-\s[A-Z0-9]{1,2})/i";
            $addressStreet = "/ (street|st|AVENUE|AVE|PLACE|PL|ROAD|RD|SQUARE|SQ|Boulevard|BLVD|TERRACE|TER|
                    Drive|DR|Court|CT|Building|BLDG|lane|ln|way)/i";

            $poBoxReg = '/(P\.O\. BOX|POB|PO BOX|PO Box|P O Box)\s[0-9]{1,}\s/im';
            preg_match($poBoxReg, $explodeAddress[0], $matchesPoBox);
            if(isset($matchesPoBox[0])){
                $street = isset($matchesPoBox[0])?trim($matchesPoBox[0]):null;
                $city = trim(str_replace([$street, ','], '', $explodeAddress[0]));
                return [
                    'street'=>$street,
                    'state'=>$state,
                    'city'=>$city,
                    'zip'=>$zipCode,
                ];
            }else{
                preg_match($aptRegex, $explodeAddress[0], $matchesApt);

                if(isset($matchesApt[0])){
                    $streetCity = explode($matchesApt[0], $explodeAddress[0]);
                    $city = isset($streetCity[1])?trim($streetCity[1]):null;
                    $street = trim($streetCity[0].$matchesApt[0]);
                }else{
                    preg_match($addressStreet, $explodeAddress[0], $matchesStreet);
                    $streetCity = explode($matchesStreet[0], $explodeAddress[0]);
                    $city = isset($streetCity[1])?trim($streetCity[1]):null;
                    $street = trim($streetCity[0].$matchesStreet[0]);

                }
                return [
                    'street'=>$street,
                    'state'=>$state,
                    'city'=>$city,
                    'zip'=>$zipCode,
                ];

            }

        }else{
            return [
                'street'=>null,
                'state'=>$state,
                'city'=>null,
                'zip'=>null,
            ];
        }
    }


}
