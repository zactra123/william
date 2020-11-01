<?php

namespace App\Services;

class ClientDetailsNewData
{
    private $OCR_URL = "https://api.idanalyzer.com";

    public function getImageDriverLicense($path, $name, $extension)
    {
        $driverLicenseSize = false;

        if($extension != 'pdf'){
            $driverLicenseSize = \Image::make(public_path($path))->filesize();
        }

        if($driverLicenseSize > 1048576){

            $draftPath = $this->resizeImage($path, $name);

            $textDriverLicense = $this->getImageData($draftPath);
            $resultDriverLicense = $this->dirverLicenseProcessing($textDriverLicense);
        }else{
            if($extension == 'pdf' ){
                $textDriverLicense = $this->getImageData($path);
                $resultDriverLicense = $this->dirverLicenseProcessing($textDriverLicense);
            }else{
                $textDriverLicense = $this->getImageData($path);
                $resultDriverLicense = $this->dirverLicenseProcessing($textDriverLicense);
            }


        }

//        $textDriverLicense = [
//            "result" => [
//            "documentNumber" => "Y5940176",
//            "firstName" => "VAZGEN",
//            "lastName" => "POGHOSYAN",
//            "fullName" => "VAZGEN POGHOSYAN",
//            "height" => "6'",
//            "dob_day" => 27,
//            "dob_month" => 9,
//            "dob_year" => 1995,
//            "expiry_day" => 27,
//            "expiry_month" => 9,
//            "expiry_year" => 2024,
//            "address1" => "10701 LUELLA CT",
//            "address2" => "RNCHO CORDOVA, CA",
//            "postcode" => "95670",
//            "internalId" => "1739",
//            "documentSide" => "FRONT",
//            "documentType" => "D",
//            "issuerOrg_region_full" => "California",
//            "issuerOrg_region_abbr" => "CA",
//            "issuerOrg_full" => "United States",
//            "issuerOrg_iso2" => "US",
//            "issuerOrg_iso3" => "USA",
//            "nationality_full" => "United States",
//            "nationality_iso2" => "US",
//            "nationality_iso3" => "USA",
//            "dob" => "1995/09/27",
//            "age" => 25,
//            "expiry" => "2024/09/27",
//            "daysToExpiry" => 1427,
//          ],
//          "matchrate" => 0.68,
//          "executionTime" => 1.5928189754486,
//          "responseID" => "7da9d3517ae323e64e53d55c09efa9c4",
//          "quota" => 91,
//          "credit" => 0,
//        ];


        $resultDriverLicense = $this->dirverLicenseProcessing($textDriverLicense);

        return $resultDriverLicense;


    }

    public function getImageSocialSecurity($path, $name, $extension)
    {


        $socialSecuritySize = false;

        if($extension != 'pdf'){
            $socialSecuritySize = \Image::make(public_path($path))->filesize();
        }

        if($socialSecuritySize > 1048576){
            $draftPath = $this->resizeImage($path, $name);

            $textSocialSecurity = $this->getImageData($draftPath);
            $resultSocialSecurity = $this->socialSecurityProccessing($textSocialSecurity);
        }else{
            if($extension == 'pdf' ){
                $textSocialSecurity = $this->getImageData($path);
                $resultSocialSecurity = $this->socialSecurityProccessing($textSocialSecurity);
            }else{
                $textSocialSecurity = $this->getImageData($path);
                $resultSocialSecurity = $this->socialSecurityProccessing($textSocialSecurity);
            }


        }

        return $resultSocialSecurity;

    }

    public function getImageData($input)
    {

        $fileData = base64_encode(file_get_contents(public_path($input)));

        $post = [
            'file_base64' => $fileData,
            'apikey' => "9FXLYXbTigS4bqJ6feknJGK1EzVpCMq9"
        ];

        try{
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.idanalyzer.com');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
            $response = curl_exec($ch);

            $result =  json_decode($response,true);


            if(!isset($result['error']) ) {

                return $result;

            } else {
                return ["error" => 400, "message" => $result['error']['code'] . " " . $result['error']['message']];

            }

        }catch(Exception $err) {
            return ["error" => 403, "message" => $err->getMessage()];
        }
    }



    public function dirverLicenseProcessing($text)
    {
        $result = [];
        $result["expiration"] =  date("Y-m-d",strtotime($text['result']['expiry']));
        $result['dob'] = date("Y-m-d",strtotime($text['result']['dob']));;
        $result['sex'] =  null;
        $result["address"]  = $text['result']['address1'].', '.$text['result']['address2'] ;

        $result["city"]   = trim(str_replace([',', $text['result']['issuerOrg_region_abbr']],'' ,$text['result']['address2']));
        $result["state"]  = $text['result']['issuerOrg_region_abbr'];
        $result["zip"]  = $text['result']['postcode'];

        preg_match("/([0-9]{1,})/im", $result["address"], $number);
        $result ["number"] = $number[0];
        $result['name'] = trim(strtoupper(str_replace($number[0],'', $result["address"])));


        $result['first_name'] = $text['result']['firstName'];
        $result['last_name'] = $text['result']['lastName'];
        return $result;
    }

    public function socialSecurityProccessing($text)
    {

        $result = [];
        $result["ssn"] =  $text['result']['documentNumber'];;

        return $result;
    }

    public function  resizeImage($path, $name)
    {
        if (!is_dir(str_replace('/'.$name,'',$path). '/draft')) {
            mkdir(str_replace('/'.$name,'',$path) . '/draft', 0777);
        }
        //path for resize image
        $draft_path =str_replace('/'.$name,'',$path). '/draft/' . $name;

        //resize image width and height
        $height = \Image::make($path)->height();
        $width = \Image::make($path)->width();
        $img = \Image::make($path);

        // resize image to fixed size
        $img->resize($width / 2, $height / 2);

        $img->save($draft_path);
        if (\Image::make($draft_path)->filesize() < 1048576) {
            return $draft_path;
        } else {
            return null;
        }
    }

}
