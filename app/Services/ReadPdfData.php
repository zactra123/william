<?php

namespace App\Services;
use Spatie\PdfToText\Pdf;

class ReadPdfData
{

    private $PDF_TO_TEXT = 'C:\xampp\htdocs\ccc\pdftotext.exe';



    public function getCreditKarmaData($path, $userId, $attachmentId)
    {
        $text =new Pdf($this->PDF_TO_TEXT);
        $text  ->setPdf($path);
        $data = $text->setOptions(['raw', 'f 1'])->text();

        $dataArray = explode(PHP_EOL, $data);
        $creditorContactDetails =[];

        $lastReportArray = array_values(preg_grep('/^Last Reported\s.*/', $dataArray));
        $creditorNameArray = array_values(preg_grep('/^Creditor Name\s.*/', $dataArray));
        $accountTypeArray = array_values(preg_grep('/^Account Type\s.*/', $dataArray));
        $accountStatusArray = array_values(preg_grep('/^Account Status\s.*/', $dataArray));
        $openDateArray = array_values(preg_grep('/^Opened Date\s.*/', $dataArray));
        $closeDateArray = array_values( preg_grep('/^Closed Date\s.*/', $dataArray));
        $limitArray = array_values(preg_grep('/^Limit\s.*/', $dataArray));
        $termArray = array_values(preg_grep('/^Term\s.*/', $dataArray));
        $monthlyPaymentArray = array_values(preg_grep('/^Monthly Payment\s.*/', $dataArray));
        $responsibilityArray = array_values(preg_grep('/^Responsibility\s.*/', $dataArray));
        $balanceArray = array_values(preg_grep('/^Balance\s.*/', $dataArray));
        $highestBalanceArray = array_values(preg_grep('/^Highest Balance\s.*/', $dataArray));
        $paymentStatusArray = array_values(preg_grep('/^Payment Status\s.*/', $dataArray));
        $worstPaymentStatusArray = array_values(preg_grep('/^Worst Payment Status\s.*/', $dataArray));
        $dateOfLastPaymentArray = array_values(preg_grep('/^Date of Last Payment\s.*/', $dataArray));
        $amountPastDueArray = array_values(preg_grep('/^Amount Past Due\s.*/', $dataArray));
        $timesArray = array_values(preg_grep('/^Times\s.*/', $dataArray));
        $remarksArray = array_values(preg_grep('/^Remarks\s.*/', $dataArray));

        foreach ( $dataArray as $key => $value) {

            if($value == "Creditor Contact Details"){
                $phone = preg_match( "/\(?([0-9]{3})\)?( |.|-)[0-9]{3}?( |-|.)[0-9]{4}/",$dataArray[$key+5], $data)==1 ? $dataArray[$key+5] : null;

                $creditorContactDetails[] = $dataArray[$key+1].', '.$dataArray[$key+2]
                    .', '.$dataArray[$key+3].', '.$dataArray[$key+4].' '.$phone;
            }
        }
        $dataCreditKarma = [];
        for($i=0; $i<=count($lastReportArray)-1; $i++){

            $timesExplode = explode('/',str_replace("Times 30/60/90 Days Late ", "", $timesArray[$i]));
            $timesDaysLate = [
                '30'=>$timesExplode[0],
                '60'=>$timesExplode[1],
                '90'=>$timesExplode[2],
            ];

            //date format
            $openDate = date("d-m-Y", strtotime(str_replace("Opened Date ", "", $openDateArray[$i])));
            $lastReport = date("d-m-Y", strtotime(str_replace("Last Reported ", "", $lastReportArray[$i])));
            $dateOfLastPayment = date("d-m-Y", strtotime(str_replace("Date of Last Payment ", "", $dateOfLastPaymentArray[$i])));
            $closeDate = date("d-m-Y", strtotime(str_replace("Closed Date ", "", $closeDateArray[$i])));

            $dataCreditKarma[$i] = [
                'user_id' => $userId,
                'attachment_id' => $attachmentId,

//              'last_reported'
                'date_of_reported' =>$lastReport,

//              'creditor_name'
                'account_name'=> str_replace("Creditor Name ", "", $creditorNameArray[$i]),

//               account_type
                'account_type' =>str_replace("Account Type ", "", $accountTypeArray[$i]),

//               account_status
                'account_status' =>str_replace("Account Status ", "", $accountStatusArray[$i]),

//              'open_date'
                'date_opened' =>$openDate,

                'close_date' => $closeDate,

//              'limit'
                'credit_limit' =>str_replace("Limit ", "", $limitArray[$i]),

//              'term'
                'terms'=>str_replace("Term ", "", $termArray[$i]),

//               monthly_payment
                'monthly_payment' =>str_replace("Monthly Payment ", "", $monthlyPaymentArray[$i]),

//              responsibility
                'responsibility' =>str_replace("Responsibility ", "", $responsibilityArray[$i]),

//              balance
                'balance' =>str_replace("Balance ", "", $balanceArray[$i]),

//               highest_balance
                'highest_balance' =>str_replace("Highest Balance ", "", $highestBalanceArray[$i]),

//              payment_status
                'payment_status' =>str_replace("Payment Status ", "", $paymentStatusArray[$i]),

                'worst_payment_status' =>str_replace("Worst Payment Status ", "", $worstPaymentStatusArray[$i]),

//              'date_of_last_payment'
                'balance_updated' => $dateOfLastPayment,

//              'amount_past_due'
                'past_due_amount'=>str_replace("Amount Past Due ", "", $amountPastDueArray[$i]),

//              'times_days_late'
                'days_late'=> $timesDaysLate,

//              'remarks'
                'comments'=>str_replace("Remarks ", "", $remarksArray[$i]),

//              'creditor_contact_details'
                'contact_information' => $creditorContactDetails[$i],

            ];
        }

        return $dataCreditKarma;
    }

    public function getExprianData($path, $userId, $attachmentId)
    {
        $textEx =new Pdf($this->PDF_TO_TEXT);
        $textEx  ->setPdf($path);
        $dataEx = $textEx->setOptions(['raw', 'f 1'])->text();
        $dataArrayEX = explode("Date of Rep" , $dataEx);


        $dataCreditDetailsExperian= [];

        foreach($dataArrayEX as $key => $value){

            if(preg_match('/Account Name\s.*/', $value, $accountName) ){
                preg_match('/ort:\s.*/', $value, $dateOfReport);
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

                //date format
                $dateOfReportDateFormat = date("d-m-Y", strtotime(str_replace(["ort: ", "\r"],"",$dateOfReport[0])));
                $dateOpenedDateFormat = date("d-m-Y", strtotime(str_replace("Date Opened ", "", $dateOpened[0])));
                $balanceUpdatedDateFormat = date("d-m-Y", strtotime(str_replace(["Balance Updated ", "Balance\r\n", "Updated\r\n"], "", $balanceUpdated[0])));


                $dataCreditDetailsExperian[] =[
                    'user_id' => $userId,
                    'attachment_id' => $attachmentId,

//                   date_of_reported
                    'date_of_report' => $dateOfReportDateFormat,

//                   account_name
                    'account_name' =>str_replace("Account Name ", "", $accountName[0]),

//                   account_number
                    'account_number' =>str_replace("Account # ", "", $accountNumber[0]),

//                   original_creditor
                    'original_creditor'=>str_replace("Original Creditor ", "", $originalCreditor[0]),

//                  company_sold
                    'company_sold' =>str_replace("Company Sold ", "", $companySold[0]),

//                  account_type
                    'account_type' =>str_replace("Account Type ", "", $accountType[0]),

//                   date_opened
                    'date_opened' =>$dateOpenedDateFormat,

//                   account_status
                    'account_status' =>str_replace("Account Status! ", "", $actualStatus[0]),

//                   payment_status
                    'payment_status' => str_replace( "\r\n","",$paymentStatus),

//                   status_updated
                    'status_updated' =>str_replace("Status Updated ", "", $statusUpdated[0]),

//                   balance
                    'balance' =>str_replace("Balance ", "", $balance[0]),

//                   balance_updated
                    'balance_updated' =>$balanceUpdatedDateFormat,

//                   original_balance
                    'original_balance' =>!empty($originalBalance)?str_replace("Original Balance ", "", $originalBalance[0]):'',

//                   credit_limit
                    'credit_limit' =>!empty($creditLimit)?str_replace("Credit Limit ", "", $creditLimit[0]):'',

//                   monthly_payment
                    'monthly_payment' =>str_replace(["Monthly Payment ", "Monthly\r\n", "Payment\r\n"], "", $monthlyPayment[0]),

//                   past_due_amount
                    'past_due_amount' =>str_replace(["Past Due Amount ", "Past Due\r\n", "Amount\r\n"], "", $pastDueAmount[0]),

//                   highest_balance
                    'highest_balance' =>str_replace("Highest Balance ", "", $highestBalance[0]),

//                   terms
                    'terms' => str_replace("Terms ", "", $terms[0]),

//                   responsibility
                    'responsibility' =>str_replace("Responsibility ", "", $responsibility[0]),

//                   your_statement
                    'your_statement' =>str_replace("Your Statement ", "", $yourStatement[0]),

//                   comments
                    'comments' =>str_replace( "\r\n"," ",$comments),

//                   contact_information
                    'contact_information' => str_replace( "\r\n","",$contactInformation),

//                   payment_history
                    'payment_history' => $paymentHistory,
                ];

            }

        }

         return $dataCreditDetailsExperian;

    }

    public function getTransUnionAccountDetailsData($path, $userId, $attachmentId)
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

                    'user_id' => $userId,
                    'attachment_id' => $attachmentId,

//                  account_name
                    'account_name' => $accountNameTrans[1][$count],

//                  account_number
                    'account_number' => str_replace(["mber ","\r"], "", $accountNumber[0]),

//                  'condition'
                    'account_status' => str_replace(["Condition ", "\r"], "", $condition[0]),

//                  'responsibility'
                    'responsibility' => str_replace(["Responsibility ", "\r"], "", $responsibility[0]),

//                  'current_balance'
                    'balance' => str_replace("Current Balance ", "", $currentBalance[0]),

//                  'original_balance'
                    'original_balance'=> str_replace("Original Balance ", "", $originalBalance[0]),

//                  'limit'
                    'credit_limit' => str_replace("Limit ", "", $limit[0]),

//                  'monthly_payment'
                    'monthly_payment' =>str_replace("Monthly Payment ", "", $monthlyPayment[0]),

//                  'last_payment'
                    'balance_updated' => str_replace("Last Payment ", "", $lastPayment[0]),

//                  'status'
                    'payment_status' => str_replace("Status ", "", $status[0]),

//                  'loan_term'
                    'terms' => str_replace("Loan Term ", "", $loanTerm[0]),

//                  account_type
                    'loan_Type' => str_replace("Loan Type ", "", $loanType[0]),

//                  'opened'
                    'date_opened' => str_replace("Opened ", "", $opened[0]),

//                  date_of_reported
                    'reported' => str_replace("Reported ", "", $reported[0]),

//                  'remarks'
                    'comments'=> str_replace("Remarks ", "", $remarks[0]),

//                  'creditor_information'
                    'contact_information' => str_replace("\r\n", ' ', $creditorInformation),
                ];

                $count++;
            }
        }
        return $dataArrayTransAD;

    }

    public function getTransUnionPaymentHistoryData($path, $userId, $attachmentId)
    {
        $textUnion =new Pdf($this->PDF_TO_TEXT);
        $textUnion->setPdf($path);
        $dataUnion = $textUnion->setOptions(['raw', 'f 1'])->text();

        $dataUnionForAccount = explode('Revolving', $dataUnion);

        preg_match_all('/(^[A-Z1,\/]{2,}+[A-Z\s]{1,}+[\$ 0-9]{2,}+[0-9\/]{2}[0-9\/]{2}[0-9\/])/m', $dataUnionForAccount[1], $accountNameUnion);
        $dataPaymentHistory = explode('Payment Status ',$dataUnion );

        $regex = '/Jan [0-9]{4} [A-Z]{1,}|Feb [0-9]{4} [A-Z]{1,}|Mar [0-9]{4} [A-Z]{1,}|Apr [0-9]{4} [A-Z]{1,}|May [0-9]{4} [A-Z]{1,}|Jun [0-9]{4} [A-Z]{1,}|Jul [0-9]{4} [A-Z]{1,}|Aug [0-9]{4} [A-Z]{1,}|Sep [0-9]{4} [A-Z]{1,}|Oct [0-9]{4} [A-Z]{1,}|Nov [0-9]{4} [A-Z]{1,}|Dec[0-9]{4} [A-Z]{1,}/';

        $transUnionPaymentHistory = [];

        foreach($dataPaymentHistory  as $key => $value){

            if($key != 0){

                preg_match('/Past Due Amount\s.*[0-9]/m', $value, $pastDueAmount);
                preg_match('/30 Days -\s.*/m', $value, $thirtyDays);
                preg_match('/60 Days -\s.*/m', $value, $sixtyDays);
                preg_match('/90 Days -\s.*/m', $value, $ninetyDays);

                preg_match_all($regex, $value, $history);
               $paymentHistory = [];
               foreach($history[0] as $value){
                  $explode =  explode(' ', $value);
                   $paymentHistory[$explode[1]][$explode[0]] = $explode[2];
               }

                $transUnionPaymentHistory[] = [
                    'user_id' => $userId,
                    'attachment_id' => $attachmentId,
                    'past_due_amount' =>str_replace("Past Due Amount ", "", $pastDueAmount[0]),
                    'late_payment' => [
                        '30' => str_replace(["30 Days - ", "\r"], "",$thirtyDays[0]),
                        '60' => str_replace(["60 Days - ", "\r"], "",$sixtyDays[0]),
                        '90' => str_replace(["90 Days - ", "\r"], "",$ninetyDays[0]),
                    ],
                    'payment_history' =>$paymentHistory
                ];
            };
        }

        if(count($accountNameUnion[1]) != count($transUnionPaymentHistory)){
            return false;
        };
        for($i = 0; $i <= count($transUnionPaymentHistory)-1; $i++ ){
            $transUnionPaymentHistory[$i]['account_name'] =$accountNameUnion[1][$i];
        }
        return $transUnionPaymentHistory;
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
