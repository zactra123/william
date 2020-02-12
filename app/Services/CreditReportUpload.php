<?php

namespace App\Services;
use Spatie\PdfToText\Pdf;
use App\ClientAttachment;

class CreditReportUpload
{
    public function getValidCreditReportName($path)
    {
//        $text =new Pdf(config('pdf_to_text'));
        $text =new Pdf('C:\xampp\htdocs\ccc\pdftotext.exe');
        $text  ->setPdf($path);
        $data = $text->setOptions(['raw', 'f 1'])->text();

        if(strpos($data, 'creditreport/transunion')){
            return ['name' => 'CK TU'];
        }elseif(strpos($data, 'creditreport/equifax')) {
            return ["name" =>'CK EF'];
            return ["name" =>'CK EF'];
        }elseif(strpos($data, 'Experian')){
            return ["name"=>'EX'];
        }elseif(strpos($data, 'onlinedispute.transunion')){
            return ["name"=>'TU'];
        } elseif(strpos($data, 'TransUnion Credit Monitoring')) {

            if (strpos($data, 'Account Number')) {
                // Check All Account rows are expanded
                $dataArrayTrans = explode('Account Nu',$data);
                $dataAccountName = explode('Revolving', $data);
                array_shift($dataArrayTrans);
                preg_match_all('/([A-Z1,\/]{2,}+[A-Z\s]{1,})+[\$ 0-9]{1,}+[0-9\/]{2}[0-9\/]{2}[0-9\/]/', $dataAccountName[1], $accountNameTrans);
//                if (count($dataArrayTrans) != count($accountNameTrans[1])){
//                    return ["name" => 'TU AD', "error" => "Please expand all Account rows in Trans Union Account details pdf"];
//                }

                return ["name" => 'TU AD', "accounts" => count($accountNameTrans[1])];
            } elseif (strpos($data, "Past Due Amount")) {
                // Check All Account rows are expanded
                $dataUnionForAccount = explode('Revolving', $data);
                preg_match_all('/(^[A-Z0-9,\/-]{2,}+[A-Z\s]{1,})+([\$ 0-9]{1,}+[0-9\/]{2}[0-9\/]{2}[0-9\/])/m', $dataUnionForAccount[1], $accountNameTrans);
                $dataPaymentHistory = explode('Payment Status ', $data );
                array_shift($dataPaymentHistory);
//                if ($accountNameTrans[1] != count($dataPaymentHistory)) {
//                    dd($data); return ["name" => 'TU PH', "error" => "Please expand all Account rows in Trans Union payment history pdf"];
//                }
                return ["name" =>'TU PH', "accounts" => count($accountNameTrans[1])];
            }
        } else {
            return null;
        }
    }

    public function validate($files)
    {

        if (isset($files['credit_karma'])) {

            if($files['credit_karma']->getClientOriginalExtension() == 'pdf'){
                $creditReport = $this->getValidCreditReportName($files['credit_karma']->path());
                if($creditReport["name"] == 'CK TU' || $creditReport["name"] == 'CK EF' ){
                    return  ['success', $creditReport['name']];
                }else{
                    return  ['error','Please upload Credit Karma report'];
                }
            }else{
                return ['error','Please upload pdf file format'];
            }
        } elseif(isset($files['experian'])) {
            dd($files['experian']->path());

            if($files['experian']->getClientOriginalExtension() == 'pdf'){
                 $creditReport = $this->getValidCreditReportName($files['experian']->path());dd($files);
                if ($creditReport["name"] == 'EX') {
                    return  ['success','EX'];
                } else {
                    return  ['error','Please upload Experian report'];
                }
            } else {
                return ['error','Please upload pdf file format'];
            }

        } elseif(isset($files['tu_online'])) {
            if ($files['tu_online']->getClientOriginalExtension() == 'pdf') {

                $creditReport = $this->getValidCreditReportName($files['tu_online']->path());
                if ($creditReport["name"] == 'TU') {
                    return  ['success','TU online'];
                }else{
                    return  ['error','Please upload TransUnion Online Dispute report'];
                }
            }else{

                return ['error','Please upload pdf file format'];
            }

        }elseif(isset($files['tu'])){
            if (count($files['tu']) == 2) {
                if ($files['tu']['client_details']->getClientOriginalExtension() == 'pdf') {
                    $creditReport = $this->getValidCreditReportName($files['tu']['client_details']->path());
                    if ($creditReport["name"] != 'TU AD') {
                        return  ['error', 'Please upload TransUnion Account details report'];
                    } else {
                        if (isset($creditReport["error"])){
                            return ["error", $creditReport["error"]];
                        }
                        $clientDetailsAccounts = $creditReport["accounts"];
                    }
                } else {
                    return ['error', 'Please upload pdf file format'];
                }

                if ($files['tu']['payment_history']->getClientOriginalExtension() == 'pdf') {
                    $creditReport = $this->getValidCreditReportName($files['tu']['payment_history']->path());
                    if ($creditReport["name"] != 'TU PH') {
                        return  ['error', 'Please upload TransUnion payment history report'];
                    } else {
                         if (isset($creditReport["error"])){
                            return ["error", $creditReport["error"]];
                        }
                        $paymentHistoryAccounts = $creditReport["accounts"];
                    }
                }else{
                    return ['error', 'Please upload TransUnion payment history report'];
                }

                if ($clientDetailsAccounts != $paymentHistoryAccounts) {
                    return ['error', "Trans Union pdfs doesn't match"];
                }

                return ['success', 'TU'];

            }else{
                return ['error', 'Please upload two files'];
            }
        }

    }

    public function moveUploadFile($userId, $files, $category)
    {

        if($category == "TU"){
            return $this->twoFileMove($userId, $files);

        }else{
          return  $this->oneFileMove($userId, $files, $category);

        }
    }

    public function oneFileMove($userId, $files, $category)
    {

        $pdfCreditReport =[];
        if(isset($files['credit_karma'])){
            $pdfCreditReport = $files['credit_karma'];
        }elseif(isset($files['experian'])){
            $pdfCreditReport = $files['experian'];
        }elseif(isset($files['tu_online'])){
            $pdfCreditReport = $files['tu_online'];
        }


        $nameCreditReport = date('YmdHis') .'_'.$pdfCreditReport->getClientOriginalName();
        $path = 'files/client/details/image/'. $userId.'/creditReport';
        $pdfCreditReport->move(public_path() . '/' . $path, $nameCreditReport);

        $pathCreditReport = public_path() . '/' . $path . '/'. $nameCreditReport;


        $attachment = ClientAttachment::create([
            'user_id' => $userId,
            'path' => $pathCreditReport,
            'file_name' => $nameCreditReport,
            'category' => $category,
            'type'=> 'pdf'
        ]);



        return ["attachments" => [$attachment]];
    }

    public function twoFileMove($userId, $files)
    {
        $clientDetail = $files['tu']['client_details'];
        $paymentHistory = $files['tu']['payment_history'];

        $nameClientDetail = date('YmdHis') .'_'.$clientDetail->getClientOriginalName();
        $namePaymentHistory = date('YmdHis') .'_'.$paymentHistory->getClientOriginalName();

        $path = 'files/client/details/image/'. $userId.'/creditReport';

        $clientDetail->move(public_path() . '/' . $path, $nameClientDetail);
        $paymentHistory->move(public_path() . '/' . $path, $namePaymentHistory);

        $pathClientDetails = public_path() . '/' . $path . '/'. $nameClientDetail;
        $pathPaymentHistory = public_path() . '/' . $path . '/'. $namePaymentHistory;

        $attachmentAcountDetails = ClientAttachment::create(            [
                'user_id'=>$userId,
                'path'=>$pathClientDetails,
                'file_name'=> $nameClientDetail,
                'category' =>'TU AD',
                'type'=>'pdf'
            ]);

        $attachmentPaymentHistory = ClientAttachment::create([
                'user_id'=> $userId,
                'parent_id' => $attachmentAcountDetails->id,
                'path'=>$pathPaymentHistory,
                'file_name'=> $namePaymentHistory,
                'category' =>'TU PH',
                'type'=>'pdf'
            ]);

        return ["attachments" => [$attachmentAcountDetails, $attachmentPaymentHistory]];


    }






}
