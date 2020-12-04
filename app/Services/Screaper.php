<?php

namespace App\Services;
use App\Mail\ScraperNotifications;
use App\ScraperError;
use App\User;
use App\ClientReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Process\Process;

class Screaper
{
    protected $client_id;
    protected $client;
    protected $arguments;
    protected $logger;

    public function __construct($id = null)
    {
        $this->client_id = $id;

        $this->client = User::with(['credentials', 'clientDetails'])->find($id);

        $this->logger = Log::channel('scraper');
        $this->logger->debug("Starting Fetch report:", ["user_id" => $id]);

        $dob = \DateTime::createFromFormat("Y-m-d", $this->client['clientDetails']['dob'])
            ->format("m/d/Y");

        $this->arguments = [
            'transunion_dispute' =>[
                    $this->client['credentials']['tu_login'],
                    $this->client['credentials']['tu_password'],
                    $this->client['first_name'],
                    $this->client['last_name'],
                    implode("_", [$this->client['clientDetails']['number'], $this->client['clientDetails']['name']]),
                    $this->client['clientDetails']['city'],
                    $this->client['clientDetails']['state'],
                    $this->client['clientDetails']['zip'],
                    $this->client['email'],
                    $dob,
                    $this->client['clientDetails']['ssn'],
                    $this->client['clientDetails']['phone_number'],
                    "True"
                ],
            'transunion_membership' => [
                $this->client['credentials']['tu_dis_login'],
                $this->client['credentials']['tu_dis_password'],
            ],
            'experian_view_report' => [

            ],
            'experian_login' => [
                $this->client['credentials']['ex_login'],
                $this->client['credentials']['ex_password'],
                $this->client['credentials']['ex_question'],
                $this->client['credentials']['ex_pin'],
                $dob,
                $this->client['clientDetails']['ssn'],
            ],
            'equifax_credit_karma' => [
                $this->client['credentials']['ck_login'],
                $this->client['credentials']['ck_password']
            ]
        ];
    }

    public function transunion_dispute($arguments = [])
    {
        $this->logger->debug("Fetching TransUnion Dispute Data:", ["arguments" => $arguments]);
        if (empty($arguments)) {
            $arguments = $this->arguments['transunion_dispute'];
        }
        array_push($arguments,  storage_path("reports/{$this->client_id}/transunion_dispute"));
        array_push($arguments, $this->client_id);
        $command = $this->make_run_command('transunion_dispute.py',$arguments);
        $this->logger->debug("Command for Fetching TransUnion Dipute:", ["command" => $command]);
        $output = shell_exec($command);
        $this->logger->debug("OUTPUT TransUnion Dipute:", ["output" => $output]);
//        $output = "{'status': 'success', 'username': 'HERMINEM1988', 'password': 'M1988OVSESIAN', 'report_filepath': '../storage/reports/22/transunion_dispute/report_data_2020_08_03_22_16_31.json'} ";
//        var_dump($output);
        $this->prepare_transunion_dispute_data(str_replace('\'', '"',$output));

    }

    public function transunion_membership( $arguments = [])
    {
        $this->logger->debug("Fetching TransUnion Membership Data:", ["arguments" => $arguments]);
        if (empty($arguments)) {
            $arguments = $this->arguments['transunion_membership'];
        }
        array_push($arguments, storage_path("reports/{$this->client_id}/transunion_membership"));
        array_push($arguments, $this->client_id);

        $command = $this->make_run_command('transunion_payment_status.py',$arguments);
        $this->logger->debug("Command for Fetching TransUnion Membership:", ["command" => $command]);

        $output = shell_exec($command);
        $this->logger->debug("OUTPUT TransUnion Dipute:", ["output" => $output]);
//        //        $output = "{'status': 'success', 'report_filepath': '../storage/reports/areev/alisa_khachatryan.json'}";
        $this->prepare_transunion_membership_data(str_replace('\'', '"',$output));
        return $output;
    }

    public function experian_login($arguments = [])
    {
        $this->logger->debug("Fetching Experian Login Data:", ["arguments" => $arguments]);
        if (empty($arguments)) {
            $arguments = $this->arguments['experian_login'];
        }
        array_push($arguments, storage_path("reports/{$this->client_id}/experian_login"));
        array_push($arguments, $this->client_id);
        $command = $this->make_run_command('experian_login.py',$arguments);
        $this->logger->debug("Command for Fetching Experian Login:", ["command" => $command]);
        $output = shell_exec($command);
        $this->logger->debug("OUTPUT Experian Login:", ["command" => $output]);
        $this->prepare_experian_login_data(str_replace('\'', '"',$output));
        return $output;

    }

    public function experian_view_report($arguments = [])
    {
        $this->logger->debug("Fetching Experian View Report Data:", ["arguments" => $arguments]);
        if (empty($arguments)) {
            $arguments = $this->arguments['experian_view_report'];
        }
        array_push($arguments, storage_path("reports/{$this->client_id}/exerian_view_reports"));
        array_push($arguments, $this->client_id);
        $command = $this->make_run_command('experian_view_report.py',$arguments);
        $this->logger->debug("Command for Fetching Experian View Report:", ["command" => $command]);
        $output = shell_exec($command);
//        $output = "{'status': 'success', 'report_filepath': '../storage/reports/areev/experian_view_report/report_data_2020_08_15_15_32_53.json'}";
        $this->prepare_experian_view_report_data(str_replace('\'', '"',$output));
        return true;
    }

    public function equifax_via_credit_karma($arguments = [])
    {
        $this->logger->debug("Fetching Equifax Data:", ["arguments" => $arguments]);
        if (empty($arguments)) {
            $arguments = $this->arguments['equifax_credit_karma'];
        }
        set_time_limit(300);
        array_push($arguments, storage_path("reports/{$this->client_id}/equifax"));
        array_push($arguments, $this->client_id);
        $command = $this->make_run_command('equifax_via_credit_karma.py',$arguments);
        $this->logger->debug("Command for Fetching Equifax:", ["command" => $command]);
        $output = shell_exec($command);
        $this->logger->debug("OUTPUT Fetching Equifax:", ["output" => $output]);
//        $output = "{'status': 'success', 'report_filepath': 'reports/7/equifax_karma/report_numbers_2020_09_02_08_49_17.json'}";

//        $output = "{'status': 'success', 'report_filepath': '../storage/reports/areev/experian_view_report/report_data_2020_08_15_15_32_53.json'}";
        $this->prepare_equifax_karma_report_data(str_replace('\'', '"',$output));
        return true;
    }


    private function make_run_command($script_name, $command_args)
    {
        $script_path = resource_path('scripts/'. $script_name);
        $command_args = array_merge(['/usr/bin/python3', $script_path], $command_args);
        $command = escapeshellcmd(implode( " ", $command_args));

        return $command;
    }

    public function prepare_experian_login_data($output)
    {
        set_time_limit(300);
        $data = json_decode($output, true);
        if($data['status'] != 'success') {
            if (!empty($data['error']['message'])){
                Mail::send(new ScraperNotifications($this->client, $data['error']['message'], 'experian_login'));
            }

            ScraperError::create([
                'user_id'=>$this->client_id,
                'error'=>json_decode($data['error'])
            ]);
            // @Todo: Errore save anel mi hat table-um vor heto nayenq inch xndira exel
            return false;
        }
       // Save Experian Report Numbers -START-
        $report_number_path = $data["numbers_filepath"];
        $report_numbers = json_decode(file_get_contents($report_number_path), true);

        if ($report_numbers) {
            foreach ($report_numbers['Report Numbers'] as $report_number) {
                $this->client->experianReportNumbers()->firstOrCreate(
                    ['number' => $report_number['Report Number']],
                    [
                        'number' => $report_number['Report Number'],
                        'date_generated'=> \DateTime::createFromFormat("M d, Y", $report_number['Date Generated'])->format("Y-m-d")
                    ]
                );
            }
        }
        // Save Experian Report Numbers -END-

        $path = $data["report_filepath"];
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
            'spouse' => $json['spouse'],
            'file_path' => $path
        ];
        $clientReport = ClientReport::create($dataClientReports);



        if(!empty($json['consumerInfoNames'])){
            $dataName = [];
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
            $clientReport->clientNames()->createMany($dataName);

        }

        if(!empty($json['consumerInfoPhones'])){
            $dataPhone = [];
            foreach($json['consumerInfoPhones'] as $infoPhone)
            {
                $phone = $infoPhone['telephone']['number'];
                $type = $infoPhone['telephone']['tail'];
                $dataPhone[] = [
                    'current'=> 0,
                    'number'=> $phone,
                    'type'=> $type
                ] ;
            }
            $clientReport->ClientPhones()->createMany($dataPhone);

        }

        if(!empty($json['consumerInfoAddresses'])){
            $dataAddress = [];
            foreach($json['consumerInfoAddresses'] as $infoAddress){
                $street = $infoAddress['address']['street'];
                $city = $infoAddress['address']['city'];
                $state = $infoAddress['address']['state'];
                $zip = $infoAddress['address']['zip'];
                $type = $infoAddress['type']['type'];
                $ain = $infoAddress['ain'];

                $dataAddress[] = [
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
            $clientReport->clientAddresses()->createMany($dataAddress);
        }


        if(!empty($json['consumerInfoEmployers'])){
            $dataEmployer = [];
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
            $clientReport->clientEmployers()->createMany($dataEmployer);

        }

        if (!empty($json['statements'])) {
            $statements = array_map(function($el){$ret=['statement'=> $el['statement']]; return $ret;},$json['statements']);
            $clientReport->clientExStatements()->createMany($statements);
        }

        if(!empty($json['publicRecords'])){
            $dataPublicRecords = [];
            foreach($json['publicRecords'] as $infoPublicRecords)
            {
                $dataPublicRecords[] = [
                    'is_dispute' => $infoPublicRecords['auxData']['isDisputable'],
                    'under_dispute' => $infoPublicRecords['auxData']['underDispute'],
                    'negative_item' =>$infoPublicRecords['negativeItem'],
                    'date_filed' =>$infoPublicRecords['dateFiled']!= null?\DateTime::createFromFormat("m/d/Y", $infoPublicRecords['dateFiled'])->format("Y-m-d"):null,
                    'date_resolved' => $infoPublicRecords['dateResolved']!= null?\DateTime::createFromFormat("m/d/Y", $infoPublicRecords['dateResolved'])->format("Y-m-d"):null,
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
            $clientReport->clientExPublicRecords()->createMany($dataPublicRecords);

        }

        if(!empty($json['negativeTradeRecords'])){
            foreach($json['negativeTradeRecords'] as $infoNegativeTrade) {
                $dataAccount = [
                    'is_dispute' => $infoNegativeTrade['auxData']['isDisputable'],
                    'under_dispute' => $infoNegativeTrade['auxData']['underDispute'],
                    'negative_item' => true,
                    'opened_date' => $infoNegativeTrade['openedDate']!= null?\DateTime::createFromFormat("m/d/Y", $infoNegativeTrade['openedDate'])->format("Y-m-d"):null,
                    'report_started_date' => $infoNegativeTrade['reportStartedDate']!= null?\DateTime::createFromFormat("m/Y", $infoNegativeTrade['reportStartedDate'])->format("Y-m-d"):null,
                    'status_date' => $infoNegativeTrade['statusDate']!= null?\DateTime::createFromFormat("m/Y", $infoNegativeTrade['statusDate'])->format("Y-m-d"):null,
                    'last_reported_date' => $infoNegativeTrade['lastReportedDate']!= null?\DateTime::createFromFormat("m/d/Y", $infoNegativeTrade['lastReportedDate'])->format("Y-m-d"):null,
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
                    'mortgage_id' => $infoNegativeTrade['mortgageId'],
                    'recent_balance_date' => !empty($infoNegativeTrade['recentBalance']) ? $infoNegativeTrade['recentBalance']['date'] : null,
                    'recent_balance_amount' => !empty($infoNegativeTrade['recentBalance']) ? $infoNegativeTrade['recentBalance']['amount'] : null,
                    'recent_balance_pay_amount' => !empty($infoNegativeTrade['recentBalance']) ? $infoNegativeTrade['recentBalance']['payAmount'] : null,
                    'status' => $infoNegativeTrade['status'],
                    'statement' => $infoNegativeTrade['statement'],
                    'reinvestigation' => $infoNegativeTrade['reinvestigation'],
                    "positive" => $infoNegativeTrade['positive'],
                    "secondary_agency_name" => $infoNegativeTrade['secondaryAgencyNameAsTitle'],
                    "secondary_agency_id" => $infoNegativeTrade['secondaryAgencyId'],
                    "on_record_until" => $infoNegativeTrade['onRecordUntil'],
                    "compliance_code" => $infoNegativeTrade['complianceCode'],
                    "subscriber_statement" => $infoNegativeTrade['subscriberStatement'],
                ];
                $exAccount = $clientReport->clientExAccounts()->create($dataAccount);


                if (!empty($infoNegativeTrade['payStates'])) {
                    $dataAccountPayStates = [];
                    foreach ($infoNegativeTrade['payStates'] as $payState) {
                        $dataAccountPayStates[] = [
                            'name' => $payState
                        ];
                    }
                    $exAccount->payStates()->createMany($dataAccountPayStates);
                }

                if (!empty($infoNegativeTrade['limitHighBalances'])) {
                    $dataAccountLimitHighBalances = [];
                    foreach ($infoNegativeTrade['limitHighBalances'] as $limitHighBalances) {
                        $dataAccountLimitHighBalances[] = [
                            'experian_account_id' => 'id',
                            'name' => $limitHighBalances
                        ];
                    }
                    $exAccount->limitHighBalance()->createMany($dataAccountLimitHighBalances);
                }
                if (!empty($infoNegativeTrade['balanceHistories'])) {
                    $dataAccountBalanceHistories = [];
                    foreach ($infoNegativeTrade['balanceHistories'] as $balanceHis) {
                        $dataAccountBalanceHistories[] = [
                            'experian_account_id' => 'id',
                            "amount" => $balanceHis['amount'],
                            "date_pr" => $balanceHis['datePR'],
                            "amount_sch" => $balanceHis['amountSch'],
                            "amount_act" => $balanceHis['amountAct']
                        ];
                    }
                    $exAccount->balanceHistories()->createMany($dataAccountBalanceHistories);

                }

                if (!empty($infoNegativeTrade['paymentHistories'])) {
                    $dataAccountPaymentHistories = [];
                    foreach ($infoNegativeTrade['paymentHistories'] as $paymentHistories) {
                        $dataAccountPaymentHistories[] = [
                            'experian_account_id' => 'id',
                            "month" => $paymentHistories['month'],
                            "day" => $paymentHistories['day'],
                            "year" => $paymentHistories['year'],
                            "status" => $paymentHistories['status'],
                        ];
                    }
                    $exAccount->paymentHistories()->createMany($dataAccountPaymentHistories);

                }
            }
        }

        if(!empty($json['positiveTradeRecords'])){
            foreach($json['positiveTradeRecords'] as $infoPositiveTrade) {

                $dataAccountPos = [
                    'is_dispute' => $infoPositiveTrade['auxData']['isDisputable'],
                    'under_dispute' => $infoPositiveTrade['auxData']['underDispute'],
                    'negative_item' => false,
                    'opened_date' =>$infoPositiveTrade['openedDate']!= null?\DateTime::createFromFormat("m/d/Y", $infoPositiveTrade['openedDate'])->format("Y-m-d"):null,
                    'report_started_date' => $infoPositiveTrade['reportStartedDate']!= null?\DateTime::createFromFormat("m/Y", $infoPositiveTrade['reportStartedDate'])->format("Y-m-d"):null,
                    'status_date' => $infoPositiveTrade['statusDate']!= null?\DateTime::createFromFormat("m/Y", $infoPositiveTrade['statusDate'])->format("Y-m-d"):null,
                    'last_reported_date' => $infoPositiveTrade['lastReportedDate']!= null? \DateTime::createFromFormat("m/d/Y", $infoPositiveTrade['lastReportedDate'])->format("Y-m-d"):null,
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
                    "secondary_agency_name" => $infoPositiveTrade['secondaryAgencyNameAsTitle'],
                    "secondary_agency_id" => $infoPositiveTrade['secondaryAgencyId'],
                    "on_record_until" => $infoPositiveTrade['onRecordUntil'],
                    "compliance_code" => $infoPositiveTrade['complianceCode'],
                    "subscriber_statement" => $infoPositiveTrade['subscriberStatement'],
                ];

                $exAccountPos = $clientReport->clientExAccounts()->create($dataAccountPos);

                if (!empty($infoPositiveTrade['payStates'])) {
                    $dataAccountPayStatesPos = [];
                    foreach ($infoPositiveTrade['payStates'] as $payState) {
                        $dataAccountPayStatesPos[] = [
                            'name' => $payState
                        ];
                    }
                    $exAccountPos->payStates()->createMany($dataAccountPayStatesPos);

                }

                if (!empty($infoPositiveTrade['limitHighBalances'])) {
                    $dataAccountLimitHighBalancesPos = [];
                    foreach ($infoPositiveTrade['limitHighBalances'] as $limitHighBalances) {
                        $dataAccountLimitHighBalancesPos[] = [
                            'name' => $limitHighBalances
                        ];
                    }
                    $exAccountPos->limitHighBalance()->createMany($dataAccountLimitHighBalancesPos);

                }
                if (!empty($infoPositiveTrade['balanceHistories'])) {
                    $dataAccountBalanceHistoriesPos = [];
                    foreach ($infoPositiveTrade['balanceHistories'] as $balanceHis) {
                        $dataAccountBalanceHistoriesPos[] = [
                            "date" => $balanceHis['date'],
                            "amount" => $balanceHis['amount'],
                            "date_pr" => $balanceHis['datePR'],
                            "amount_sch" => $balanceHis['amountSch'],
                            "amount_act" => $balanceHis['amountAct']
                        ];
                    }
                    $exAccountPos->balanceHistories()->createMany($dataAccountBalanceHistoriesPos);

                }

                if (!empty($infoPositiveTrade['paymentHistories'])) {
                    $dataAccountPaymentHistoriesPos = [];
                    foreach ($infoPositiveTrade['paymentHistories'] as $paymentHistories) {
                        $dataAccountPaymentHistoriesPos[] = [
                            "month" => $paymentHistories['month'],
                            "day" => $paymentHistories['day'],
                            "year" => $paymentHistories['year'],
                            "status" => $paymentHistories['status'],
                        ];
                    }
                    $exAccountPos->paymentHistories()->createMany($dataAccountPaymentHistoriesPos);

                }
            }
        }

        if(!empty($json['inquiryOthers'])){
            $dataInquiry = [];
            foreach($json['inquiryOthers'] as $inquiryOthers){

                $dataInquiry[] = [
                    'is_dispute' => $inquiryOthers['auxData']['isDisputable'],
                    'under_dispute' => $inquiryOthers['auxData']['underDispute'],
                    'subscriber_id' => $inquiryOthers['auxData']['subscriberID'],
                    'negative_item' => true,
                    'ain'=> $inquiryOthers['ain'],
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
            $clientReport->clientExInquiry()->createMany($dataInquiry);
        }
        if(!empty($json['consumerInquiries'])){
            $dataInquiryConsumer = [];
            foreach($json['consumerInquiries'] as $consumerInquiries){

                $dataInquiryConsumer[] = [
                    'is_dispute' => $consumerInquiries['auxData']['isDisputable'],
                    'under_dispute' => $consumerInquiries['auxData']['underDispute'],
                    'subscriber_id' => $consumerInquiries['auxData']['subscriberID'],
                    'negative_item' => false,
                    'ain'=> null,
                    'end_user' =>  $consumerInquiries['endUser'],
                    'source_name' => $consumerInquiries['sourceName'],
                    'source_address_street' => $consumerInquiries['sourceAddress']['street'],
                    'source_address_city' => $consumerInquiries['sourceAddress']['city'],
                    'source_address_state' => $consumerInquiries['sourceAddress']['state'],
                    'source_address_zip' => $consumerInquiries['sourceAddress']['zip'],
                    'source_address_phone' => $consumerInquiries['sourceAddress']['telephone']['number'],
                    'source_address_phone_type' => $consumerInquiries['sourceAddress']['telephone']['tail'],
                    'date_of_inquiry' => json_encode($consumerInquiries['datesOfInquiry']),
                    'comment' => null,
                    'permissible_purpose' => $consumerInquiries['permissiblePurpose'],
                ];
            }
            $clientReport->clientExInquiry()->createMany($dataInquiryConsumer);
        }
    }

    public function prepare_experian_view_report_data($output)
    {
        $data = json_decode($output, true);

        if($data['status'] != 'success') {
            if (!empty($data['error']['message'])){
                Mail::send(new ScraperNotifications($this->client, $data['error']['message'], 'experian_view_report'));
            }

            ScraperError::create([
                'user_id'=>$this->client_id,
                'error'=>json_decode($data['error'])
            ]);
            // @Todo: Errore save anel mi hat table-um vor heto nayenq inch xndira exel
            return false;
        }
        $path = storage_path($data["report_filepath"]);

        $json = json_decode(file_get_contents($path), true);
        $type = 'EX_VIEW';

        $dob = !empty($json['other_personal_information']) && isset($json['other_personal_information'][0]['year of birth']) ?
            $json['other_personal_information'][0]['year of birth'] : null;

        $full_name = !empty($json['personal_infomation']) && isset($json['personal_infomation'][0]['name']) ?
            $json['personal_infomation'][0]['name'] : null;
        $spouse = null;
        if (!empty($json['other_personal_information']) &&
            !empty($json['other_personal_information'][0]['spouse_coapplicant']) &&
            $json['other_personal_information'][0]['spouse_coapplicant'] != 'none' ) {
            $spouse = $json['other_personal_information'][0]['spouse_coapplicant'];
        }

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
            'spouse' => $spouse,
            'file_path' => $path
        ];
        $clientReport = ClientReport::create($dataClientReports);

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
            $clientReport->clientNames()->createMany($dataName);
        }

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

            $clientReport->clientAddresses()->createMany($dataAddress);
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
                $clientReport->ClientPhones()->createMany($dataPhone);

            }

            if (!empty($dataEmployer)) {
                $clientReport->clientEmployers()->createMany($dataEmployer);
            }
        }
        //statements
        if (!empty($json['personal_statement'])){
            $clientReport->clientExStatements()->crateMany($json['personal_statement']);
        }

        //bankcrupcy_information
        if (!empty($json['bankcrupcy_information'])) {
            foreach ($json['bankcrupcy_information'] as $publicRecords) {
                //unnder_Dsipute
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
            $clientReport->clientExPublicRecords()->createMany($dataPublicRecords);
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
                    $recentBalanceAmount = isset($matchesBalance[0]) ? $matchesBalance[0] : null;
                    if ($recentBalanceDate != null && $recentBalanceAmount) {
                        $recentBalancePayAmount = trim(str_replace([$recentBalanceAmount, $recentBalanceDate],
                            '', $negativeAccount['recent_balance']));
                    } else {
                        $recentBalancePayAmount = null;
                    }
                } else {
                    $recentBalanceDate = null;
                    $recentBalanceAmount = null;
                    $recentBalancePayAmount = null;
                }

                $dataAccountNeg = [
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
                    "compliance_code" => $negativeAccount['on_record_until'],
                    "subscriber_statement" => null,
                ];
                $exAccountNeg = $clientReport->clientExAccounts()->create($dataAccountNeg);

                if (!empty($negativeAccount['pay_states'])) {
                    $dataAccountPayStatesNeg = [];
                    foreach ($negativeAccount['pay_states'] as $payState) {
                        $dataAccountPayStatesNeg[] = [
                            'name' => $payState
                        ];
                    }

                    $exAccountNeg->payStates()->createMany($dataAccountPayStatesNeg);
                }
                if (!empty($negativeAccount['account_history'])) {
                    $dataAccountPaymentHistoriesNeg = [];
                    foreach ($negativeAccount['account_history'] as $paymentHistories) {
                        $dataAccountPaymentHistoriesNeg[] = [
                            "month" => $paymentHistories['month'],
                            "day" => null,
                            "year" => $paymentHistories['year'],
                            "status" => $paymentHistories['value'],
                        ];
                    }

                    $exAccountNeg->paymentHistories()->createMany($dataAccountPaymentHistoriesNeg);

                }
                if(!empty($negativeAccount['balance_history'])){
                    $dataAccountLimitHighBalancesNeg = [];
                    $dataAccountBalanceHistoriesNeg = [];
                    foreach ($negativeAccount['balance_history'] as $balanceHistory){
                        $inString1 = 'The following data will appear in the following format:';
                        $inString2 = 'Date: account balance / date payment received / scheduled payment amount / actual amount paid';
                        $checkRegex = '/[A-z]{3}\s[0-9]{4}:/im';
                        if($balanceHistory != $inString1 && $balanceHistory != $inString2){
                            preg_match($checkRegex, $balanceHistory, $matachesNotEmpty);
                            if(!empty($matachesNotEmpty)){
                                $nextValue = explode(" / ", str_replace($matachesNotEmpty[0], '', $balanceHistory));

                                $dataAccountBalanceHistories[] = [
                                    "date" =>str_replace(':','',$matachesNotEmpty[0]),
                                    "amount" => isset($nextValue[0])?trim($nextValue[0]):null,
                                    "date_pr" => isset($nextValue[1])?trim($nextValue[1]):null,
                                    "amount_sch" => isset($nextValue[2])?trim($nextValue[2]):null,
                                    "amount_act" => isset($nextValue[3])?trim($nextValue[3]):null
                                ];
                            }else{
                                $dataAccountLimitHighBalances[] = [
                                    'name' => $balanceHistory
                                ];
                            }
                        }
                    }
                    if (!empty($dataAccountBalanceHistoriesNeg)) {
                        $exAccountNeg->balanceHistories()->createMany($dataAccountBalanceHistoriesNeg);
                    }
                    if (!empty($dataAccountLimitHighBalances)) {
                        $exAccountNeg->limitHighBalance()->createMany($dataAccountLimitHighBalancesNeg);
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
                    'credit_limit_label' => null,
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
                    "compliance_code" => $positiveAccount['on_record_until'],
                    "subscriber_statement" => null,
                ];
                $exAccount = $clientReport->clientExAccounts()->create($dataAccount);

                if (!empty($positiveAccount['payStates'])) {
                    $dataAccountPayStates = [];
                    foreach ($positiveAccount['payStates'] as $payState) {
                        $dataAccountPayStates[] = [
                            'name' => $payState
                        ];
                    }
                    $exAccount->payStates()->createMany($dataAccountPayStates);
                }
                if (!empty($positiveAccount['account_history'])) {
                    $dataAccountBalanceHistories = [];
                    foreach ($positiveAccount['account_history'] as $paymentHistories) {
                        $dataAccountBalanceHistories[] = [
                            "month" => $paymentHistories['month'],
                            "day" => null,
                            "year" => $paymentHistories['year'],
                            "status" => $paymentHistories['value'],
                        ];
                    }
                    $exAccount->paymentHistories()->createMany($dataAccountBalanceHistories);

                }
                if(!empty($positiveAccount['balance_history'])){
                    $dataAccountBalanceHistories = [];
                    $dataAccountLimitHighBalances = [];
                    foreach ($positiveAccount['balance_history'] as $balanceHistory){
                        $inString1 = 'The following data will appear in the following format:';
                        $inString2 = 'Date: account balance / date payment received / scheduled payment amount / actual amount paid';
                        $checkRegex = '/[A-z]{3}\s[0-9]{4}:/im';
                        if($balanceHistory != $inString1 && $balanceHistory != $inString2){
                            preg_match($checkRegex, $balanceHistory, $matachesNotEmpty);
                            if(!empty($matachesNotEmpty)){
                                $nextValue = explode(" / ", str_replace($matachesNotEmpty[0], '', $balanceHistory));

                                $dataAccountBalanceHistories[] = [
                                    "date" =>str_replace(':','',$matachesNotEmpty[0]),
                                    "amount" => isset($nextValue[0])?trim($nextValue[0]):null,
                                    "date_pr" => isset($nextValue[1])?trim($nextValue[1]):null,
                                    "amount_sch" => isset($nextValue[2])?trim($nextValue[2]):null,
                                    "amount_act" => isset($nextValue[3])?trim($nextValue[3]):null
                                ];
                            }else{
                                $dataAccountLimitHighBalances[] = [
                                    'name' => $balanceHistory
                                ];
                            }
                        }
                    }
                    if(!empty($dataAccountBalanceHistories)){
                        $exAccount->balanceHistories()->createMany($dataAccountBalanceHistories);
                    }
                    if(!empty($dataAccountLimitHighBalances)){
                        $exAccount->limitHighBalance()->createMany($dataAccountLimitHighBalances);

                    }
                }
            }
        }

        //inquiryOthers
        if(!empty($json['inquiryOthers'])){
            $dataInquiry = [];
            foreach($json['credit_inquiry_information'] as $inquiryOthers){
                $dataInquiry = [
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
            $clientReport->clientExInquiry()->createMany($dataInquiry);

        }

        //consumer_inquiryblock
        if(!empty($json['consumer_inquiryblock'])){
            $dataConsumerInquiry = [];
            foreach($json['consumer_inquiryblock'] as $consumerInquiries){
                $dataConsumerInquiry[] = [
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
                    'date_of_inquiry' => json_encode($consumerInquiries['date_of_request']),
                    'comment' => null,
                    'permissible_purpose' => null,
                ];
            }

            $clientReport->clientExInquiry()->createMany($dataConsumerInquiry);


        }
    }

    public function prepare_transunion_dispute_data($output)
    {
        set_time_limit(300);
        $data = json_decode($output, true);
        if($data['status'] != 'success') {
            if (!empty($data['error']['message'])){
                Mail::send(new ScraperNotifications($this->client, $data['error']['message'], 'transunion_dispute'));
            }

            ScraperError::create([
                'user_id'=>$this->client_id,
                'error'=>json_decode($data['error'])
            ]);

            // @Todo: Errore save anel mi hat table-um vor heto nayenq inch xndira exel
            return false;
        }

        $json = json_decode(file_get_contents(resource_path(str_replace('..','',$data["report_filepath"]))), true);

        $saveTransUnion = isset( $json['TU_CONSUMER_DISCLOSURE']['reportData']['product'][0]['subject'][0]['subjectRecord'][0])?
            $json['TU_CONSUMER_DISCLOSURE']['reportData']['product'][0]['subject'][0]['subjectRecord'][0]:null;

        $type = 'TU_DIS';
        $single = $json['Reports']['SINGLE_REPORT_TU'];
        $full_name = $single['Name']["TUC"];

        $phone = isset($saveTransUnion['indicative']['phone']['0']['number']['unparsed'])?
            $saveTransUnion['indicative']['phone']['0']['number']['unparsed']:null;
        $ssn = isset($saveTransUnion['indicative']['socialSecurity'][0]['number'])?$saveTransUnion['indicative']['socialSecurity'][0]['number']:null;
        $dob = isset($saveTransUnion['indicative']['dateOfBirth'][0]['value'])?$saveTransUnion['indicative']['dateOfBirth'][0]['value']:null;;
        $reportDate = $single['ReportDate']["TUC"];
        $reportNumber = isset($saveTransUnion['fileNumber'])?$saveTransUnion['fileNumber']:null;
        $currentAddress = $single['CurrentAddr']["TUC"];
        $currentPhone = $phone;

        $dataClientReports = [
            'user_id' => $this->client_id,
            'type' => $type,
            'full_name' => $full_name,
            'ssn' => $ssn,
            'dob' => $dob,
            'report_date' => date("Y-m-d", strtotime($reportDate)),
            'report_number'=> $reportNumber,
            'current_address' => $currentAddress,
            'current_phone' => $currentPhone,
            'file_path' => $data["report_filepath"]
        ];
        $clientReport = ClientReport::create($dataClientReports);

        $dataName = [];
        $aka = isset($saveTransUnion['indicative']['name'])?$saveTransUnion['indicative']['name']:null;
        if(!empty($aka)){
            foreach($aka as $info){
                if(isset($info['qualifier']) && $info['qualifier'] == 'ALSO_KNOWN_AS'){
                    $dataName[] = [
                        'full_name'=> $info['unparsed'],
                        'nin'=> null
                    ];
                }
            }
        }
        if(!empty($dataName)){
            $clientReport->clientNames()->createMany($dataName);
        }

        $dataPhone = [];
        $currentPhone=[
            'current'=> 1,
            'number'=> $currentPhone,
            'type'=> null
        ] ;
        array_push($dataPhone, $currentPhone);
        if(!empty($saveTransUnion['indicative']['phone'])){
            foreach($saveTransUnion['indicative']['phone'] as $infoPhone)
            {
                $dataPhone[] = [
                    'current'=> 0,
                    'number'=> isset($infoPhone['number']['unparsed'])?$infoPhone['number']['unparsed']:null,
                    'type'=> null
                ] ;
            }
        }
        $clientReport->clientPhones()->createMany($dataPhone);

        $dataAddress = [];
        $address = isset($saveTransUnion['indicative']['address'])?$saveTransUnion['indicative']['address']:null;

        if(!empty($address)){
            foreach($address as $infoAddress)
            {
                $dataAddress[] = [
                    'current'=> $infoAddress['status']=="CURRENT" ?1:0,
                    'street' =>isset($infoAddress['street']['unparsed'][0])?$infoAddress['street']['unparsed'][0]:null,
                    'city' => isset($infoAddress['location']['city'])?$infoAddress['location']['city']:null,
                    'state'=>isset($infoAddress['location']['state'])?$infoAddress['location']['state']:null,
                    'zip'=> isset($infoAddress['location']['zipCode'])?$infoAddress['location']['zipCode']:null,
                    'type'=>null,
                    'ain'=>null,
                    'geographical_code' => null,
                    'date_reported'=>isset($infoAddress['dateReported']['value'])?$infoAddress['dateReported']['value']:null
                ] ;
            }
        }
        if(!empty($dataAddress)){
            $clientReport->clientAddresses()->createMany($dataAddress);
        }

        $employer =  isset($saveTransUnion['indicative']['employment'])?$saveTransUnion['indicative']['employment']:null;
        $dataEmployer = [];
        if (!empty($employer)) {
            foreach($employer as $infoEmployer){
                $dataEmployer[] = [
                    'current'=> 0,
                    'name' => isset($infoEmployer['employer']['unparsed'])?$infoEmployer['employer']['unparsed']:null,
                    'occupation' => isset($infoEmployer['occupation'])?$infoEmployer['occupation']:null,
                    'street' =>isset($infoEmployer['address']['street'])?$infoEmployer['address']['street']:null,
                    'city' => isset($infoEmployer['address']['location']['city'])?$infoEmployer['address']['location']['city']:null,
                    'state'=>isset($infoEmployer['address']['location']['state'])?$infoEmployer['address']['location']['state']:null,
                    'zip'=> isset($infoEmployer['address']['location']['zipCode'])?$infoEmployer['address']['location']['zipCode']:null,
                    'phone'=>null,
                    'type'=>null,
                ] ;
            }
        }
        if(!empty($dataEmployer)){
            $clientReport->clientEmployers()->createMany($dataEmployer);
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
        $clientReport->clientTuSummary()->create($dataSummery);

        $credit = isset($saveTransUnion['custom']['credit'])?$saveTransUnion['custom']['credit']:null;

        $dataPublicRecord = [];
        $publicRecords =  isset($credit['publicRecord'])?$credit['publicRecord']:null;

        if(!empty($publicRecords)) {
            foreach ($publicRecords as $publicRecord) {

                $street = isset($publicRecord['subscriber']['address']['street']['unparsed'][0])?$publicRecord['subscriber']['address']['street']['unparsed'][0]:null;
                $location =isset($publicRecord['subscriber']['address']['location']['unparsed'] )?$publicRecord['subscriber']['address']['location']['unparsed'] :null;
                $howFiled = null;
                $status = null;
                $assetsAmount = null;
                $exemptAmount = null;
                $remarks = null;

                if(!empty($single['PublicRecords']['TUC'])){
                    foreach ($single['PubRecs'] as $type =>$infoPublicRec){

                        if(!empty($infoPublicRec)){
                            foreach($infoPublicRec as $records){
                                $month = substr(str_replace(["/","-"],'',$records['DateFiled']['TUC']), 0,2);
                                $date = substr(str_replace(["/","-"],'',$records['DateFiled']['TUC']), 2,2);
                                $year = substr(str_replace(["/","-"],'',$records['DateFiled']['TUC']), 4,4);
                                $dateFiled = date("Y-m-d", strtotime($month.'/'.$date.'/'.$year));

                                if($publicRecord['docketNumber'] == $records['ReferenceNumber']['TUC'] &&
                                    date("Y-m-d",strtotime($publicRecord['dateFiled']['value'])) == $dateFiled){
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
                    "name" =>isset($publicRecord['subscriber']['name']['unparsed'])?$publicRecord['subscriber']['name']['unparsed']:null,
                    "public_record_handle" => $publicRecord['handle'],
                    "address" => trim($street.' '. $location),
                    "street" => $street,
                    "city" => isset($publicRecord['subscriber']['address']['location']['city'])?$publicRecord['subscriber']['address']['location']['city']:null,
                    "state" => isset($publicRecord['subscriber']['address']['location']['state'])?$publicRecord['subscriber']['address']['location']['state']:null,
                    "zip" => isset($publicRecord['subscriber']['address']['location']['zipCode'])?$publicRecord['subscriber']['address']['location']['zipCode']:null,
                    "docket_number" => $publicRecord['docketNumber'],
                    "phone" => isset($publicRecord['subscriber']['phone']['number']['unparsed'])?$publicRecord['subscriber']['phone']['number']['unparsed']:null,
                    "date_effective" => isset($publicRecord['dateEffective']['value'])?date( "Y-m-d",strtotime($publicRecord['dateEffective']['value'])):null,
                    "liabilities" => $publicRecord['liabilities'],
                    "date_effective_label" => $publicRecord['dateEffectiveLabel'],
                    "date_filed" =>  isset($publicRecord['dateFiled']['value'])?date( "Y-m-d",strtotime($publicRecord['dateFiled']['value'])):null,
                    "date_paid" => isset($publicRecord['datePaid']['value'])?date( "Y-m-d",strtotime($publicRecord['datePaid']['value'])):null,
                    "type" => $publicRecord['publicRecordTypeDescription'],
                    "court_type" => isset($publicRecord['source']['type'])?$publicRecord['source']['type']:null,
                    "court_type_description" => isset($publicRecord['source']['courtTypeDescription'])?$publicRecord['source']['courtTypeDescription']:null,
                    "responsibility" => $publicRecord['ecoadescription'],
                    "assets" => $publicRecord['assets'],
                    "amount" => $publicRecord['originalAmount'],
                    "plaintiff" => $publicRecord['plaintiff'],
                    "plaintiff_attorney" => $publicRecord['attorney'],
                    "estimated_deletionDate" =>  isset($publicRecord['estimatedDeletionDate']['value'])?date( "Y-m-d",strtotime($publicRecord['estimatedDeletionDate']['value'])):null,
                    'how_filed'=>$howFiled,
                    'staus'=>$status,
                    'assets_amount'=>$assetsAmount,
                    'exempt_amount' => $exemptAmount,
                    'remarks'=> $remarks,

                ];

            }
        }

        $clientReport->clientTuPublicRecords()->createMany($dataPublicRecord);

        $trades = isset($credit['trade'])?$credit['trade']:null;

        if(!empty($trades)){
            foreach($trades as $trade){
                $type = "TU_DIS";
                $sub_type = "trade";
                $singleAccounts = $single['Accounts'];
                $this->dataTransUnionAccount($clientReport, $type, $sub_type, $trade, $singleAccounts);
            }
        }

        $collections = isset($credit['collection'])?$credit['collection']:null;

        if(!empty($collections)){
            foreach($collections as $collection){
                $type = "TU_DIS";
                $sub_type = "collection";
                $singleAccounts = $single['Accounts'];
                $this->dataTransUnionAccount($clientReport, $type, $sub_type, $collection, $singleAccounts);

            }
        }

        $inquiries = isset($credit['inquiry'])?$credit['inquiry']:null;
        $inquiriesPromotion = isset($credit['promotionalInquiry'])?$credit['promotionalInquiry']:null;
        $inquiriesAccount = isset($credit['accountReviewInquiry'])?$credit['accountReviewInquiry']:null;
        $dataInquiry = [];
        if(!empty($inquiries)){
            foreach ($inquiries as $inquiry) {
                $dataInquiry[]=[
                    "inquiry_type"=>'regularInquiry',
                    "inquiry_id" => isset($inquiry['inquiryId'])?$inquiry['inquiryId']:null,
                    "industry_code" => isset($inquiry['subscriber']['industryCode'])?$inquiry['subscriber']['industryCode']:null,
                    "member_code" =>  isset($inquiry['subscriber']['memberCode'])?$inquiry['subscriber']['memberCode']:null,
                    "description" => isset($inquiry['ecoadesignator'])?$inquiry['ecoadesignator']:null,
                    "owner"=>null,
                    "date_of_inquiry"=>null,
                    "permissible_purpose" => isset($inquiry['permissiblePurposeDescription'])?$inquiry['permissiblePurposeDescription']:null,
                    "subscriber_name" => isset($inquiry['subscriber']['name']['unparsed'])?$inquiry['subscriber']['name']['unparsed']:null,
                    "requestor_name" => isset( $inquiry['requestor']['unparsed'])? $inquiry['requestor']['unparsed']:null,
                    "subscriber_type" => isset($inquiry['subscriber']['subscriberType'])?$inquiry['subscriber']['subscriberType']:null,
                    "date" => $inquiry['date']!= null?$this->dateFormat($inquiry['date']):null,
                    "requested_on_dates" => $inquiry['combinedDates']!= null?$this->dateFormat($inquiry['combinedDates']):null,
                    "requested_dates" => null,
                    "inquiry_dates" => null,
                    "address" =>isset($inquiry['subscriber']['address']['street']['unparsed'][0])?$inquiry['subscriber']['address']['street']['unparsed'][0]:null,
                    "city" => isset($inquiry['subscriber']['address']['location']['city'])?$inquiry['subscriber']['address']['location']['city']:null,
                    "state" => isset($inquiry['subscriber']['address']['location']['state'])?$inquiry['subscriber']['address']['location']['state']:null,
                    "zip" => isset($inquiry['subscriber']['address']['location']['zipCode'])?$inquiry['subscriber']['address']['location']['zipCode']:null,
                    "phone" => isset($inquiry['subscriber']['phone']['number']['unparsed'])?$inquiry['subscriber']['phone']['number']['unparsed']:null,
                ];
            }
        }

        if(!empty($inquiriesPromotion)){
            foreach ($inquiriesPromotion as $inquiryProm) {
                $inquiryDatesArr = $inquiryProm['inquiryDates']!= null?explode(',',$inquiryProm['inquiryDates']):null;
                $inquiryDatesJson = null;
                if($inquiryDatesArr!=null){
                    $inquiryDates=[];
                    foreach($inquiryDatesArr as $inquiryDate){
                        $inquiryDates[] = $this->dateFormat(trim($inquiryDate));
                    }
                    $inquiryDatesJson = json_encode($inquiryDates);
                }
                $dataInquiry[]=[
                    "inquiry_type"=>'promotionalInquiry',
                    "inquiry_id" => null,
                    "industry_code" => isset($inquiryProm['subscriber']['industryCode'])?$inquiryProm['subscriber']['industryCode']:null,
                    "member_code" =>  isset($inquiryProm['subscriber']['memberCode'])?$inquiryProm['subscriber']['memberCode']:null,
                    "description" => null,
                    "owner"=> null,
                    "date_of_inquiry"=>$inquiryProm['inquiryDate']!= null ? $this->dateFormat($inquiryProm['inquiryDate']) : null,
                    "permissible_purpose" => isset($inquiryProm['permissiblePurpose'])?$inquiryProm['permissiblePurpose']:null,
                    "subscriber_name" => isset($inquiryProm['subscriber']['name']['unparsed'])? $inquiryProm['subscriber']['name']['unparsed']:null,
                    "requestor_name" => isset( $inquiryProm['requestor']['unparsed'])? $inquiryProm['requestor']['unparsed']:null,
                    "subscriber_type" =>  isset($inquiry['subscriber']['subscriberType'])?$inquiry['subscriber']['subscriberType']:null,
                    "date" => null,
                    "requested_on_dates" => null,
                    "requested_dates" => null,
                    "inquiry_dates" => $inquiryDatesJson,
                    "address" =>isset($inquiryProm['subscriber']['address']['street']['unparsed'][0])? $inquiryProm['subscriber']['address']['street']['unparsed'][0]:null,
                    "city" => isset($inquiryProm['subscriber']['address']['location']['city'])? $inquiryProm['subscriber']['address']['location']['city']:null,
                    "state" => isset($inquiryProm['subscriber']['address']['location']['state'])? $inquiryProm['subscriber']['address']['location']['state']:null,
                    "zip" => isset($inquiryProm['subscriber']['address']['location']['zipCode'])? $inquiryProm['subscriber']['address']['location']['zipCode']:null,
                    "phone" => isset($inquiryProm['subscriber']['phone']['number']['unparsed'])? $inquiryProm['subscriber']['phone']['number']['unparsed']:null,
                ];
            }
        }

        if(!empty($inquiriesAccount)){
            foreach($inquiriesAccount as $inquiryAcc){

                $dataInquiry[]=[
                    "inquiry_type"=>'accountReviewInquiry',
                    "inquiry_id" => null,
                    "industry_code" => isset($inquiryAcc['subscriber']['industryCode'])?$inquiryAcc['subscriber']['industryCode']:null,
                    "member_code" =>  isset($inquiryAcc['subscriber']['memberCode'])?$inquiryAcc['subscriber']['memberCode']:null,
                    "description" => null,
                    "owner"=>null,
                    "date_of_inquiry"=>null,
                    "permissible_purpose" => isset($inquiryAcc['permissiblePurposeDescription'])?$inquiryAcc['permissiblePurposeDescription']:null,
                    "subscriber_name" => isset($inquiryAcc['subscriber']['name']['unparsed'])?$inquiryAcc['subscriber']['name']['unparsed']:null,
                    "requestor_name" => isset( $inquiryAcc['requestor']['unparsed'])? $inquiryAcc['requestor']['unparsed']:null,
                    "subscriber_type" => isset($inquiryAcc['subscriber']['subscriberType'])?$inquiryAcc['subscriber']['subscriberType']:null,
                    "date" => null,
                    "requested_on_dates" => $inquiryAcc['requestedOnDates']!= null?$this->dateFormat($inquiryAcc['requestedOnDates']):null,
                    "requested_dates" => null,
                    "inquiry_dates" => null,
                    "address" =>isset($inquiryAcc['subscriber']['address']['street']['unparsed'][0])?$inquiryAcc['subscriber']['address']['street']['unparsed'][0]:null,
                    "city" => isset($inquiryAcc['subscriber']['address']['location']['city'])?$inquiryAcc['subscriber']['address']['location']['city']:null,
                    "state" => isset($inquiryAcc['subscriber']['address']['location']['state'])?$inquiryAcc['subscriber']['address']['location']['state']:null,
                    "zip" => isset($inquiryAcc['subscriber']['address']['location']['zipCode'])?$inquiryAcc['subscriber']['address']['location']['zipCode']:null,
                    "phone" => isset($inquiryAcc['subscriber']['phone']['number']['unparsed'])?$inquiryAcc['subscriber']['phone']['number']['unparsed']:null,
                ];
            }
        }

        $clientReport->clientTuInquiries()->createMany($dataInquiry);

        $statements =  isset($saveTransUnion['consumerFileData']['consumerStatement'])?
            $saveTransUnion['consumerFileData']['consumerStatement']:null;

        if(!empty($statements )){
            $dataConsumerStatement = [];
            foreach ($statements as $statement) {
                $dataConsumerStatement[]=[
                    'type'=>$statement['type'],
                    'statement'=>$statement['text'],
                    'description'=>$statement['expirationDescription'],
                ];
            }
        $clientReport->clientTuStatements()->createMany($dataConsumerStatement);
        }

    }


    public function prepare_transunion_membership_data($output)
    {
        set_time_limit(300);
        $data = json_decode($output, true);

        if ($data["status"] != "success") {
            if (!empty($data['error']['message'])){
                Mail::send(new ScraperNotifications($this->client, $data['error']['message'], 'transunion_membership'));
            }

            ScraperError::create([
                'user_id'=>$this->client_id,
                'error'=>json_decode($data['error'])
            ]);

            // @Todo: Errore save anel mi hat table-um vor heto nayenq inch xndira exel
            return false;
        }
        $json = json_decode( file_get_contents($data["report_filepath"]), true);

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
            'file_path' => $data["report_filepath"]
        ];
        $clientReport = ClientReport::create($dataClientReports);

        $dataName = [];
        $aka = $single['AKA']['TUC'];
        if($aka != null){
            $akas = explode('|',$aka);
            foreach($akas as $info){
                $dataName[] = [
                    'full_name'=> trim($info),
                    'nin'=> null
                ] ;
            }
        }
        $clientReport->clientNames()->createMany($dataName);

        $dataAddress = [];
        $address = $single['NEW-CurrentAddr']['TUC'];
        $addressPr = $single['NEW-PreviousAddr']['TUC'];

        $currentAddress = [
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
            foreach($addressPr as $infoAddress){
                $dataAddress[] = [
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
        $clientReport->clientAddresses()->createMany($dataAddress);

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
                if($infoEmployer['name'] != null){
                    $dataEmployer[] = [
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
        }

        $clientReport->clientEmployers()->createMany($dataEmployer);

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

        $clientReport->clientTuSummary()->create($dataSummery);

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

        if(!empty($dataPublicRecord)){
            $clientReport->clientTuPublicRecords()->createMany($dataPublicRecord);
        }

        foreach ($single['Accounts'] as $type =>$infoAccounts){
            if(!empty($infoAccounts)){
                foreach($infoAccounts as $accounts){
                    $dataAccount = [
                        "type"=>"TU_MEM",
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
                        "payment_schedule_month_count" => $accounts['termMonths']["TUC"],
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
                        "original_charge_off" => null,
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
                        "worst_pay_status"=>$accounts['WorstPayStatus']["TUC"],
                        "m_pay_status"=>$accounts['PayStatus']["TUC"],
                        "oldest_year"=>isset($accounts['oldestYear']["TUC"])?$accounts['oldestYear']["TUC"]:null,
                        "subscriber_code" =>isset($accounts['subscriberCode']["TUC"])?$accounts['subscriberCode']["TUC"]:null
                    ];

                    $account = $clientReport->clientTuAccounts()->create($dataAccount);

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
                                    'month'=>$dateMonth[0],
                                    'year'=>$dateMonth[1],
                                    'value'=>$value

                                ];
                            }
                            $i +=1;

                        }
                        $account->accountPaymentHistories()->createMany($dataAccountHistory);

                    }
                }
            }
        }

        $inquiries =  $single['Inquiries'];
        $dataInquiry = [];
        if(!empty($inquiries)){
            foreach($inquiries as  $inquiryValues){
                $dataInquiry[]=[
                    "inquiry_type"=>null,
                    "inquiry_id" => null,
                    "industry_code" => null,
                    "member_code" => null,
                    "description" => null,
                    "owner"=>$inquiryValues['Owner'],
                    "date_of_inquiry"=> $inquiryValues['DateOfInquiry'] != null?$this->dateFormat($inquiryValues['DateOfInquiry']):null,
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
            $clientReport->clientTuInquiries()->createMany($dataInquiry);
        }
    }

    public function prepare_equifax_karma_report_data($output)
    {
        set_time_limit(300);

        $data = json_decode($output, true);

        if($data['status'] != 'success') {
            if (!empty($data['error']['message'])){
                Mail::send(new ScraperNotifications($this->client, $data['error']['message'], 'equifax_from_credit_karma'));
            }

            ScraperError::create([
                'user_id'=>$this->client_id,
                'error'=>json_decode($data['error'])
            ]);
            // @Todo: Errore save anel mi hat table-um vor heto nayenq inch xndira exel
            return false;
        }
        $path = storage_path($data["report_filepath"]);
        $json = json_decode(file_get_contents($path), true);
        $type = 'EQ';

        $data = $json['data']['creditReportsV2']['equifax'];
        $equifax = count($data)>=1?$data[0]:null;
        $reportedDate = $equifax['dateReportPulled']!= null ? date('Y-m-d',strtotime($equifax['dateReportPulled'])):null;
        $full_name = null;

        if(!empty($equifax['names'])){
            $name =  $equifax['names'][0]['first'];
            $full_name = $equifax['names'][0]['middle'] !=null ? $name." ".
                $equifax['names'][0]['middle']." ".$equifax['names'][0]['last']:
                $name." ".$equifax['names'][0]['last'];
        }

        $dataClientReports = [
//            'user_id' => $this->client_id,
            'user_id' => 2,
            'type' => $type,
            'full_name' => $full_name,
            'ssn' => null,
            'dob' => null,
            'report_date' => $reportedDate,
            'report_number' => null,
            'current_address' => null,
            'current_phone' => null,
            'spouse' => null,
            'file_path' => $path
        ];
        $clientReport = ClientReport::create($dataClientReports);

        if(!empty($equifax['names'])){
            $dataName = [];
            foreach($equifax['names'] as $info){
                $name =  $info['first'];

                $fullName = $info['middle'] !=null ? $name." ".
                    $info['middle']." ".$info['last']:
                    $name." ".$info['last'];

                $dataName[] = [
                    'full_name'=> $fullName,
                    'nin'=> null
                ] ;
            }
            $clientReport->clientNames()->createMany($dataName);
        }


        if(!empty($equifax['addresses'])){
            $dataAddress = [];
            foreach($equifax['addresses'] as $infoAddress){

                $street = $infoAddress['formattedStreet'];
                $city = $infoAddress['city'];
                $state = $infoAddress['stateCode'];
                $zip = $infoAddress['postalCode'];

                $dataAddress[] = [
                    'current'=> 0,
                    'street' => $street,
                    'city' => $city,
                    'state'=>$state,
                    'zip'=> $zip,
                    'type'=>null,
                    'ain'=>null,
                    'geographical_code' => null,
                    'date_reported'=>null
                ] ;
            }
            $clientReport->clientAddresses()->createMany($dataAddress);
        }

        if(!empty($equifax['employers'])){
            $dataEmployer = [];
            foreach($equifax['employers'] as $infoEmployer)
            {
                $name = $infoEmployer['name'];
                $street = $infoEmployer['address']['formattedStreet'];
                $city = $infoEmployer['address']['city'];
                $state = $infoEmployer['address']['stateCode'];
                $zip = $infoEmployer['address']['postalCode'];

                $dataEmployer[] = [
                    'current'=> 0,
                    'name' => $name,
                    'occupation' => null,
                    'street' => $street,
                    'city' => $city,
                    'state'=>$state,
                    'zip'=> $zip,
                    'phone'=>null,
                    'type'=>null,
                ] ;
            }
            $clientReport->clientEmployers()->createMany($dataEmployer);

        }

        if(!empty($equifax['inquiries'])){
            $dataInquiry = [];
            foreach($equifax['inquiries'] as $inquiry){
                $dataInquiry[] = [
                    'date_inquiry'=>$inquiry['dateInquired'],
                    'industry_name'=>$inquiry['industryName'],
                    'street'=>$inquiry['institution']['address']['formattedStreet'],
                    'city'=>$inquiry['institution']['address']['city'],
                    'state'=>$inquiry['institution']['address']['stateCode'],
                    'zip'=>$inquiry['institution']['address']['postalCode'],
                    'industry_code'=>$inquiry['institution']['institutionCode'],
                    'name'=>$inquiry['institution']['name'],
                    'phone'=>$inquiry['institution']['telephone']["value"]
                ];

            }
            $clientReport->clientEqInquiry()->createMany($dataInquiry);
        }
        $dataPublicRecord = [];
        foreach($equifax['publicRecords'] as $publicKey=> $public){
            if(!empty($public) && $publicKey != "__typename"){
                foreach($public as $records){

                    $dateFiled =$records['dateFiled']!=null? date("Y-m-d",strtotime($records['dateFiled'])):null;
                    $date =$records['date']!=null? date("Y-m-d",strtotime($records['date'])):null;
                    $dateVerified =$records['dateVerified']!=null? date("Y-m-d",strtotime($records['dateVerified'])):null;

                    $dataPublicRecord[]=[
                        'category_type'=>$publicKey,
                        'reference_number'=>$records['referenceNumber'],
                        'classification'=>$records['classification'],
                        'date_filed'=>$dateFiled,
                        'date'=>$date,
                        'status'=>$records['status'],
                        'amount'=>$records['amount']['amount'],
                        'street'=>$records['contact']['address']['formattedStreet'],
                        'city'=>$records['contact']['address']['city'],
                        'state'=>$records['contact']['address']['postalCode'],
                        'zip'=>$records['contact']['address']['stateCode'],
                        'phone'=>$records['contact']['telephone']["value"],
                        'name'=>$records['contact']['name'],
                        'institution_code'=>$records['contact']['institutionCode'],
                        'date_verified'=>$dateVerified,
                        'responsibility'=>$records['responsibility'],
                        'public_record_id'=>$records['responsibility'],
                        'type'=>$records['type'],
                        'asset'=>$records['assetAmount'],
                        'court_number'=>$records['courtNumber'],
                        'trustee'=>$records['trustee'],
                        'liability_amount'=>$records['liabilityAmount'],
                        'exempt_amount'=>$records['exemptAmount']
                    ];
                }
            }
        }
            $clientReport->clientEqPublicRecords()->createMany($dataPublicRecord);


        foreach($equifax['tradelines'] as $accountKey => $accounts){
            if(!empty($accounts) && $accountKey != '__typename' && strpos($accountKey, 'Label') === false ){
                foreach($accounts as $account){

                    $accountStatus =  str_replace('Account status: ','',$account['accountStatusText']['spans'][0]['text']);
                    $balanceText =  str_replace(['Balance: $','Balance: '],'',$account['balanceText']['spans'][0]['text']);
                    $lastPaymentText =  str_replace('Last Payment: ','',$account['lastPaymentText']['spans'][0]['text']);
                    $accountTitle =  $account['accountTitleText']['spans'][0]['text'];
                    $worstPaymentStatusText =  $account['payments']['worstPaymentStatusText']['spans'][0]['text'];

                    $lastPayment =$lastPaymentText!=null? date("Y-m-d",strtotime($lastPaymentText)):null;

                    $dataAccount = [
                        'type'=>$accountKey,
                        'account_id'=>isset($account['accountId'])?$account['accountId']:null,
                        'account_number'=>isset($account['accountNumber'])?$account['accountNumber']:null,
                        'account_standing'=>isset($account['accountStanding'])?$account['accountStanding']:null,
                        'account_status'=>$accountStatus,
                        'account_title'=>$accountTitle,
                        'account_type'=>isset($account['accountType'])?$account['accountType']:null,
                        'actual_payment_amount'=>isset($account['actualPaymentAmount']['amount'])?$account['actualPaymentAmount']['amount']:null,
                        'amount_past_due'=>isset($account['amountPastDue']['amount'])?$account['amountPastDue']['amount']:null,
                        'balance'=>$balanceText,
                        'balance_remain_percent'=>isset($account['balanceRemainingPercentage'])?$account['balanceRemainingPercentage']:null,
                        'category_type'=>isset($account['categoryType'])?$account['categoryType']:null,
                        'current_balance'=>isset($account['currentBalance']['amount'])?$account['currentBalance']['amount']:null,
                        'date_closed'=>isset($account['dateClosed'])?$account['dateClosed']:null,
                        'date_last_payment'=>isset($account['dateLastPayment'])?$account['dateLastPayment']:null,
                        'date_opened'=>isset($account['dateOpened'])?$account['dateOpened']:null,
                        'date_reported'=>isset($account['dateReported'])?$account['dateReported']:null,
                        'high_balance'=>isset($account['highBalance']['amount'])?$account['highBalance']['amount']:null,
                        'industry_code'=>isset($account['industryCode'])?$account['industryCode']:null,
                        'street'=>$account['institution']['address']['formattedStreet'],
                        'city'=>$account['institution']['address']['city'],
                        'state'=>$account['institution']['address']['stateCode'],
                        'zip'=>$account['institution']['address']['postalCode'],
                        'name'=>$account['institution']['name'],
                        'phone'=>$account['institution']['telephone']['value'],
                        'is_open'=>$account['isOpen'],
                        'last_payment'=>$lastPayment,
                        'late_30_count'=>$account['late30Count'],
                        'late_60_count'=>$account['late60Count'],
                        'late_90_count'=>$account['late90Count'],
                        'limit'=>isset($account['limit']['amount'])?$account['limit']['amount']:null,
                        'monthly_payment'=>isset($account['monthlyPayment']['amount'])?$account['monthlyPayment']['amount']:null,
                        'original_creditor'=>null,
                        'new_account_label'=>isset($account['newAccountLabel'])?$account['newAccountLabel']:null,
                        'current_payment_status'=>$account['payments']['currentPaymentStatus'],
                        'start_date'=>isset($account['payments']['startDate'])?$account['payments']['startDate']:null,
                        'worst_payment_status'=>$worstPaymentStatusText,
                        'perm_por_item_id'=>$account['permPorItemId'],
                        'por_item_id'=>$account['porItemId'],
                        'portfolio_type'=>$account['portfolioType'],
                        'remarks'=>!empty($account['remarks'])?json_encode($account['remarks']):null,
                        'report_id'=>$account['reportId'],
                        'responsibility'=>$account['responsibilityType'],
                        'tradeline_id'=>$account['tradelineId'],
                        'utilization'=>$account['utilization'],
                        'worst_pay_status'=>$account['worstPayStatus'],
                        'has_limit'=>isset($account['hasLimit'])?$account['hasLimit']:null,
                        'utilization_percentage'=>isset($account['utilizationPercentage'])?$account['utilizationPercentage']:null,
                        'term_month'=>isset($account['accountType'])?$account['accountType']:null
                    ];

                    $accountSave = $clientReport->clientEqAccounts()->create($dataAccount);

                    if(isset($account["payments"]['paymentHistory']) && !empty($account["payments"]["paymentHistory"])) {

                        $dataAccountHistory = [];
                        foreach ($account["payments"]['paymentHistory']['years'] as $paymentHistory) {
                            $year = $paymentHistory['value'];
                            foreach($paymentHistory['months'] as $monthValue)
                            $dataAccountHistory[] = [
                                'month' => $monthValue['month'],
                                'year' => $year,
                                'value' =>$monthValue['status']

                            ];
                        }
                        $accountSave->paymentHistories()->createMany($dataAccountHistory);
                    }

                }

            }

        }

        foreach($equifax['collections'] as $collections){

            $accountStatus =  str_replace('Account status: ','',$collections['accountStatusText']['spans'][0]['text']);
            $balanceText =  str_replace(['Balance: $','Balance: '],'',$collections['balanceText']['spans'][0]['text']);
            $accountTitle =  $collections['accountTitleText']['spans'][0]['text'];


            $dataAccount = [
                'type'=>'collection',
                'account_id'=>isset($collections['accountId'])?$collections['accountId']:null,
                'account_number'=>isset($collections['accountNumber'])?$collections['accountNumber']:null,
                'account_standing'=>isset($account['$collections'])?$account['$collections']:null,
                'account_status'=>$accountStatus,
                'account_title'=>$accountTitle,
                'account_type'=>isset($collections['accountType'])?$collections['accountType']:null,
                'actual_payment_amount'=>isset($collections['actualPaymentAmount']['amount'])?$collections['actualPaymentAmount']['amount']:null,
                'amount_past_due'=>isset($collections['amountPastDue']['amount'])?$collections['amountPastDue']['amount']:null,
                'balance'=>$balanceText,
                'balance_remain_percent'=>isset($collections['balanceRemainingPercentage'])?$collections['balanceRemainingPercentage']:null,
                'category_type'=>isset($collections['categoryType'])?$collections['categoryType']:null,
                'current_balance'=>isset($collections['currentBalance']['amount'])?$collections['currentBalance']['amount']:null,
                'date_closed'=>isset($collections['dateClosed'])?$collections['dateClosed']:null,
                'date_last_payment'=>isset($collections['dateLastPayment'])?$collections['dateLastPayment']:null,
                'date_opened'=>isset($collections['dateOpened'])?$collections['dateOpened']:null,
                'date_reported'=>isset($collections['dateReported'])?$collections['dateReported']:null,
                'high_balance'=>isset($collections['highBalance']['amount'])?$collections['highBalance']['amount']:null,
                'industry_code'=>isset($collections['industryCode'])?$collections['industryCode']:null,
                'street'=>$collections['institution']['address']['formattedStreet'],
                'city'=>$collections['institution']['address']['city'],
                'state'=>$collections['institution']['address']['stateCode'],
                'zip'=>$collections['institution']['address']['postalCode'],
                'name'=>$collections['institution']['name'],
                'phone'=>$collections['institution']['telephone']["value"],
                'is_open'=>$collections['isOpen'],
                'last_payment'=>null,
                'late_30_count'=>null,
                'late_60_count'=>null,
                'late_90_count'=>null,
                'limit'=>null,
                'monthly_payment'=>isset($collections['monthlyPayment']['amount'])?$collections['monthlyPayment']['amount']:null,
                'original_creditor'=>$collections['originalCreditorName'],
                'new_account_label'=>null,
                'current_payment_status'=>null,
                'start_date'=>null,
                'worst_payment_status'=>null,
                'perm_por_item_id'=>$collections['permPorItemId'],
                'por_item_id'=>$collections['porItemId'],
                'portfolio_type'=>$collections['portfolioType'],
                'remarks'=>!empty($account['remarks'])?json_encode($account['remarks']):null,
                'report_id'=>$collections['reportId'],
                'responsibility'=>$collections['responsibilityType'],
                'tradeline_id'=>$collections['tradelineId'],
                'utilization'=>null,
                'worst_pay_status'=>$collections['worstPayStatus'],
                'has_limit'=>null,
                'utilization_percentage'=>null,
                'term_month'=>null
            ];

            $account = $clientReport->clientEqAccounts()->create($dataAccount);



        }
    }

    public function dataTransUnionAccount($report, $type, $sub_type, $data, $singleAccounts)
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
        $subscriberCode  = null;
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

                        $worstPayStatus = $accounts['WorstPayStatus']["TUC"];
                        $payStatus = $accounts['PayStatus']["TUC"];
                        $oldestYear  = isset($accounts['oldestYear']["TUC"])?$accounts['oldestYear']["TUC"]:null;
                        $subscriberCode  = isset($accounts["subscriberCode"]["TUC"])?$accounts["subscriberCode"]["TUC"]:null;

                    }
                }
            }
        }


        $street = isset($data['subscriber']['address']['street']['unparsed'][0])?$data['subscriber']['address']['street']['unparsed'][0]:null;
        $location =  isset($data['subscriber']['address']['location']['unparsed'])?$data['subscriber']['address']['location']['unparsed']:null;
        $dataAccount = [
            "type"=>$type,
            "sub_type"=>$sub_type,
            "suppression_flag" =>isset($data['suppressionFlag'])?$data['suppressionFlag']:null,
            "adverse_flag" => isset($data['adverseFlag'])?$data['adverseFlag']:null,
            "suppression_indicator" => isset($data['suppressionIndicator'])?$data['suppressionIndicator']:null,
            "account_name" => isset($data['subscriber']['name']['unparsed'])?$data['subscriber']['name']['unparsed']:null,
            "m_account_name" => isset($data['subscriber']['name']['unparsed'])?$data['subscriber']['name']['unparsed']:null,
            "account_handle" => $data['handle'],
            "address" => trim($street.' '.$location),
            "street"=>$street,
            "city"=> isset($data['subscriber']['address']['location']['city'])?$data['subscriber']['address']['location']['city']:null,
            "state"=>isset($data['subscriber']['address']['location']['state'])?$data['subscriber']['address']['location']['state']:null,
            "zip"=>isset($data['subscriber']['address']['location']['zipCode'])?$data['subscriber']['address']['location']['zipCode']:null,
            "phone" => isset($data['subscriber']['phone']['number']['unparsed'])?$data['subscriber']['phone']['number']['unparsed']:null,
            "account_number" => $data['accountNumber'],
            "payment_frequency" => isset($data['terms']['paymentFrequency'])?$data['terms']['paymentFrequency']:null,
            "payment_schedule_monthCount" => isset($data['terms']['paymentScheduleMonthCount'])?$data['terms']['paymentScheduleMonthCount']:null,
            "scheduled_monthly_payment" => isset($data['terms']['scheduledMonthlyPayment'])?$data['terms']['scheduledMonthlyPayment']:null,
            "date_opened" =>isset($data['dateOpened']['value'])?date("Y-m-d", strtotime($data['dateOpened']['value'])):null,
//            "date_placed_for_collection" => $data['datePlacedForCollection'],
            "responsibility" => $data['ecoadesignatorDescription'],
            "account_type" => $data['portfolioType'],
            "account_type_description" => $data['portfolioTypeDescription'],
            "loan_type" => isset($data['loanType']['description'])?$data['loanType']['description']:null,
            "balance" => isset($data['currentBalance'])?$data['currentBalance']:null,
            "date_effective_label" => $data['dateEffectiveLabel'],
            "date_effective" => isset($data['dateEffective']['value'])?date("Y-m-d", strtotime($data['dateEffective']['value'])):null,
//            "date_updated" => $data['dateUpdated'],
            "last_payment_amount" => isset($data['mostRecentPayment']['amount'])?$data['mostRecentPayment']['amount']:null,
            "high_balance" =>null,
            "original_amount" => isset($data['highCredit'])?$data['highCredit']:null,
            "original_charge_off" => isset($data['additionalTradeAccount']['original']['chargeOff'])?$data['additionalTradeAccount']['original']['chargeOff']:null,
            "original_creditor" => isset($data['additionalTradeAccount']['original']['description'])?$data['additionalTradeAccount']['original']['description']:null,
            "credit_limit" => isset($data['creditLimit'])?$data['creditLimit']:null,
            "past_due" =>isset($data['pastDue'])?$data['pastDue']:null,
            "pay_status" => isset($data['accountRatingDescription'])?$data['accountRatingDescription']:null,
            "terms" => isset($data['terms']['description'])?$data['terms']['description']:null,
            "date_closed" => isset($data['dateClosed']['value'])?date("Y-m-d", strtotime($data['dateClosed']['value'])):null,
//            "date_paid" => $data['datePaid'],
            "date_paid_out" => isset($data['datePaidOut']['value'])?date("Y-m-d", strtotime($data['datePaidOut']['value'])):null,
            "max_delinquency" => isset($data['paymentHistory']['maxDelinquency']['maxDelinquencyDescription'])?$data['paymentHistory']['maxDelinquency']['maxDelinquencyDescription']:null,
            "hist_high_credit_stmt" => isset($data['histHighCreditStmt'])?$data['histHighCreditStmt']:null,
            "hist_credit_limit_stmt" => isset($data['histCreditLimitStmt'])?$data['histCreditLimitStmt']:null,
//            "special_payment" => $data['specialPayment'],
//            "mortgage_info" => $data['mortgageInfo'],
//            "account_sale_info" => $data['accountSaleInfo'],
            "estimated_deletion_date" => isset($data['estimatedDeletionDate']['value'])?date("Y-m-d", strtotime($data['estimatedDeletionDate']['value'])):null,
            "last_payment_date" => isset($data['mostRecentPayment']['date']['value'])?date("Y-m-d", strtotime($data['mostRecentPayment']['date']['value'])):null,
            "account_history_start_date"=>isset($data['paymentHistory']['paymentPattern']['startDate']['value'])?date("Y-m-d", strtotime($data['paymentHistory']['paymentPattern']['startDate']['value'])):null,
            "hist_balance_list" => isset($data['histBalanceList'])?$data['histBalanceList']:null,
            "hist_payment_due_list" => isset($data['histPaymentDueList'])?$data['histPaymentDueList']:null,
            "hist_payment_amt_list" => isset($data['histPaymentAmtList'])?$data['histPaymentAmtList']:null,
            "hist_past_due_list" => isset($data['histPastDueList'])?$data['histPastDueList']:null,
            "hist_credit_limit_list" => isset($data['histCreditLimitList'])?$data['histCreditLimitList']:null,
            "hist_high_credit_list" => isset($data['histHighCreditList'])?$data['histHighCreditList']:null,
            "hist_remark_list" => isset($data['histRemarkList'])?$data['histRemarkList']:null,
            "remark" => isset($data['remark'])?json_encode($data['remark']):null,
            "rating" => isset($data['paymentHistory']['paymentPattern']['text'])?$data['paymentHistory']['paymentPattern']['text']:null,
            "current_balance"=> $currentBalance,
            "date_account_status"=>$dateAccountStatus,
            "date_reported"=> isset($data['dateReported']['value'])?date("Y-m-d", strtotime($data['dateReported']['value'])):null,
            "account_condition"=>$accountCondition,
            "late_30_count"=>isset($data['paymentHistory']['historicalCounters']['late30DaysTotal'])?$data['paymentHistory']['historicalCounters']['late30DaysTotal']:null,
            "late_60_count"=>isset($data['paymentHistory']['historicalCounters']['late60DaysTotal'])?$data['paymentHistory']['historicalCounters']['late60DaysTotal']:null,
            "late_90_count"=>isset($data['paymentHistory']['historicalCounters']['late90DaysTotal'])?$data['paymentHistory']['historicalCounters']['late90DaysTotal']:null,
            "worst_pay_status"=>$worstPayStatus,
            "m_pay_status"=>$payStatus,
            "oldest_year"=>$oldestYear,
            "subscriber_code"=>$subscriberCode,
            "secondary_agency"=>$data['secondaryAgency']
        ];
        $account = $report->clientTuAccounts()->create($dataAccount);
        if(isset($data['paymentHistory']['paymentPattern'])){
            $dataAccountHistory = [];
            $startDate = date("Y-m-d", strtotime($data['paymentHistory']['paymentPattern']['startDate']['value']));
            $payments = str_split($data['paymentHistory']['paymentPattern']['text']);

            foreach($payments as $key => $payment) {
                $paymentPattern = Db::table('tu_payment_patterns')
                    ->where('codes', $payment)
                    ->first();

                $time = mktime(0, 0, 0, date('m',strtotime($startDate)),
                    date('d',strtotime($startDate)), date('Y',strtotime($startDate)));

                $minus = $key+1;
                $months = "-". $minus  ." months";
                $date=  date("d-m-Y", strtotime($months, $time));
                $dataAccountHistory[] = [
                    'month'=>date('m', strtotime($date)),
                    'year'=>date('Y', strtotime($date)),
                    'value'=>!empty($paymentPattern)?$paymentPattern->description:null

                ];
            }
            $account->accountPaymentHistories()->createMany($dataAccountHistory) ;

        }

    }

    public function dateFormat($dateString)
    {
        $string = str_replace(["/","-"],'',$dateString);
        $month = substr($string, 0,2);
        $date = substr($string, 2,2);
        $year = substr($string, 4,4);
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
            $explodeAddress = explode(' '.$state.' ', $address);
            $zipCode = isset($explodeAddress[1])?trim($explodeAddress[1]):null;
            $city = null;
            $street = null;
            $aptRegex = "/(apt[A-z0-9]{1,2}\s|apt\s[A-z0-9]{1,2}\s|apt\s\#\s[A-z0-9]{1,2}\s|apt\s\#[A-z0-9]{1,2}\s
                    |\#\s[A-z0-9]{1,2}\s|apta[A-z0-9]{1,2}\s|apta\s[A-z0-9]{1,2}\s|\#[A-z0-9]{1,2}|\#\s[A-z0-9]{1,2}
                    |APTA\-[A-Z0-9]{1,2}|APTA\s\-[A-Z0-9]{1,2}|APTA\-\s[A-Z0-9]{1,2})/i";
            $addressStreet = "/(STE+\s+[0-9]{1,}|street|st|AVENUE|AVE|PLACE|PL|ROAD|RD|SQUARE|SQ|Boulevard|BLVD|TERRACE|
                        TER|Drive|DR|Court|CT|Building|BLDG|lane|ln|way)/i";

            $poBoxReg = '/(.|)+(P\.O\. BOX|POB|PO BOX|PO Box|P O Box)\s[0-9]{1,}\s/im';
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
                    preg_match_all($addressStreet, $explodeAddress[0], $matchesStreet);
                    if (!empty($matchesStreet[0])) {
                        $streetCity = explode($matchesStreet[0][count($matchesStreet[0])-1], $explodeAddress[0]);
                        $city = isset($streetCity[1])?trim($streetCity[1]):null;
                        $street = trim($streetCity[0].$matchesStreet[0][count($matchesStreet[0])-1]);
                    }

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

    public function prepare_transunion_dispute_data_old($output)
    {
        set_time_limit(300);
        $data = json_decode($output, true);
        if($data['status'] != 'success') {
            if (!empty($data['error']['message'])){
                Mail::send(new ScraperNotifications($this->client, $data['error']['message'], 'transunion_dispute'));
            }

            ScraperError::create([
                'user_id'=>$this->client_id,
                'error'=>json_decode($data['error'])
            ]);

            // @Todo: Errore save anel mi hat table-um vor heto nayenq inch xndira exel
            return false;
        }

        $json = json_decode(file_get_contents($data["report_filepath"]), true);
        dd($json);

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
            'file_path' => $data["report_filepath"]
        ];
        $clientReport = ClientReport::create($dataClientReports);

        $dataName = [];
        $aka = $json['TU_CONSUMER_DISCLOSURE']['Indicative']["AKA"];
        if(!empty($aka)){
            foreach($aka as $info){
                $dataName[] = [
                    'full_name'=> $info,
                    'nin'=> null
                ] ;
            }
        }
        $clientReport->clientNames()->createMany($dataName);

        $dataPhone = [];

        $currentPhone=[
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
        $clientReport->clientPhones()->createMany($dataPhone);

        $dataAddress = [];
        $address = $json['TU_CONSUMER_DISCLOSURE']['Indicative']["Address"];
        $addressPr = $json['TU_CONSUMER_DISCLOSURE']['Indicative']["PreviousAddress"];
        $cityCurrent = explode(',',$address['Location']);
        $stateCurrent = explode(' ',trim($cityCurrent[1]));
        $currentAddress = [
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

        $clientReport->clientAddresses()->createMany($dataAddress);

        $currentEmployer =  $json['TU_CONSUMER_DISCLOSURE']['Indicative']['CurrentEmployer'];
        $previousEmployer =  $json['TU_CONSUMER_DISCLOSURE']['Indicative']['PreviousEmployer'];
        $dataEmployer = [];
        $currentEmployerArr = [
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
        if (!empty($previousEmployer)) {
            foreach($previousEmployer as $infoEmployer){
                $dataEmployer[] = [
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
        $clientReport->clientEmployers()->createMany($dataEmployer);

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
        $clientReport->clientTuSummary()->create($dataSummery);

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
        $clientReport->clientTuPublicRecords()->createMany($dataPublicRecord);

        $trades =  $json['TU_CONSUMER_DISCLOSURE']['trade'];

        if(!empty($trades)){
            foreach($trades as $trade){
                $type = "TU_DIS";
                $sub_type = "trade";
                $singleAccounts = $single['Accounts'];
                $this->dataTransUnionAccount($clientReport, $type, $sub_type, $trade, $singleAccounts);
            }
        }

        $collections =  $json['TU_CONSUMER_DISCLOSURE']['collection'];

        if(!empty($collections)){
            foreach($collections as $collection){
                $type = "TU_DIS";
                $sub_type = "collection";
                $singleAccounts = $single['Accounts'];
                $this->dataTransUnionAccount($clientReport, $type, $sub_type, $collection, $singleAccounts);
            }
        }

        $inquiries =  $json['TU_CONSUMER_DISCLOSURE']['Inquiries'];
        $dataInquiry = [];
        foreach ($inquiries as $inquiryKey => $inquiryValues) {
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

        $clientReport->clientTuInquiries()->createMany($dataInquiry);

        $statements =  $json['TU_CONSUMER_DISCLOSURE']['ConsumerStatement'];
        $dataConsumerStatement = [];
        foreach ($statements as $statement) {
            $dataConsumerStatement[]=[
                'type'=>$statement['type'],
                'statement'=>$statement['text'],
                'description'=>$statement['expirationDescription'],
            ];
        }

        $clientReport->clientTuStatements()->createMany($dataConsumerStatement);
    }

    public function dataTransUnionAccountOld($report, $type, $sub_type, $data, $singleAccounts)
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
        $subscriberCode  = null;
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
            "original_charge_off" => $data['originalChargeOff'],
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
            "account_history_start_date"=>$data['accountHistoryStartDate'],
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
        $account = $report->clientTuAccounts()->create($dataAccount);
        $dataAccountHistory = [];
        foreach($data['paymentPattern'] as $paymentPattern){
            if(!empty($paymentPattern)){
                $dataAccountHistory = [];
                foreach($paymentPattern as $date => $value){

                    $month = substr($date, 0,2);
                    $year = substr($date, 2,4);
                    $dataAccountHistory[] = [
                        'month'=>$month,
                        'year'=>$year,
                        'value'=>$value

                    ];
                }
            }
        }
        if(!empty($dataAccountHistory)){
            $account->accountPaymentHistories()->createMany($dataAccountHistory);
        }
    }
}
