<?php

namespace App\Services;
use Spatie\PdfToText\Pdf;

class ReadPdfData
{

    public function getCreditKarmaData($attachment)
    {
//        $text =new Pdf(config("pdf_to_text"));
        $text =new Pdf('C:\xampp\htdocs\ccc\pdftotext.exe');
        $text->setPdf($attachment->path);
        $data = $text->setOptions(['raw', 'f 1'])->text();

        $dataArray = explode(PHP_EOL, $data);

        dd($data );
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
                'user_id' => $attachment->user_id,
                'attachment_id' => $attachment->id,

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

    public function getExprianData($attachment)
    {

//        dd('kkkk',$attachment);
//        $textEx = new Pdf(config("pdf_to_text"));
        $textEx = new Pdf('C:\xampp\htdocs\ccc\pdftotext.exe');
        $textEx->setPdf($attachment->path);
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
                    'user_id' => $attachment->user_id,
                    'attachment_id' => $attachment->id,

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

    public function getTransUnionAccountDetailsData($attachment)
    {
//        $textTrans = new Pdf(config("pdf_to_text"));
        $textTrans = new Pdf('C:\xampp\htdocs\ccc\pdftotext.exe');
        $textTrans->setPdf($attachment->path);
        $dataTrans = $textTrans->setOptions(['raw', 'f 1'])->text();

        $dataArrayTrans = explode('Account Nu',$dataTrans);
        $dataAccountName = explode('Revolving', $dataTrans);


        preg_match_all('/([A-Z1,\/]{2,}+[A-Z\s]{1,})+[\$ 0-9]{1,}+[0-9\/]{2}[0-9\/]{2}[0-9\/]/', $dataAccountName[1], $accountNameTrans);

        $dataArrayTransAD =[];
        $count = 0;
        array_shift($dataArrayTrans);
        foreach($dataArrayTrans as $key => $value) {

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

                    'user_id' => $attachment->user_id,
                    'attachment_id' => $attachment->id,

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

    public function getTransUnionPaymentHistoryData($attachment)
    {
//        $textUnion = new Pdf(config("pdf_to_text"));
        $textUnion = new Pdf('C:\xampp\htdocs\ccc\pdftotext.exe');
        $textUnion->setPdf($attachment->path);
        $dataUnion = $textUnion->setOptions(['raw', 'f 1'])->text();

        $dataUnionForAccount = explode('Revolving', $dataUnion);

        preg_match_all('/(^[A-Z0-9,\/-]{2,}+[A-Z\s]{1,})+([\$ 0-9]{1,}+[0-9\/]{2}[0-9\/]{2}[0-9\/])/m', $dataUnionForAccount[1], $accountNameUnion);

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
                    'past_due_amount' =>str_replace("Past Due Amount ", "", $pastDueAmount[0]),
                    'late_payment' => [
                        '30' => str_replace(["30 Days - ", "\r"], "",$thirtyDays[0]),
                        '60' => str_replace(["60 Days - ", "\r"], "",$sixtyDays[0]),
                        '90' => str_replace(["90 Days - ", "\r"], "",$ninetyDays[0]),
                    ],
                    'payment_history' => $paymentHistory
                ];
            }
        }

//        if(count($accountNameUnion[1]) != count($transUnionPaymentHistory)){
//            return false;
//        };
        for($i = 0; $i <= count($transUnionPaymentHistory)-1; $i++ ){
            $transUnionPaymentHistory[$i]['account_name'] = $accountNameUnion[1][$i];
        }
        return $transUnionPaymentHistory;
    }

    public function getExperianReport($path, $userId, $attachmentId)
    {
//        $text = new Pdf(config('pdf_to_text'));
        $text = new Pdf('C:\xampp\htdocs\ccc\pdftotext.exe');
        $text->setPdf($path);
        $data = $text->setOptions(['raw', 'f 1'])->text();


        $data = explode('Account name', $data);
        $dataReport = [];
        array_shift($data);
        foreach($data as $key=>$value){

            $acountName = str_replace("\r\n", '', $this->get_account_name($value,'Account number' ));
            if (empty($acountName)){
                continue;
            }
            $dataReport[$key]["user_id"] = $userId;
            $dataReport[$key]["attachment_id"] = $attachmentId;


            $dataReport[$key]["account_name"] = $acountName;
            $dataReport[$key]["account_number"]  = str_replace("\r\n", '',$this->get_string_between($value, 'Account number', 'Recent balance' ));
            $dataReport[$key]["recent_balance"] = str_replace("\r\n", '',$this->get_string_between($value, 'Recent balance', 'Date opened' ));
            $dataReport[$key]["date_opened"] = str_replace("\r\n", '',$this->get_string_between($value, 'Date opened', 'Status' ));
            $dataReport[$key]["type"] = str_replace("\r\n", '',$this->get_string_between($value, 'Type', 'Terms' ));
            $dataReport[$key]["terms"] = str_replace("\r\n", '',$this->get_string_between($value, 'Terms', 'On record until' ));
            $dataReport[$key]["on_record_until"] = str_replace("\r\n", '',$this->get_string_between($value, 'On record until', 'Credit limit ' ));
            $dataReport[$key]["credit_limit"] = str_replace("\r\n", '',$this->get_string_between($value, 'original amount', 'High balance' ));
            $dataReport[$key]["highest_balance"] = str_replace("\r\n", '',$this->get_string_between($value, 'High balance', 'Monthly payment' ));
            $dataReport[$key]["mountly_payment"] = str_replace("\r\n", '',$this->get_string_between($value, 'Monthly payment', 'Recent payment' ));
            $dataReport[$key]["recent_payment"] = str_replace("\r\n", '',$this->get_string_between($value, "Recent payment\r\namount", 'Date of status' ));
            $dataReport[$key]["date_of_status"] = str_replace("\r\n", '',$this->get_string_between($value, "Date of status", 'First reported' ));
            $dataReport[$key]["first_reported"] = str_replace("\r\n", '',$this->get_string_between($value, "First reported", 'Responsibility' ));
            $dataReport[$key]["sold_to"] = $soldTo = str_replace("\r\n", '',$this->get_string_between($value, "Sold to", 'Type' ));
            $dataReport[$key]["original_creditor"] = $originalCreditor = str_replace("\r\n", '',$this->get_string_between($value, "Original creditor", 'Type' ));
            $dataReport[$key]["mortgage_identification_number"] = $mortgageIdentificationNumber = str_replace("\r\n", '',$this->get_string_between($value, "Mortgage identification number", 'Type' ));

            $addressIdentificationNumber = null;
            if($soldTo != null){
                $addressIdentificationNumber = str_replace("\r\n", '',$this->get_string_between($value, "Address identification number", 'Sold to' ));
            }elseif($originalCreditor != null){
                $addressIdentificationNumber = str_replace("\r\n", '',$this->get_string_between($value, "Address identification number", 'Original creditor' ));
            }elseif($mortgageIdentificationNumber != null ){
                $addressIdentificationNumber = str_replace("\r\n", '',$this->get_string_between($value, "Address identification number", 'Mortgage identification number' ));
            }else{
                $addressIdentificationNumber = str_replace("\r\n", '',$this->get_string_between($value, "Address identification number", 'Type'));
            }
            $dataReport[$key]["address_identification_number"] = $addressIdentificationNumber;

            $statusAddress =str_replace("\r\n", ' ',$this->get_string_between($value, "Status", 'Address identification number' ));
            preg_match('/[A-Z]{2,}+(.*)$/',$statusAddress, $address );
            $dataReport[$key]["address"] = $address[0];
            $statusText = str_replace([ $address[0],' + Dispute'], '', $statusAddress);
            $pattern = '/(Closed|Account|Transferred|Foreclosed|Collection|Open|Paid)+(.*)$/';
            preg_match($pattern,$statusText, $status );
            $dataReport[$key]["status"] = $status[0];

            $commentOther = $this->get_string_between($value, "Comment", null);

            $patternBalanceHistory = '/[A-z]{3} 20[0-9]{2}: \$[0-9]{1,},[0-9]{1,} \/\s([A-z]{3}\s[0-9]{2},\s20[0-9]{2}|No data)\s\/\s(\$[0-9]{1,},[0-9]{1,}|\$[0-9]{1,}|No data)\s\/\s(\$[0-9]{1,},[0-9]{1,}|\$[0-9]{1,}|No data)/';
            $patternPaymentHistoryGuide = '/(30|60|90|120|150|180)\sdays past due as of(.*)\r/';
            $patternChargeOfOther = '/(Charge Off|Foreclosure|Collection).*/';

            $comment = null;
            $responsibility = null;
            $historyGuide = [];
            if($commentOther != null) {
                $commentText = str_replace("\r\n", ' ', $commentOther);
                preg_match('/[0-9]{4}\s[A-z]{3}+(.*)$/', $commentText, $removedPart);
                $comment = str_replace($removedPart[0], '', $commentText);
                $responsibility = str_replace("\r\n", ' ', $this->get_string_between($value, "Responsibility", 'Comment'));
                preg_match_all($patternBalanceHistory, $commentOther, $balanceHistory);
                preg_match_all($patternPaymentHistoryGuide, $commentOther, $historyGuide);
                $historyGuide = !empty($historyGuide[0]) ? $historyGuide[0] : [];
                preg_match($patternChargeOfOther, $commentOther, $chargeOffOther);
                $end = isset($historyGuide[0][0])?$historyGuide[0][0]: 'The following';
                if(isset($chargeOffOther[1])){
                    $chargeAndOther = $chargeOffOther[1]. str_replace("\r\n", ' ', $this->get_string_between($commentOther, $chargeOffOther[1], $end ));
                    if (!empty($chargeAndOther)) {
                        array_push($historyGuide, $chargeAndOther);
                    }
                    $endPaymentHistory = isset($chargeOffOther[1])?$chargeOffOther[1]:$end;
                    $paymentHistoryAll =$this->get_account_name($removedPart[0], $endPaymentHistory);
                }else{
                    $paymentHistoryAll =$this->get_account_name($removedPart[0], $end);
                }
            }else{
                $responsibilityOther = str_replace("\r\n", ' ', $this->get_string_between($value, "Responsibility", null));
                $responsibilityText = str_replace("\r\n", ' ', $responsibilityOther);
                preg_match('/20[0-9]{2}\s[A-z]{3}+(.*)$/', $responsibilityText, $removedPart);
                $responsibility = str_replace($removedPart[0], '', $responsibilityText);

                preg_match_all($patternBalanceHistory, $responsibilityOther, $balanceHistory);
                preg_match_all($patternPaymentHistoryGuide, $responsibilityOther, $historyGuide);
                preg_match($patternChargeOfOther, $responsibilityOther, $chargeOffOther );
                $historyGuide = !empty($historyGuide[0]) ? $historyGuide[0] : [];
                $end = isset($historyGuide[0][0])?$historyGuide[0][0]: 'The following';

                if(isset($chargeOffOther[1])){
                    $chargeAndOther = $chargeOffOther[1]. str_replace("\r\n", ' ', $this->get_string_between($commentOther, $chargeOffOther[1], $end ));
                    if (!empty($chargeAndOther)) {
                        array_push($historyGuide, $chargeAndOther);
                    }
                    $endPaymentHistory = isset($chargeOffOther[1])?$chargeOffOther[1]:$end;
                    $paymentHistoryAll =$this->get_account_name($removedPart[0], $endPaymentHistory);

                }else{
                    $paymentHistoryAll =$this->get_account_name($removedPart[0], $end);
                }
            }

            $dataReport[$key]["balance_history"] = !empty($balanceHistory[0]) ? $balanceHistory[0] : null;
            $dataReport[$key]["history_guide"] = $historyGuide;
            $dataReport[$key]["comment"] = $comment;
            $dataReport[$key]["responsibility"] = $responsibility;

            $year = null;
            $paymentHistory= [];
            $month = null;

            foreach(explode(' ', trim($paymentHistoryAll))as $value){

                preg_match('/20[0-9]{2}/', $value, $matchYear);
                preg_match('/[A-z]{3}/', $value, $matchMonth);
                if (isset($matchYear[0])) {
                    $year = $matchYear[0];
                    continue;
                }
                if (isset($matchMonth[0])) {
                    $month = $matchMonth[0];
                    continue;
                }
                $paymentHistory [$year][$month]  = $value;
            }
            $dataReport[$key]["payment_history"] = $paymentHistory;

        }

        return $dataReport;
    }

    public function equifaxPdf($attachment)
    {
        //        $text = new Pdf(config("pdf_to_text"));
        $text = new Pdf('C:\xampp\htdocs\ccc\pdftotext.exe');
        $text  ->setPdf($attachment);
        $data = $text->setOptions(['table', 'f 1'])->text();

        $delimiter = 'Payment History Key';
        $delimiterInquiry = 'Inquiries that do not impact your credit rating';

        $matchAccount = '/^[A-Z\/\s]{3,}+[0-9X\s]{2,}+[0-9\/]{2}+[0-9\/]{2}+[0-9]{4}.*/m';
        $matchInquiry = '/^[A-Z\/\s:\:]{3,}+[0-9]{2}\/[0-9]{2}\/[0-9]{2}.*/m';
        $dataArray = explode($delimiter, $data);
        preg_match_all($matchAccount, $dataArray[0], $separateMatch);
        $dataInquiry = explode($delimiterInquiry, $dataArray[1]);

        preg_match_all($matchInquiry, $dataInquiry[0], $separateInquiryMatch);

        $separate = $separateMatch[0]?$separateMatch[0]:null;
        $separateInquiry = $separateInquiryMatch[0]?$separateInquiryMatch[0]:null;
//        dd($separateInquiry);
        $dataEquifax = [];

//        dd($dataArray[0]);
        for($i = 0; $i<= count($separate)-1; $i++) {
            if($i ==  count($separate)-1){
                $data =$this-> get_string_between($dataArray[0],$separate[$i], 'Other Accounts' );
            }else{
                $data =$this-> get_string_between($dataArray[0],$separate[$i],$separate[$i+1] );
            }

            preg_match('/^[A-Z\/\s]{3,}/m',$separate[$i] , $account);
            $accountName = str_replace(["\r\n", "  ", "\n"],'',$account[0]) ;

            $address = str_replace(["\r\n", "  ", "\n"],'',$this->get_string_between($data, $accountName, 'Account Number'));
            $accountNumber  =  str_replace(["\r\n", "  ", "\n"],'',$this->get_string_between($data, 'Account Number:', ' Current Status'));
            $currentStatus  =  str_replace(["\r\n", "  ", "\n"],'',$this->get_string_between($data, 'Current Status:', 'Account Owner'));
            $accountOwner  =  str_replace(["\r\n", "  ", "\n"],'',$this->get_string_between($data, 'Account Owner:', 'High Credit'));
            $highCredit  =  str_replace(["\r\n", "  ", "\n"],'',$this->get_string_between($data, 'High Credit:', 'Type of Account'));
            $typeOfAccount  =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Type of Account', 'Credit Limit'));
            $creditLimit  =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Credit Limit:', 'Term Duration'));
            $termDuration  =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Term Duration:', 'Terms Frequency'));
            $termsFrequency  =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Terms Frequency:', 'Date Opened'));
            $dateOpened  =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Date Opened:', 'Balance'));
            $balance  =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Balance:', 'Date Reported'));
            $dateReport  =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Date Reported:', 'Amount Past Due'));
            $amountPastDue =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Amount Past Due:', 'Date of Last Payment'));
            $dateOfLastPayment =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Date of Last Payment:', 'Actual Payment Amount'));
            $actualPaymentAmount =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Actual Payment Amount:', 'Scheduled Payment Amount'));
            $scheduledPaymentAmount =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Scheduled Payment Amount:', 'Date of Last Activity'));
            $dateLastActivity =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Date of Last Activity:', 'Date Major Delinquency First Reported'));
            $dateMajorDelinquencyFirstReported =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Date Major Delinquency First Reported:', 'Months Reviewed:'));
            $monthsReviewed =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Months Reviewed:', 'Creditor Classification'));
            $creditorClassification=  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Creditor Classification:', 'Activity Description'));
            $activityDescription=  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Activity Description:', 'Charge Off Amount'));
            $chargeOffAmount =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Charge Off Amount:', 'Deferred Payment Start Date'));
            $deferredPaymentStartDate =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Deferred Payment Start Date:', 'Balloon Payment Amount'));
            $balloonPaymentAmount =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Balloon Payment Amount', 'Balloon Payment Date'));
            $balloonPaymentDate =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Balloon Payment Date', 'Date Closed'));
            $dateClosed =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Date Closed', 'Type of Loan'));
            $typeOfLoan =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Type of Loan', 'Date of First Delinquency'));
            $dateOfFirstDelinquency =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Date of First Delinquency', 'Comments'));
            $comments =  str_replace(["\r\n", "  ", "\n",":"],'',$this->get_string_between($data, 'Comments', '81'));

            $paymentHistory =[];
            if(!strpos($data,'No 81-Month Payment Data available for display' )){
                if(strpos($data,'Historical Account Information' )){
                    $payment =$this-> get_string_between($data,'81-Month Payment History', 'Historical Account Information' );

                }else{
                    $payment =$this-> get_string_between($data,'81-Month Payment History', null );
                }

                $paymentArray = explode(PHP_EOL,  $payment);
                $dataPayArray = array_values(array_filter($paymentArray));
                $locationMatch = array_shift($dataPayArray);
                $location['year'] = strpos($locationMatch, 'Year');
                $location['jan'] = strpos($locationMatch, 'Jan');
                $location['feb'] = strpos($locationMatch, 'Feb');
                $location['mar'] = strpos($locationMatch, 'Mar');
                $location['apr'] = strpos($locationMatch, 'Apr');
                $location['may'] = strpos($locationMatch, 'May');
                $location['jun'] = strpos($locationMatch, 'Jun');
                $location['jul'] = strpos($locationMatch, 'Jul');
                $location['aug'] = strpos($locationMatch, 'Aug');
                $location['sep'] = strpos($locationMatch, 'Sep');
                $location['oct'] = strpos($locationMatch, 'Oct');
                $location['nov'] = strpos($locationMatch, 'Nov');
                $location['dec'] = strpos($locationMatch, 'Dec');

                foreach ($dataPayArray as $pay){
                    $year = trim(substr($pay, $location['year'], 7));
                    $paymentHistory[$year] = [
                        'jan'=> trim(substr($pay, $location['jan']-1, 5)),
                        'feb' => trim(substr($pay, $location['feb']-1, 5)),
                        'mar' => trim(substr($pay, $location['mar']-1, 5)),
                        'apr' => trim(substr($pay, $location['apr']-1, 5)),
                        'may' => trim(substr($pay, $location['may']-1, 5)),
                        'jun' => trim(substr($pay, $location['jun']-1, 5)),
                        'jul' => trim(substr($pay, $location['jul']-1, 5)),
                        'aug' => trim(substr($pay, $location['aug']-1, 5)),
                        'sep' => trim(substr($pay, $location['sep']-1, 5)),
                        'oct' => trim(substr($pay, $location['oct']-1, 5)),
                        'nov' => trim(substr($pay, $location['nov']-1, 5)),
                        'dec' => trim(substr($pay, $location['dec']-1, 5)),
                    ];
                }
            }

            if(strpos($data,'Historical Account Information' )) {

                $historicalAccount = $this->get_string_between($data, 'Historical Account Information', null);

                $historicalAccount= str_replace(["Payment Amount\r\n","Amount\r\n", "Payment\r\n"],'',$historicalAccount);
                preg_match_all('/(^\s+[0-9]{2}\/[0-9]{4}).*+\s+Balance/mi',$historicalAccount, $match);
                $dateArray = isset($match[0])?$match[0]:null;
                $historyInfo=[];
                $history=[];
                foreach($dateArray as $key =>$value){
                    preg_match_all('/[0-9]{2}\/[0-9]{4}/mi',$value, $dates);

                    foreach($dates[0] as $date){
                        $loc= array_values(array_filter(explode(PHP_EOL,str_replace('Balance','',$value))));
                        $locationDate[$key][$date] = strpos($loc[0], $date);

                    }
                    if($key != count($dateArray)-1){
                        $history[] =$this-> get_string_between($historicalAccount, str_replace('Balance','',$value), str_replace('Balance','',$dateArray[$key+1]) );

                    }else{
                        $history[] =$this-> get_string_between($historicalAccount, str_replace('Balance','',$value), null );
                    }

                }

                foreach($history as $k =>$val){
                    $historyArray = explode(PHP_EOL,  $val);
                    $historyArray =array_values( array_filter($historyArray));
                    $type ='';
                    $j = 0;
                    foreach ($historyArray as $l =>$v){
                        if(is_numeric(strpos($v, "\f"))){
                            $j = $k+1;
                            $v = str_replace("\f",'',$v);
                        }
                        $first = strtolower(trim(substr($v, 0, 15)));

                        foreach ($locationDate[$k] as $dat=> $locDate){
                            if(isset($locationDate[$j])){
                                $n = 1;
                                if($j>$k){
                                    foreach ($locationDate[$j] as $d=> $l){
                                        $m =1;
                                        if($n == $m){
                                            $locDate = $l;
                                        }
                                        $m = $m+1;
                                    }

                                }
                                $n = $n+1;
                            }

                            if($first != null && $first != $type){
                                $historyInfo[$first][$dat] =  trim(substr($v, $locDate-1, 17));

                            }else{
                                $historyInfo[$type][$dat] = $historyInfo[$type][$dat].' '.trim(substr($v, $locDate-2, 17));
                            }
                        }
                        $type = $first != null?$first:$type;

                    }
                }dd($historyInfo);
            }
//            dd($address,$accountNumber, $accountName,$currentStatus,$accountOwner,$highCredit,$typeOfAccount,$creditLimit,$termDuration, $termsFrequency, $dateOpened,
//                $balance, $dateReport,$amountPastDue,$dateOfLastPayment, $actualPaymentAmount,$scheduledPaymentAmount,$dateLastActivity,
//                $dateMajorDelinquencyFirstReported,$monthsReviewed,$creditorClassification,$activityDescription,$chargeOffAmount,
//                $deferredPaymentStartDate,$balloonPaymentAmount, $balloonPaymentDate,$dateClosed, $typeOfLoan,$dateOfFirstDelinquency, $comments,$data);
        }

        for($i = 0; $i<= count($separateInquiry)-1; $i++){
            if($i ==  count($separateInquiry)-1){
                $data =$this-> get_string_between($dataInquiry[0],$separateInquiry[$i], 'Inquiries that do not impact your credit rating' );
            }else{
                $data =$this-> get_string_between($dataInquiry[0],$separateInquiry[$i],$separateInquiry[$i+1] );
            }

            $contactInformation = str_replace(["\r\n", "  "]," ", $data);
        }

        if(isset($dataInquiry[1])){
            $strat = 'Date of Inquiry';
            $end = 'Prefix';
            $simpleInquiry = $this-> get_string_between($dataInquiry[1], $strat, $end);
            dd($simpleInquiry);
        }

    }



    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        if($end == null){
            $len = strlen($string) - $ini;
        }else{
            $len = strpos($string, $end, $ini) - $ini;
        }

        return substr($string, $ini, $len);
    }

    function get_account_name($string, $end){

        $len = strpos($string, $end);
        return substr($string,  0, $len);
    }
    function get_history($string, $end){

        $len = strpos($string, $end)+ strlen($end);

        return substr($string,  0, $len);
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
