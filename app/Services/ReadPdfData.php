<?php

namespace App\Services;
use Spatie\PdfToText\Pdf;

class ReadPdfData
{

    private $PDF_TO_TEXT = 'C:\xampp\htdocs\ccc\pdftotext.exe';

    public function getCreditCompanyName($path)
    {
        $text =new Pdf($this->PDF_TO_TEXT);
        $text  ->setPdf($path);
        $data = $text->setOptions(['raw', 'f 1'])->text();


        if(strpos($data, 'creditreport/transunion')){
            return 'CK TU';
        }elseif(strpos($data, 'creditreport/equifax')) {
            return 'CK EF';
        }elseif(strpos($data, 'Experian')){
            return 'EX ';
        }elseif(strpos($data, 'TransUnion Credit Monitoring')){
            if(strpos($data, 'Account Number')){
                return 'TU AD';
            }else{return 'TU PH';}
        }else{return null;}
    }

    public function getCreditKarmaData($path)
    {
        $text =new Pdf($this->PDF_TO_TEXT);
        $text  ->setPdf($path);
        $data = $text->setOptions(['raw', 'f 1'])->text();

        $dataArray = explode(PHP_EOL, $data);
        $creditorContactDetails =[];

        $lastReport = array_values(preg_grep('/^Last Reported\s.*/', $dataArray));
        $creditorName = array_values(preg_grep('/^Creditor Name\s.*/', $dataArray));
        $accountType = array_values(preg_grep('/^Account Type\s.*/', $dataArray));
        $accountStatus = array_values(preg_grep('/^Account Status\s.*/', $dataArray));
        $openDate = array_values(preg_grep('/^Opened Date\s.*/', $dataArray));
        $closeDate = array_values( preg_grep('/^Closed Date\s.*/', $dataArray));
        $limit = array_values(preg_grep('/^Limit\s.*/', $dataArray));
        $term = array_values(preg_grep('/^Term\s.*/', $dataArray));
        $monthlyPayment = array_values(preg_grep('/^Monthly Payment\s.*/', $dataArray));
        $responsibility = array_values(preg_grep('/^Responsibility\s.*/', $dataArray));
        $balance = array_values(preg_grep('/^Balance\s.*/', $dataArray));
        $highestBalance = array_values(preg_grep('/^Highest Balance\s.*/', $dataArray));
        $paymentStatus = array_values(preg_grep('/^Payment Status\s.*/', $dataArray));
        $worstPaymentStatus = array_values(preg_grep('/^Worst Payment Status\s.*/', $dataArray));
        $dateOfLastPayment = array_values(preg_grep('/^Date of Last Payment\s.*/', $dataArray));
        $amountPastDue = array_values(preg_grep('/^Amount Past Due\s.*/', $dataArray));
        $times = array_values(preg_grep('/^Times\s.*/', $dataArray));
        $remarks = array_values(preg_grep('/^Remarks\s.*/', $dataArray));

        foreach ( $dataArray as $key => $value) {

            if($value == "Creditor Contact Details"){
                $phone = preg_match( "/\(?([0-9]{3})\)?( |.|-)[0-9]{3}?( |-|.)[0-9]{4}/",$dataArray[$key+5], $data)==1 ? $dataArray[$key+5] : null;

                $creditorContactDetails[] = $dataArray[$key+1].', '.$dataArray[$key+2]
                    .', '.$dataArray[$key+3].', '.$dataArray[$key+4].' '.$phone;
            }
        }
        $dataCreditKarma = [];
        for($i=0; $i<=count($lastReport)-1; $i++){
            $dataCreditKarma[$i] = [
                'last_reported' =>str_replace("Last Reported ", "", $lastReport[$i]),
                'creditor_name' =>str_replace("Creditor Name ", "", $creditorName[$i]),
                'account_type' =>str_replace("Account Type ", "", $accountType[$i]),
                'account_status' =>str_replace("Account Status ", "", $accountStatus[$i]),
                'open_date' =>str_replace("Opened Date ", "", $openDate[$i]),
                'close_date' =>str_replace("Closed Date ", "", $closeDate[$i]),
                'limit' =>str_replace("Limit ", "", $limit[$i]),
                'term' =>str_replace("Term ", "", $term[$i]),
                'monthly_payment' =>str_replace("Monthly Payment ", "", $monthlyPayment[$i]),
                'responsibility' =>str_replace("Responsibility ", "", $responsibility[$i]),
                'balance' =>str_replace("Balance ", "", $balance[$i]),
                'highest_balance' =>str_replace("Highest Balance ", "", $highestBalance[$i]),
                'payment_status' =>str_replace("Payment Status ", "", $paymentStatus[$i]),
                'worst_Payment_Status' =>str_replace("Worst Payment Status ", "", $worstPaymentStatus[$i]),
                'date_of_last_payment' =>str_replace("Date of Last Payment ", "", $dateOfLastPayment[$i]),
                'amount_past_due' =>str_replace("Amount Past Due ", "", $amountPastDue[$i]),
                'times_days_late' =>str_replace("Times 30/60/90 Days Late ", "", $times[$i]),
                'remarks' =>str_replace("Remarks ", "", $remarks[$i]),
                'creditor_contact_details' => $creditorContactDetails[$i],


            ];
        }
        return $dataCreditKarma;
    }

    public function getExprianData($path)
    {
        $textEx =new Pdf($this->PDF_TO_TEXT);
        $textEx  ->setPdf($path);
        $dataEx = $textEx->setOptions(['raw', 'f 1'])->text();

        $dataArrayEX = explode('ACCOUNT DETAILS', $dataEx);

        $dataCreditDetailsExperian= [];

        foreach($dataArrayEX as $key => $value){

            if( preg_match('/Account Name\s.*/', $value, $accountName)){

                preg_match('/Account Name\s.*/', $value, $accountName);
                preg_match('/Account #\s.*/',$value,  $accountNumber);
                preg_match('/Original Creditor\s.*/',$value, $originalCreditor);
                preg_match('/Company Sold\s.*/', $value, $companySold);
                preg_match('/Account Type\s.*/',$value,  $accountType);
                preg_match('/Date Opened\s.*/',$value,  $dateOpened);
                preg_match('/Account Status!\s.*/',$value,  $actualStatus);
                $paymentStatus = $this->get_string_between($value, 'Payment Status', 'Status Updated');
                preg_match('/Status Updated\s.*/',$value,  $statusUpdated);
                preg_match('/Balance\s.*/',$value,  $balance);
                preg_match('/Balance\s.*Updated\s.*|Balance\r\nUpdated\r\n.*/',$value,  $balanceUpdated);
                preg_match('/Original Balance\s.*/',$value,  $originalBalance);
                preg_match('/Credit Limit\s.*/',$value, $creditLimit);
                preg_match('/Monthly\s.*Payment\s.*|Monthly\r\n.*Payment\r\n.*/',$value, $monthlyPayment);
                preg_match('/Past Due\s.*Amount\s.*|Past Due\r\n.*Amount\r\n.*/',$value, $pastDueAmount);
                preg_match('/Highest Balance\s.*/',$value,  $highestBalance);
                preg_match('/Terms\s.*/',$value,  $terms);
                preg_match('/Responsibility\s.*/',$value, $responsibility);
                preg_match('/Your Statement\s.*/',$value,  $yourStatement);

                $commentPart =  $this->get_string($value, 'Comments', 'CONTACT INFORMATION');

                if(strpos($commentPart, 'OK OK')){
                    $comments = $this->get_string_between($value, 'Comments', 'OK OK');
                }elseif(strpos($commentPart, "30 30")){
                    $comments = $this->get_string_between($value, 'Comments', '30 30');
                }elseif(strpos($commentPart, "60 60")){
                    $comments = $this->get_string_between($value, 'Comments', '60 60');
                }elseif(strpos($commentPart, "90 90")){
                    $comments = $this->get_string_between($value, 'Comments', '90 90');
                }elseif(strpos($commentPart, "120 120")){
                    $comments = $this->get_string_between($value, 'Comments', '120 120');
                }elseif(strpos($commentPart, "FP Failed")){
                    $comments = $this->get_string_between($value, 'Comments', 'FP Failed');
                }else{$comments = $commentPart;}

                $contactInformation = $this->get_string_between($value, 'CONTACT INFORMATION', 'PAYMENT HISTORY');

                $paymentHistorySolution = $this->get_string_between($value, 'PAYMENT HISTORY', 'Experian');

                preg_match_all("/[0-9]{4}/m", $paymentHistorySolution, $historyYear);

                $month=[];
                for($i = 0; $i<= count($historyYear[0])-1; $i++){

                    if($i == count($historyYear[0])-1){

                        $month [] =  $this->get_string_history($paymentHistorySolution, $historyYear[0][$i], 'Dec');

                    }else{
                        $month []= $this->get_string_between($paymentHistorySolution,$historyYear[0][$i] , $historyYear[0][$i+1]);
                    }

                }
                $paymentHistory = [];
                for($i = 0; $i<= count($historyYear[0])-1; $i++){
                    $paymentHistory[$historyYear[0][$i]] =[
                        "Jan"=>str_replace( "\r\n",'',$this->get_string_between($month[$i],"Jan","Feb")),
                        "Feb"=>str_replace( "\r\n",'',$this->get_string_between($month[$i],"Feb","Mar")),
                        "Mar"=>str_replace( "\r\n",'',$this->get_string_between($month[$i], "Mar","Apr")),
                        "Apr"=>str_replace( "\r\n",'',$this->get_string_between($month[$i],"Apr","May")),
                        "May"=>str_replace( "\r\n",'',$this->get_string_between($month[$i],"May","Jun")),
                        "Jun"=>str_replace( "\r\n",'',$this->get_string_between($month[$i], "Jun","Jul" )),
                        "Jul" =>str_replace( "\r\n",'',$this->get_string_between($month[$i],"Jul","Aug")),
                        "Aug"=>str_replace( "\r\n",'',$this->get_string_between($month[$i],"Aug","Sep")),
                        "Sep" =>str_replace( "\r\n",'',$this->get_string_between($month[$i], "Sep","Oct")),
                        "Oct"=>str_replace( "\r\n",'',$this->get_string_between($month[$i], "Oct" ,"Nov")),
                        "Nov"=>str_replace( "\r\n",'',$this->get_string_between($month[$i],"Nov" ,"Dec")),
                        "Dec"=>str_replace( "\r\n",'',$this->get_string_test($month[$i],"Dec","Dec")),
                    ];
                }

                $dataCreditDetailsExperian[] =[

                    'account_name' =>str_replace("Account Name ", "", $accountName[0]),
                    'account_number' =>str_replace("Account # ", "", $accountNumber[0]),
                    'original_creditor' =>str_replace("Original Creditor ", "", $originalCreditor[0]),
                    'company_sold' =>str_replace("Company Sold ", "", $companySold[0]),
                    'account_type' =>str_replace("Account Type ", "", $accountType[0]),
                    'date_opened' =>str_replace("Date Opened ", "", $dateOpened[0]),
                    'account_status' =>str_replace("Account Status! ", "", $actualStatus[0]),
                    'payment_status' => str_replace( "\r\n","",$paymentStatus),
                    'status_updated' =>str_replace("Status Updated ", "", $statusUpdated[0]),
                    'balance' =>str_replace("Balance ", "", $balance[0]),
                    'balance_updated' =>str_replace(["Balance Updated ", "Balance\r\n", "Updated\r\n"], "", $balanceUpdated[0]),
                    'original_balance' =>!empty($originalBalance)?str_replace("Original Balance ", "", $originalBalance[0]):'',
                    'credit_limit' =>!empty($creditLimit)?str_replace("Credit Limit ", "", $creditLimit[0]):'',
                    'monthly_payment' =>str_replace(["Monthly Payment ", "Monthly\r\n", "Payment\r\n"], "", $monthlyPayment[0]),
                    'past_due_amount' =>str_replace(["Past Due Amount ", "Past Due\r\n", "Amount\r\n"], "", $pastDueAmount[0]),
                    'highest_balance' =>str_replace("Highest Balance ", "", $highestBalance[0]),
                    'terms' => str_replace("Terms ", "", $terms[0]),
                    'responsibility' =>str_replace("Responsibility ", "", $responsibility[0]),
                    'your_statement' =>str_replace("Your Statement ", "", $yourStatement[0]),
                    'comments' =>str_replace( "\r\n"," ",$comments),
                    'contact_information' => str_replace( "\r\n","",$contactInformation),
                    'payment_history' => $paymentHistory,

                ];

            }

        }
        return $dataCreditDetailsExperian;

    }

    public function getTransUnionAccountDetailsData($path)
    {
        $textTrans =new Pdf($this->PDF_TO_TEXT);
        $textTrans  ->setPdf($path);
        $dataTrans = $textTrans->setOptions(['raw', 'f 1'])->text();

        $dataArrayTrans = explode('Account Nu',$dataTrans);
        $dataAccountName = explode('Revolving', $dataTrans);

        preg_match_all('/([A-Z1,\/]{2,}+[A-Z\s]{1,})+[\$ 0-9]{1,}+[0-9\/]{2}[0-9\/]{2}[0-9\/]/', $dataAccountName[1], $accountNameTrans);

        $dataArrayTransAD =[];
        $count = 0;
        foreach($dataArrayTrans as $value) {

            if (preg_match('/mber\s.*/', $value, $accountNumber)) {

                preg_match('/Condition\s.*/', $value, $condition);
                preg_match('/Responsibility\s.*/', $value, $responsibility);
                preg_match('/Current Balance\s.*/', $value, $currentBalance);
                preg_match('/Original Balance\s.*/', $value, $originalBalance);
                preg_match('/Limit\s.*/', $value, $limit);
                preg_match('/Monthly Payment\s.*/', $value, $monthlyPayment);
                preg_match('/Last Payment\s.*/', $value, $lastPayment);
                preg_match('/Status\s.*/', $value, $status);
                preg_match('/Loan Term\s.*/', $value, $loanTerm);
                preg_match('/Loan Type\s.*/', $value, $loanType);
                preg_match('/Opened\s.*/', $value, $opened);
                preg_match('/Reported\s.*/', $value, $reported);
                preg_match('/Remarks\s.*/', $value, $remarks);

                $creditorInformation = $this->get_string_between($value, 'Creditor Information', 'Your 3-Bureau Report is Ready');

                $dataArrayTransAD[] = [

                    'account_name' => $accountNameTrans[1][$count],
                    'account_number' => str_replace(["mber ","\r"], "", $accountNumber[0]),
                    'condition' => str_replace(["Condition ", "\r"], "", $condition[0]),
                    'responsibility' => str_replace(["Responsibility ", "\r"], "", $responsibility[0]),
                    'current_balance' => str_replace("Current Balance ", "", $currentBalance[0]),
                    'original_balance' => str_replace("Original Balance ", "", $originalBalance[0]),
                    'limit' => str_replace("Limit ", "", $limit[0]),
                    'monthly_payment' =>str_replace("Monthly Payment ", "", $monthlyPayment[0]),
                    'last_payment' => str_replace("Last Payment ", "", $lastPayment[0]),
                    'status' => str_replace("Status ", "", $status[0]),
                    'loan_term' => str_replace("Loan Term ", "", $loanTerm[0]),
                    'loan_Type' => str_replace("Loan Type ", "", $loanType[0]),
                    'opened' => str_replace("Opened ", "", $opened[0]),
                    'reported' => str_replace("Reported ", "", $reported[0]),
                    'remarks' => str_replace("Remarks ", "", $remarks[0]),
                    'creditor_information' => str_replace("\r\n", ' ', $creditorInformation),

                ];

                $count++;

            }
        }
        return $dataArrayTransAD;

    }

    public function getTransUnionPaymentHistoryData($path)
    {
        $textUnion =new Pdf($this->PDF_TO_TEXT);
        $textUnion->setPdf($path);
        $dataUnion = $textUnion->setOptions(['raw', 'f 1'])->text();

        $dataUnionForAccount = explode('Revolving', $dataUnion);

        preg_match_all('/(^[A-Z1,\/]{2,}+[A-Z\s]{1,})+[\$ 0-9]{2,}+[0-9\/]{2}[0-9\/]{2}[0-9\/]/m', $dataUnionForAccount[1], $accountNameUnion);

        $dataPaymentHistory = explode('Payment Status ',$dataUnion );

        $regex = '/Jan [0-9]{4} [A-Z]{1,}|Feb [0-9]{4} [A-Z]{1,}|Mar [0-9]{4} [A-Z]{1,}|Apr [0-9]{4} [A-Z]{1,}|May [0-9]{4} [A-Z]{1,}|Jun [0-9]{4} [A-Z]{1,}|Jul [0-9]{4} [A-Z]{1,}|Aug [0-9]{4} [A-Z]{1,}|Sep [0-9]{4} [A-Z]{1,}|Oct [0-9]{4} [A-Z]{1,}|Nov [0-9]{4} [A-Z]{1,}|Dec[0-9]{4} [A-Z]{1,}/';
        $unionPaymentHistory = [];


        foreach($dataPaymentHistory  as $key => $value){


            if($key != 0){

                preg_match_all($regex, $value, $history);
                $unionPaymentHistory[] = $history[0];
            };


        }
        return null;
    }

    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    function get_string($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $len = strpos($string, $end, $ini)- $ini;
        return substr($string, $ini, $len);
    }

    function get_string_history($string, $start, $end){

        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini+9;
        return substr($string, $ini, $len);
    }

    function get_string_test($string, $start, $end){

        $string = ' ' . $string;
        $ini = strpos($string, $start);

        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = $ini+9;

        $resultString =  substr($string, $ini, $len);
        if(strpos($resultString, 'FP')){
            $result = 'FP';
        }elseif(strpos($resultString, '30')) {
            $result = '30';
        }elseif(strpos($resultString, '60')) {
            $result = '60';
        }elseif(strpos($resultString, '90')) {
            $result = '90';
        }elseif(strpos($resultString, '120')) {
            $result = '120';
        }else{$result = '';}

        return $result;
    }




}
