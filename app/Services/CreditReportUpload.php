<?php

namespace App\Services;
use Spatie\PdfToText\Pdf;

class CreditReportUpload
{

    private $PDF_TO_TEXT = 'C:\xampp\htdocs\ccc\pdftotext.exe';

    public function getCreditReportName($path)
    {
        $text =new Pdf($this->PDF_TO_TEXT);
        $text  ->setPdf($path);
        $data = $text->setOptions(['raw', 'f 1'])->text();

        if(strpos($data, 'creditreport/transunion')){
            return 'CK TU';
        }elseif(strpos($data, 'creditreport/equifax')) {
            return 'CK EQ';
        }elseif(strpos($data, 'Experian')){
            return 'EX';
        }elseif(strpos($data, 'onlinedispute.transunion')){
            return 'TU';
        }elseif(strpos($data, 'TransUnion Credit Monitoring')){
            if(strpos($data, 'Account Number')){
                return 'TU AD';
            }else{return 'TU PH';}
        }else{return null;}
    }

    public function validate($files)
    {

        if(isset($files['credit_karma'])){

            if($files['credit_karma']->getClientOriginalExtension() == 'pdf'){
                $creditReportFileName = $this->getCreditReportName($files['credit_karma']->path());
                if($creditReportFileName == 'CK TU' || $creditReportFileName == 'CK EQ' ){
                    return  ['success', $creditReportFileName];
                }else{
                    return  ['error','Please upload Credit Karma report'];
                }
            }else{
                return ['error','Please upload pdf file format'];
            }
        }elseif(isset($files['experian'])){
            if($files['experian']->getClientOriginalExtension() == 'pdf'){
                $creditReportFileName = $this->getCreditReportName($files['experian']->path());
                if($creditReportFileName == 'EX'){
                    return  ['success','EX'];
                }else{
                    return  ['error','Please upload Experian report'];
                }
            }else{

                return ['error','Please upload pdf file format'];
            }

        }elseif(isset($files['tu_online'])){
            if($files['tu_online']->getClientOriginalExtension() == 'pdf'){

                $creditReportFileName = $this->getCreditReportName($files['tu_online']->path());
                if($creditReportFileName == 'TU'){
                    return  ['success','TU online'];
                }else{
                    return  ['error','Please upload TransUnion Online Dispute report'];
                }
            }else{

                return ['error','Please upload pdf file format'];
            }

        }elseif(isset($files['tu'])){
            if(count($files['tu'])==2){
                if($files['tu']['client_details']->getClientOriginalExtension() == 'pdf'){
                    $creditReportFileName = $this->getCreditReportName($files['tu']['client_details']->path());
                    if($creditReportFileName != 'TU AD'){
                        return  ['error', 'Please upload TransUnion Account details report'];
                    }
                }else{
                    return ['error', 'Please upload pdf file format'];
                }
                if($files['tu']['payment_history']->getClientOriginalExtension() == 'pdf'){
                    $creditReportFileName = $this->getCreditReportName($files['tu']['payment_history']->path());
                    if($creditReportFileName != 'TU PH'){
                        return  ['error', 'Please upload TransUnion payment history report'];
                    }
                }else{
                    return ['error', 'Please upload TransUnion payment history report'];
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
    {$pdfCreditReport
         =[];
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

        $clientAttachmentData = [
            'user_id'=>$userId,
            'path'=>$pathCreditReport,
            'file_name'=> $nameCreditReport,
            'category' =>$category,
            'type'=>'pdf'
        ];

        return $clientAttachmentData;

    }

    public function twoFileMove($userId, $files)
    {
        $clientDetail = $files['tu']['client_detail'];
        $paymentHistory = $files['tu']['payment_history'];

        $nameClientDetail = date('YmdHis') .'_'.$clientDetail->getClientOriginalName();
        $namePaymentHistory = date('YmdHis') .'_'.$paymentHistory->getClientOriginalName();

        $path = 'files/client/details/image/'. $userId.'/creditReport';

        $clientDetail->move(public_path() . '/' . $path, $nameClientDetail);
        $paymentHistory->move(public_path() . '/' . $path, $namePaymentHistory);

        $pathClientDetails = public_path() . '/' . $path . '/'. $nameClientDetail;
        $pathPaymentHistory = public_path() . '/' . $path . '/'. $namePaymentHistory;

        $clientAttachmentData = [
            [
                'user_id'=>$userId,
                'path'=>$pathClientDetails,
                'file_name'=> $nameClientDetail,
                'category' =>'TU AD',
                'type'=>'pdf'
            ],
            [
                'user_id'=> $userId,
                'path'=>$pathPaymentHistory,
                'file_name'=> $namePaymentHistory,
                'category' =>'TU PH',
                'type'=>'pdf'
            ]

        ];

        return $clientAttachmentData;


    }






}
