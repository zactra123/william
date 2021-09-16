<?php

namespace App\Services;

class ClientDetailsNewData
{
    /**
     * ClientDetailsNewData Services.
     * Reads a date from documents  driver license and social security returns
     * value expiration, date date of birth, address (number, name, city, state, zip)
     * sex first and last name and social security number
     */

    private $OCR_URL = "https://api.idanalyzer.com";


    /**
     *check driver license file size if size more than 1mb resize image else call to api
     * for read document data
     *
     */
    public function getImageDriverLicense($path, $name, $extension)
    {
        $driverLicenseSize = false;

        if($extension != 'pdf'){
            $driverLicenseSize = \Image::make(public_path($path))->filesize();
        }

        if($driverLicenseSize > 1048576){
            $draftPath = $this->resizeImage($path, $name);
            $textDriverLicense = $this->getImageData($draftPath);
        }else{
            if($extension == 'pdf' ){
                $textDriverLicense = $this->getImageData($path);
            }else{
                $textDriverLicense = $this->getImageData($path);
            }

        }
        $resultDriverLicense = $this->dirverLicenseProcessing($textDriverLicense);


       // $resultDriverLicense = $this->dirverLicenseProcessing($textDriverLicense);

        return $resultDriverLicense;
    }

    /**
     *check social security file size if size more than 1mb resize image else call to api
     * for read document data
     */
    public function getImageSocialSecurity($path, $name, $extension)
    {

        $socialSecuritySize = false;

        if($extension != 'pdf'){
            $socialSecuritySize = \Image::make(public_path($path))->filesize();
        }

        if($socialSecuritySize > 1048576){
            $draftPath = $this->resizeImage($path, $name);

            $textSocialSecurity = $this->getImageData($draftPath);
        }else{
            if($extension == 'pdf' ){
                $textSocialSecurity = $this->getImageData($path);
            }else{
                $textSocialSecurity = $this->getImageData($path);
            }
        }
        $resultSocialSecurity = $this->socialSecurityProccessing($textSocialSecurity);
        return $resultSocialSecurity;

    }

    /**
     *call to api for read data from document
     */
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

    /**
     * Reads a date from documents  driver license returns
     * value expiration, date date of birth, address (number, name, city, state, zip)
     * sex first and last name
     */
    public function dirverLicenseProcessing($text)
    {
        if(isset($text['error']) ){
            $result = $text;
            return $result;

        }else{
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

    }

    /**
     * Reads a date from documents social security returns
     * value social security
     */
    public function socialSecurityProccessing($text)
    {
        if(isset($text['error']) ){
            $result = $text;
            return $result;
        }else{
            $result = [];
            $result["ssn"] =  $text['result']['documentNumber'];;
            return $result;
        }

    }

    /**
     *resize file (driver license or social security)
     */
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
