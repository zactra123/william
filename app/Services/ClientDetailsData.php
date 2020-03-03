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

        if($driverLicenseSize > 1073741824){

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

        if($socialSecuritySize > 1073741824){
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
//                header('HTTP/1.0 400 Forbidden');
//                dd($response['ParsedResults']['ErrorMessage']);
            }
        } catch(Exception $err) {
            return ["error" => 403, "message" => $err->getMessage()];
//            header('HTTP/1.0 403 Forbidden');
//            return $err->getMessage();
        }
    }

    public function getPdfData($input)
    {


        $client = new \GuzzleHttp\Client();

        $fileData = fopen($input, 'r');
        try {
            $r = $client->request('POST', $this->OCR_URL,[
                'headers' => ['apiKey' => '0c6334d53188957'],
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => $fileData
                    ],
                    [
                        'name' => 'OCREngine',
                        'contents' => 1
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
        preg_match("/(dob|bos|pos|cow|von|noe|BOB|2OB)+(| )([0-9]{2}\/[0-9]{2}\/[0-9]{4})|(dob|bos|pos|cow|von|noe|BOB|2OB)+(| )(([0-9]{2}\-[0-9]{2}\-[0-9]{4}))/im", $text, $dob);
        preg_match("/(sex|sec|sex.)+(| |i)(m|f)/im", $text, $sex);
        preg_match("/(^[0-9]{1,}+[0-9a-zA-Z\s,.%;:]+([0-9]{4,5}+(-+[0-9]{4}|)))/im", $text, $address);

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

            $result["new_dob"] = $newDob;

        }

        if (isset($dob[3])) {
            $result['dob'] =  $dob[3];
        }
        if (isset($sex[3])) {
            $result['sex'] =  $sex[3];
        }
        if (isset($address[0])) {
            // Get state
            preg_match_all('/[A-Z]{2}/m', $address[0], $match);

            $result["state"] = $match[0][count($match[0])-1];
            // Get zip code
            $zip = explode($result['state'], $address[0]);
            $result["zip"] = $zip[count($zip)-1];
            $result["address"] = str_replace([ $result["zip"], $result["state"], "\n", ','],'', $address[0]);


            //old code
//            // Get City and Address
//            preg_match_all('/[^\n]+/m', $address[0], $match);
//            $result['city'] = !empty($match[0][1]) ? str_replace([$result["state"], $result["zip"]], '' , $match[0][1] ): null;
//            $result['address'] = !empty($match[0][0]) ? $match[0][0] : $address[0];
        }
        return $result;
    }

    //$text is String Social Security text from OCR
    //get datas from text and return result
    // $result is Array with ["ssn", "first_name", "last_name"]
    public function socialSecurityProccessing($text)
    {
        $result = [];
        preg_match("/[0-9]{3}.+([0-9]{2}|[0-9]{2}.)+[0-9]{4}/im", $text, $ssn);
        preg_match("/FOR\n+([A-Z]{1,}\s.*)/m", $text, $name);
//        preg_match("/FOR\n+([A-Z]{1,}\s([A-Z]{1,}|.|)+(\s[A-Z]{1,}|\r\[A-Z]{1,}|))/m", $text, $name);

        if (isset($ssn[0])) {
            $result['ssn'] = $ssn[0];
        }
        if (isset($name[1])) {

            $full_name = count(explode(' ', str_replace("FOR\n","",$name[0])))<2
                ?explode("\n", str_replace("FOR\n","",$name[0]))
                :explode(' ', str_replace("FOR\n","",$name[0]));

            $result['first_name'] = $full_name[0];
            $result['last_name'] = count($full_name) > 2 ? $full_name[2] : $full_name[1];
        }

        return $result;
    }


    //resize image for ocr
    public function  resizeImage($path, $name)
    {
        if (!is_dir(public_path() . '/' . $path . '/draft')) {
            mkdir(public_path() . '/' . $path . '/draft', 0777);
        }

        //path for resize image
        $draft_path = public_path() . '/' . $path . '/draft/' . $name;

        //resize image width and height
        $height = \Image::make(public_path() . '/' . $path . '/' . $name)->height();
        $width = \Image::make(public_path() . '/' . $path . '/' . $name)->width();
        $img = \Image::make(public_path() . '/' . $path . '/' . $name);

        // resize image to fixed size
        $img->resize($width / 2, $height / 2);

        $img->save($draft_path);

        if (\Image::make($draft_path)->filesize() < 1073741824) {
            return $draft_path;
        } else {
            return null;
        }
    }

}
