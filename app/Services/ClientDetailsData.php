<?php

namespace App\Services;

class ClientDetailsData
{
    private $OCR_URL = "https://api.ocr.space/parse/image";

    public function getImageData($input)
    {
        $client = new \GuzzleHttp\Client();

        $fileData = fopen($input, 'r');
        try {
            $r = $client->request('POST', $this->OCR_URL,[
                'headers' => ['apiKey' => env("OCR_API_KEY")],
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
        //Todo: Add driver license regex
        $result = [];

        // remove draft file
        preg_match("/(dob|bos|pos|cow|von|noe|BOB)+(| )([0-9]{2}\/[0-9]{2}\/[0-9]{4})/im", $text, $dob);
        preg_match("/(sex|sec|sex.)+(| |i)(m|f)/im", $text, $sex);
        preg_match("/(^[0-9]{1,}+[0-9a-zA-Z\s,.%;:]+([0-9]{4,5}+(-+[0-9]{4}|)))/im", $text, $address);


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
            // Get City and Address
            preg_match_all('/[^\n]+/m', $address[0], $match);
            $result['city'] = !empty($match[0][1]) ? str_replace([$result["state"], $result["zip"]], '' , $match[0][1] ): null;
            $result['address'] = !empty($match[0][0]) ? $match[0][0] : $address[0];
        }
        return $result;
    }

    //$text is String Social Security text from OCR
    //get datas from text and return result
    // $result is Array with ["ssn", "first_name", "last_name"]
    public function socialSecurityProccessing($text)
    {
        //Todo: Add social security regex

        $result = [];
        preg_match("/[0-9]{3}.([0-9]{2}).[0-9]{4}/im", $text, $ssn);
        preg_match("/(FOR\n)+([A-Z]{1,}\s([A-Z]{1,}|.|)+(\s[A-Z]{1,}|\r\[A-Z]{1,}|))/m", $text, $name);

        if (isset($ssn[0])) {
            $result['ssn'] = $ssn[0];
        }
        if (isset($name[0])) {

            $full_name = explode(' ', str_replace("FOR\n","",$name[0]));
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
