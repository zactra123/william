<?php

namespace App\Services;

class ClientDetailsData
{
    private $OCR_URL = "https://api.ocr.space/parse/image";

    public function getImageDriverLicense($path, $name, $extension)
    {
        $driverLicenseSize = false;

        if($extension != 'pdf'){
            $driverLicenseSize = \Image::make($path)->filesize();
        }

        if($driverLicenseSize > 1048576){

            $draftPath = $this->resizeImage($path, $name);

            $textDriverLicense = $this->getImageData($draftPath);
            $resultDriverLicense = $this->dirverLicenseProcessing($textDriverLicense);
        }else{
            if($extension == 'pdf' ){
                $textDriverLicense = $this->getPdfData($path);
                $resultDriverLicense = $this->dirverLicenseProcessing($textDriverLicense);
            }else{
                $textDriverLicense = $this->getImageData($path);
                $resultDriverLicense = $this->dirverLicenseProcessing($textDriverLicense);
            }


        }

        return $resultDriverLicense;


    }

    public function getImageSocialSecurity($path, $name, $extension)
    {


        $socialSecuritySize = false;

        if($extension != 'pdf'){
            $socialSecuritySize = \Image::make($path)->filesize();
        }

        if($socialSecuritySize > 1048576){
            $draftPath = $this->resizeImage($path, $name);

            $textSocialSecurity = $this->getImageData($draftPath);
            $resultSocialSecurity = $this->socialSecurityProccessing($textSocialSecurity);
        }else{
            if($extension == 'pdf' ){
                $textSocialSecurity = $this->getPdfData($path);
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
        $client = new \GuzzleHttp\Client();

        $fileData = fopen($input, 'r');
        try {
            $r = $client->request('POST', $this->OCR_URL,[
                'headers' => ['apiKey' => config('app.ocr_key')],
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => $fileData
                    ],
                    [
                        'name' => 'OCREngine',
                        'contents' => 2
                    ],
                    [
                        'name' => "detectOrientation",
                        "contents" => "true"
                    ],
                    [
                        'name' => 'scale',
                        'contents' => 'true'
                    ]
                ]
            ], ['file' => $fileData]);


            $response =  json_decode($r->getBody(),true);

            if($response['ParsedResults'][0]['ErrorMessage'] == "") {

                foreach($response['ParsedResults'] as $pareValue) {
                    return $pareValue['ParsedText'];
                }
            } else {

                return ["error" => 400, "message" => $response['ParsedResults']['ErrorMessage']];

            }
        } catch(Exception $err) {
            return ["error" => 403, "message" => $err->getMessage()];
        }
    }

    public function getPdfData($input)
    {


        $client = new \GuzzleHttp\Client();

        $fileData = fopen($input, 'r');
        try {
            $r = $client->request('POST', $this->OCR_URL,[
                'headers' => ['apiKey' =>config('app.ocr_key')],
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => $fileData
                    ],
                    [
                        'name' => 'OCREngine',
                        'contents' => 2
                    ],
                    [
                        'name' => "detectOrientation",
                        "contents" => "true"
                    ],
                    [
                        'name' => 'scale',
                        'contents' => 'true'
                    ]
                ]
            ], ['file' => $fileData]);


            $response =  json_decode($r->getBody(),true);

            if($response['ParsedResults'][0]['ErrorMessage'] == "") {

                foreach($response['ParsedResults'] as $pareValue) {
                    return $pareValue['ParsedText'];
                }
            } else {

                return ["error" => 400, "message" => $response['ParsedResults']['ErrorMessage']];
//                header('HTTP/1.0 400 Forbidden');
//                dd($response['ParsedResults']['ErrorMessage']);
            }
        } catch(Exception $err) {
            return ["error" => 403, "message" => $err->getMessage()];
//            header('HTTP/1.0 403 Forbidden');
//            return $err->getMessage();
        }
    }

    //$text is String Driver License text from OCR
    //get datas from text and return result
    // $result is Array with ["dob", "address", "city", "state", "zip", "sex"]
    public function dirverLicenseProcessing($text)
    {
        $result = [];
        // remove draft file
        $addressCityStateRegex = "/.+?(AL|AK|AS|AZ|AR|CA|CO|CT|DE|DC|FM|FL|GA|GU|HI|ID|IL|IN|IA|KS|KY|LA|ME|MH|MD|MA|MI|MN|MS|MO|
        MT|NE|NV|NH|NJ|NM|NY|NC|ND|MP|OH|OK|OR|PW|PA|PR|RI|SC|SD|TN|TX|UT|VT|VI|VA|WA|WV|WI|WY)+\s+\b[0-9]{5}/";
//        $addressStreetRegex = "/[0-9]{1,}.+?[A-Z]{2,}+[-A-Z0-9 ,#'\/.\\r]{3,50}$/im";
        $addressStreetRegex = "/^[0-9]{1,}+[-A-Z0-9 ,#\s]{3,} *$|^[a-z]{1}\s+[0-9]{1,}+[-A-Z0-9 ,#\s]{3,} *$/im";

//        preg_match("/(^[0-9]{1,}+[0-9a-zA-Z\s,.%;:]+([0-9]{4,5}+(-+[0-9]{4}|)))/im", $text, $address);

        preg_match("/(dob|bos|pos|cow|von|noe|BOB|2OB|boa)+(| )([0-9]{2}\/[0-9]{2}\/[0-9]{4})|(dob|bos|pos|cow|von|noe|BOB|2OB)+(| )(([0-9]{2}\-[0-9]{2}\-[0-9]{4}))/im", $text, $dob);
        preg_match("/(sex|sec|sex.)+(| |i)(m|f)/im", $text, $sex);
        preg_match($addressStreetRegex, $text, $addressStreet);
        preg_match("$addressCityStateRegex", $text, $addressCityState);
        preg_match_all("/([0-9]{2}\/[0-9]{2}\/[0-9]{4})|(([0-9]{2}\-[0-9]{2}\-[0-9]{4}))/im", $text, $expiration);

        if(isset($expiration[0])){
            $expirationDate = null;
            $newDob =  null;
            $toDay =strtotime(date("d/m/y")) ;
            foreach($expiration[0] as $ex){
                list($month, $day, $year) = explode('/', str_replace(['/','-'],'/',$ex));
                $a =  mktime(0, 0, 0, $month, $day, $year);
                $expirationDate = $a > strtotime($expirationDate) ? $ex : $expirationDate;
                if($toDay > $a){
                    $toDay = $a;
                    $newDob = $ex;
                };

            }
            $result["expiration"] = $expirationDate;
            $result['dob'] = $newDob;


        }

        if (isset($dob[3])) {
            $result['dob'] =  $dob[3];
        }
        if (isset($sex[3])) {
            $result['sex'] =  $sex[3];
        }
        if (isset($addressCityState[0])){
            preg_match_all('/[A-Z]{2}/m', $addressCityState[0], $match);

            $result["state"] = $match[0][count($match[0])-1];
            $zip = explode($result['state'], $addressCityState[0]);
            $result["zip"] = $zip[count($zip)-1];
            $result ["city"] = str_replace([', ', ' , '], '', $zip[0]);
        }

        if (isset($addressStreet[0])) {
//            $city = isset($result["city"]) ?$result["city"]:"";
//            $state = isset($result["state"])?$result["state"]:"";
            $state = isset($addressCityState[0])?strtoupper($addressCityState[0]):"";
            $addressAll = strtoupper(str_replace("\r", "", $addressStreet[0])).', '. $state;

            if(strpos($addressStreet[0], "\n")){
                $addressArr = explode("\n", $addressAll);
                $address = $addressArr[0];
            }else{
                $address = $addressAll;
            }
            $result["address"] = $address.', '. $state;
            preg_match("/([0-9]{1,})/im", $address, $number);
            $result ["number"] = $number[0];
            $result['name'] = trim(strtoupper(str_replace($number[0],'',$address)));
        }
        
        return $result;
    }

    //$text is String Social Security text from OCR
    //get datas from text and return result
    // $result is Array with ["ssn", "first_name", "last_name"]
    public function socialSecurityProccessing($text)
    {
        $result = [];
//        preg_match("/[0-9]{3}.+([0-9]{2}|[0-9]{2}.)+[0-9]{4}/im", $text, $ssn);
        preg_match("/^[0-9]{2,}+[-0-9a-z \s]{3,9}$|^[A-Z]{1}+[0-9]{2,4}+[-0-9a-z \s]{3,9}$/im", $text, $ssn);
        preg_match("/OR\n|NUM.*\n+([A-Z]{1,}\s.*)/m", $text, $name);
//        preg_match("/^[A-Z\\n]{2,}+[-A-Z\s\,\\n]{2,}$/m", $text, $name);
//        preg_match("/FOR\n+([A-Z]{1,}\s([A-Z]{1,}|.|)+(\s[A-Z]{1,}|\r\[A-Z]{1,}|))/m", $text, $name);


        if (isset($ssn[0])) {
            $result['ssn'] =$res = preg_replace("/[^0-9.]/", "", $ssn[0]);
        }
        if (isset($name[1])) {

            $full_name = count(explode(' ', str_replace("\n"," ",$name[1])))<2
                ?explode("\n", str_replace("\n"," ",$name[1]))
                :explode(' ', str_replace("\n"," ",$name[1]));
            $result['first_name'] = strtoupper($full_name[0]);
            $result['last_name'] = count($full_name) > 2 ? strtoupper($full_name[2]) : strtoupper($full_name[1]);
        }

        return $result;
    }

    //resize image for ocr
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
