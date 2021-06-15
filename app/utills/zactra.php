<?php

namespace App\utills;
use Illuminate\Http\Request;
use DB;
use Route;
use Auth;
use App\AbendentCart;
use App\AdminSetting;


/**
 * manage functions added by zactra
 */
class zactra
{




static function is_url($string){

  if (filter_var($string, FILTER_VALIDATE_URL)) {
    return true;
  }else{
    return false;
  }
}


/**
 * cart summary
 */

static function cartSummary(){
   $subtotal = 0;
   $delivery = 0;
   $total = 0;
   $counter = 0;
   $discount = 0;

   if (session('zactra_cart')) {
     foreach (session('zactra_cart') as $key => $value){
       $subtotal+= $value['quantity']  * $value['price'];
     }
   }

   if(session('coupon')){
     $array = session()->get('coupon');
     $amount = $array['amount'];
     $type = $array['type'];
     $discount=$amount;
     if($type=="percentage"){
       $amount = $amount/100;
       $discount = $amount*$subtotal;
     }
   }


    $delivery=  $subtotal* 0.15;
    $total =  ($subtotal+ $delivery) - $discount;

   return array(
     'subtotal'=>zactra::decimal($subtotal,2),
     'delivery'=>zactra::decimal($delivery,2),
     'discount'=>zactra::decimal($discount,2),
     'total'=>zactra::decimal($total,2),
     'counter'=>$counter
   );

 }

/**
 * get translation of label
 */
public static function translate($key,$givenLang=null){
  if (!empty($givenLang)){

    if ($givenLang =="ar") {
      $trans = \App\Translation::where('translate_key',$key)->select("arabic AS val")->first();
    }else{
      $trans = \App\Translation::where('translate_key',$key)->select("english AS val")->first();
    }


  }else{
    $defaultlan = AdminSetting::where('id','1')->first();

    if (!isset($_COOKIE['zactra_lang_cookie'])) {
        setcookie("zactra_lang_cookie", $defaultlan->language, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
  if(@isset($_COOKIE['zactra_lang_cookie'])){
    $lang = $_COOKIE['zactra_lang_cookie'];
    if ($lang =="ar") {
      $trans = \App\Translation::where('translate_key',$key)->select("arabic AS val")->first();
    }else{
      $trans = \App\Translation::where('translate_key',$key)->select("english AS val")->first();
    }

  }

  }


  if(isset($trans->val)){
    return $trans->val;
  }else{
    return $key;
  }

}


  /*

  ** Get User IP ADdress
  */

  static function getIP(){
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
         $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
      else
          $ipaddress = 'UNKNOWN';
      return $ipaddress;
  }




  /**
   * convert size from byter
   */
  static function formatBytes($size, $precision = 2)
 {
     $base = log($size, 1024);
     $suffixes = array('', 'K', 'M', 'G', 'T');

     return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
 }



    /*

    ** Get Limited Characters
    */
    static function limit_words($x, $length)
    {
      if(strlen($x)<=$length)
      {
        return $x;
      }
      else
      {
        $y=substr($x,0,$length) . '...';
        return $y;
      }
    }


    /*

    ** Get Limited Characters
    */
    static function limit_word($x, $length)
    {
      if(strlen($x)<=$length)
      {
        return $x;
      }
      else
      {
        $y=substr($x,0,$length);
        return $y;
      }
    }








    /*


    ** get Status Tag
    */

    function getStatusTags($status){
    if ($status=="Active") {
      return "<span style='color:green'>Active</span>";
    }
    else if ($status=="Published") {
      return "<span style='color:green'>Active</span>";
    }
    else if($status=="Finished"){
      return "<span style='color:red'>Finished</span>";
    }
    else   return "<span style='color:grey'>".$status."</span>";

    }



    /*

    ** Covert Date
    */

  static function convertDay($day){
       $old_date_timestamp = strtotime($day);
       return  $new_date = date('M d, Y', $old_date_timestamp);

    }


    static function convertMonth($day){
         $old_date_timestamp = strtotime($day);
         return  $new_date = date('M', $old_date_timestamp);

      }
    static function convertTime($day){
         $old_date_timestamp = strtotime($day);
         return  $new_date = date('h : i : A', $old_date_timestamp);

      }


    static function BlogDay($day){
         $old_date_timestamp = strtotime($day);
         return  $new_date = date('Y-m-d', $old_date_timestamp);

      }






    static function getDeliveryTimerTime($time){
      return $time_in_24_hour_format  = date("M d, Y h:i:s", strtotime($time));
    }

    static function convertfullDay($mydate){
      return date('l', strtotime($mydate));
    }


    /**
     * return atuogenerated Token token
     */
    static  function getToken($length){
           $token = "";
           $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
           $codeAlphabet.= "0123456789";
           $max = strlen($codeAlphabet); // edited

          for ($i=0; $i < $length; $i++) {
              $token .= $codeAlphabet[rand(0, $max-1)];
          }

          return $token;
      }



      /*

      ** Convert HTML to text
      */

      static function ConverttoText($text){
        // to strip all tags and wrap italics with underscore
      strip_tags(str_replace(array("<i>", "</i>"), array("_", "_"), $text));

      // to preserve anchors...
      return str_replace("|a", "<a", strip_tags(str_replace("<a", "|a", $text)));
      }



      static function host_url($url) {

          $parse = parse_url($url);
          return $parse['host'];

        // $result = parse_url($url);
        // return $result['PHP_URL_HOST'];
      }


      /**
       * site information
       */

       static function site($var){
         $site = \App\AdminSetting::select($var)->first();
         return $site->$var;
       }

/**
 * return ipInformation
 */
 static function getIpInfo(){
   $ipaddress=zactra::getIP();

    // for local host
   if ($ipaddress=="::1") {
     $ipaddress="72.229.28.185";
   }



   $ch = curl_init("http://api.ipstack.com/".$ipaddress."?access_key=15597d705d0a5069e11819519e1bf278"); // such as http://example.com/example.xml
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HEADER, 0);
   $json = curl_exec($ch);
   curl_close($ch);
   return $response = json_decode($json);
  }



 static function resize_image($file, $w, $h, $crop=false) {
     list($width, $height) = getimagesize($file);
     $r = $width / $height;
     if ($crop) {
         if ($width > $height) {
             $width = ceil($width-($width*abs($r-$w/$h)));
         } else {
             $height = ceil($height-($height*abs($r-$w/$h)));
         }
         $newwidth = $w;
         $newheight = $h;
     } else {
         if ($w/$h > $r) {
             $newwidth = $h*$r;
             $newheight = $h;
         } else {
             $newheight = $w/$r;
             $newwidth = $w;
         }
     }

     //Get file extension
     $exploding = explode(".",$file);
     $ext = end($exploding);

     switch($ext){
         case "png":
             $src = imagecreatefrompng($file);
         break;
         case "jpeg":
         case "jpg":
             $src = imagecreatefromjpeg($file);
         break;
         case "gif":
             $src = imagecreatefromgif($file);
         break;
         default:
             $src = imagecreatefromjpeg($file);
         break;
     }

     $dst = imagecreatetruecolor($newwidth, $newheight);
     imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
     return $dst;
 }


 /**
  * manage size for images
  */

  static function getRecucedSize($image,$w=193.33,$h=220){
  return asset($image);
    // getimagesize

    if ($image!=""){
      if (!file_exists(base_path('public/zactra/'.$image.".png"))){
        $imgData = zactra::resize_image(asset($image), $w, $h);
        $resizedFilename=base_path('public/zactra/'.$image.".png");
        imagepng($imgData, $resizedFilename);
      }
        return asset('zactra/'.$image.".png");
    }
  }


  /**
   * show two decimal places
   */
   static function decimal($number,$places=2){
     return number_format((float)$number, $places, '.', '');
   }


   /**
    * get rating percentage
    */
    static function getRatingPercentage($rate){
      $rating = ($rate / 5 )*100;
      return number_format((float)$rating, 2, '.', '');
    }

    /**
     * active a route
     */
     static function areActiveRoute(Array $routes, $output = "active")
    {


        foreach ($routes as $route){
            if (Route::currentRouteName() == $route) return $output;
        }

    }



    /**
     * fetch colors from products
     */

     static function getFilters($products,$max=0,$sizes=array(),$colors=array(),$categories=array()){

       $filters = array();
        $max = 0;
        $subcategories = array();
        $imprintingMethods = array();
        $production_time = array();
        $themes = array();
        $line_names = array();
        $materials = array();
        $TradeNames = array();





        /**
         * store category
         */
        foreach($products as $key => $value){

          /**
           * fetch categories
           */

          if (!(in_array($value->category_id,$categories))){
            $categories[] = $value->category_id;
          }


          /**
           * fetch sub categories
           */
          if (!(in_array($value->subcategory_id,$subcategories))){
            $subcategories[] = $value->subcategory_id;
          }



          /**
           * fetch Imprinting Methods
           */

           // foreach (explode(',',$value->Imprinting) as $imp) {
           //   if (!(in_array($imp,$imprintingMethods))){
           //     $imprintingMethods[] = $imp;
           //   }
           // }




           /**
            * fetch Production Times
            */

            // foreach (explode(',',$value->ProductionTime) as $imp){
            //   if (!(in_array($imp,$production_time))){
            //     $production_time[] = $imp;
            //   }
            // }




            /**
             * fetch Themes
             */

             // foreach(explode(',',$value->product_themes) as $imp){
             //   if (!(in_array($imp,$themes))){
             //     $themes[] = $imp;
             //   }
             // }



             /**
              * fetch Materials
              */

              // foreach(explode(',',$value->line_names) as $imp){
              //   if (!(in_array($imp,$line_names))){
              //     $line_names[] = $imp;
              //   }
              // }


              /**
               * fetch trade names
               */

               foreach(explode(',',$value->TradeNames) as $imp){
                 if (!(in_array($imp,$TradeNames))){
                   $TradeNames[] = $imp;
                 }
               }


              /**
               * fetch Materials
               */

               // foreach(explode(',',$value->materials) as $imp){
               //   if (!(in_array($imp,$materials))){
               //     $materials[] = $imp;
               //   }
               // }






        }



        /**
         * get max range value
         */
        foreach($products as $key => $value){
          if($value->current_price>$max){
            $max = $value->current_price;
          }


          /**
           * manage sizes
           */
          // foreach (explode(',',$value->product_sizes) as $size){
          //   if (!(in_array($size,$sizes))){
          //     $sizes[] = $size;
          //   }
          // }

          /**
           * manage colors
           */
          foreach (explode(',',$value->product_colors) as $color){

            if (!(in_array($color,$colors))){
              $colors[] = $color;
            }
          }

        }




      return  array(
          'subcategories'=>$subcategories,
          'categories'=> $categories,
          'colors'=> $colors,
          'sizes'=>$sizes,
          'max'=>$max,
          'imprinting'=>$imprintingMethods,
          'production_time'=>$production_time,
          'themes'=>$themes,
          'line_names'=>$line_names,
          'TradeNames'=>$TradeNames,
          'materials'=>$materials,
        );
     }

     /**
      * get average ratings
      */
      static function getAverageRatings($rating){
        return ($rating/5 *100);
      }


      /**
       * get shipping information
       */
       static function shipping_cost($amount=0){


         if (Auth::check()){
           return zactra::getShipping(Auth::user()->country,Auth::user()->state,$amount);
         }else{
           if(session('cart_shipping_amount')){
             return session()->get('cart_shipping_amount');
           }else{
             $info = zactra::getIpInfo();
             $country = $info->country_code;
             $state = $info->region_code;
            return  zactra::getShipping($country,$state,$amount);
           }
         }

       }


       /**
        * get shipping
        */

        static function getShipping($country,$state,$amount){

            $amount = intval($amount);
            $shipping = \App\ShippingCost::where('country_id',$country)->where('order_to','>=',$amount)->where('state','LIKE','%'.$state.'%')->get()->first();
            if($country!="US"){
               $shipping = \App\ShippingCost::where('country_id',$country)->where('order_to','>=',$amount)->get()->first();
            }
            if (!isset($shipping->shipping_cost)){
              $shipping = \App\ShippingCost::where('country_id',$country)->where('order_to','>=',$amount)->where('state','LIKE','%'.$state.'%')->get();
              $shipping = $shipping->first();
            }

            $shippingCost = isset($shipping->shipping_cost) ? $shipping->shipping_cost : 0.00 ;
            session()->put('cart_shipping_amount',$shippingCost);

            return $shippingCost;
        }





        /**
         * get shipping information
         */
         static function tax_cost($totalAmount){

            if (Auth::check()){
              return zactra::getTax($totalAmount,Auth::user()->country,Auth::user()->state);
            }
            else{
              if(session('cart_tax_amount')){
                return session()->get('cart_tax_amount');
              }else{
                $info = zactra::getIpInfo();
                $country = $info->country_code;
                $state = $info->region_code;
               return  zactra::getTax($totalAmount,$country,$state);
              }

            }
         }


         /**
          * get tax
          */

          static function getTax($totalAmount,$country,$state){
              $tax = \App\Tax::where('country_id',$country)->where("order_to",">=",intval($totalAmount))->where('state','LIKE','%'.$state.'%')->get()->first();
              $taxCost = isset($tax->tax_cost) ? ( ($totalAmount * ($tax->tax_cost/100))) : 0.00 ;
              session()->put('cart_tax_amount',$taxCost);


              return $taxCost;
          }

       /**
        * get image image
        */
        static function getMetaImage($image){
          $image = str_replace('?size=large','?size=small',$image);
          $image = str_replace('?http://','?https://',$image);
          return $image;
        }

        static function clearautoCompleteString($str){
          $str = str_replace('"','',$str);
          $str = str_replace('/','',$str);
          $str = str_replace("'",'',$str);


          return $str;
        }





        /**
         * get product Quantities
         */
         static function get_product_quantities($quantity_costs){

           $min_qty = 0;
           $max_qty = 1;
           $qty_array = array();
           $prices_array = array();


           if($quantity_costs!=""){
             $qty_price = json_decode($quantity_costs);

             try {
               foreach($qty_price as $key => $value){

                /**
                  * store all quantities
                  */
                $qty_array[] = $key;
                $prices_array[$key] = $value;


                // get minimum qty
                if($key<$min_qty OR $min_qty==0){
                   $min_qty = $key;
                }

                // get maximum qty
                if($key>$max_qty){
                   $max_qty = $key;
                }
               }
             } catch (\Exception $e) {
               // echo $e->getMessage();
             }

           }else{
             $min_qty = 1;
           }



           return array(
             'min_qty'=>$min_qty,
             'max_qty'=>$max_qty,
             'min_price'=>isset($prices_array[$min_qty]) ? zactra::decimal($prices_array[$min_qty],2) : 0.00,
             'max_price'=>isset($prices_array[$max_qty]) ? zactra::decimal($prices_array[$max_qty],2) : 0.00,
           );
         }

         /**
          * get category product count
          */

          static function getcategoryProductCount($store,$cat){
            return count(
              \App\Product::Where('store_id',$store)->where('category_id',$cat)->where('status',"1")->get()
            );
          }


          /**
           * sendmail
           */

          static function sendmail($to,$subject,$message){

          // Always set content-type when sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

          // More headers
          $headers .= 'From: <support@digitizedlogos.com>' . "\r\n";
          $headers .= 'Cc: admin2@digitizedlogos.com' . "\r\n";

          $mail = mail($to,$subject,$message,$headers);
          if (!$mail){
            return false;
          }
          else return true;
           }

           static function removeSupplierInfos($text){
              $response = str_replace('(','',$text);
              $response = str_replace(')','',$response);
              $response = str_replace('[','',$response);
              $response = str_replace(']','',$response);
              $response = str_replace('=>',':',$response);
              $response = str_replace('Array','',$response);

             return $response;
           }




           /**
            * manage abendent cart
            */

           public static function cart(){


                   // check if user is logged in
                   if(Auth::check()){

                     // check if session of cart exists
                           if(session('cart')){

                             $saveAbendentCart = array();
                             $saveAbendentCart['user_id'] = Auth::user()->id;
                              $saveAbendentCart['cart'] = json_encode(session()->get('cart'));
                              if(isset(Auth::user()->cart->cart)){
                                    AbendentCart::where('user_id',Auth::user()->id)->update([
                                        'cart'=>json_encode(session()->get('cart'))
                                      ]);
                              }else{
                                  AbendentCart::insert($saveAbendentCart);
                              }
                          }

                           if(isset(Auth::user()->cart->cart)){
                             if (!empty(Auth::user()->cart->cart)) {
                               $mycart = json_decode(Auth::user()->cart->cart);
                               $mycart = zactra::CartobjToArray($mycart);
                               session()->put('cart',$mycart);
                             }

                           }


                   }
           }

           /**
            * update cart
            */
          static function update_cart($arr){
              if(Auth::check()){
                if (isset(Auth::user()->cart->cart)) {
                  AbendentCart::where('user_id',Auth::user()->id)->update([
                    'cart'=>json_encode($arr),
                    'counter'=>0,
                    'updated_at'=>date("Y-m-d H:i:s")
                  ]);
                }else{
                  AbendentCart::create([
                    'user_id'=>Auth::user()->id,
                    'cart'=>json_encode($arr),
                    'updated_at'=>date("Y-m-d H:i:s")
                  ]);
                }
              }
            }



           // convert cart object to array
          static function CartobjToArray($obj){
              $arr = array();

                      foreach ($obj as $key => $value)
                      {
                          $subArray = array();


                        foreach ((array) $value as $key1){

                          //
                          // $arr =
                          $final =  (array) $key1;
                            $subArray[] = $final;
                        }

                        $arr [$key] = $subArray;
                      }
                      return $arr;
                  }

                  /**
                   * get product price difference
                   */

                   static function productPriceSave($value,$cost){
                     $value =  zactra::decimal($value,2);
                     $cost =  zactra::decimal($cost,2);

                     $difference =  $cost -  $value;

                     $amount  = ( $difference/$cost  ) * 100;
                     $amount =  zactra::decimal($amount,2);
                     if ($amount>0){
                       return $amount."%";
                     }else{
                       return "---";
                     }
                   }



                   /**
                    * get imprint Min & Max price
                    */

                  static function getImprintMinMaxPrice($range){
                      $min_price = 10000000000000000000;
                      $min_qty = 10000000000000000000;
                      $max_price = 0;
                      $max_qty = 1;


                      // check for quantities
                      foreach(json_decode($range)[0] as $key => $value) {


                        // get minimum quantity
                        if ($min_qty>$value){
                          $min_qty = $value;
                        }


                        // get maximum quantity
                        if ($value>$min_qty){
                          $max_qty = $value;
                        }

                      }



                      // check for Prices
                      foreach(json_decode($range)[1] as $key => $value) {


                        $myMin = 1000000000000000000000000;
                        $myMax = 0;
                        foreach ($value as $prc){

                          if ($myMin>$prc){
                              $myMin = $prc;
                          }

                          if ($prc>$myMax){
                              $myMax = $prc;
                          }

                        }


                        // get minimum quantity
                        if ($min_price>$myMin){
                          $min_price = $myMin;
                        }



                        // get maximum quantity
                        if ($myMax>$max_price){
                          $max_price = $myMax;
                        }
                      }


                      return array(
                        'min_qty'=>$min_qty,
                        'max_qty'=>$max_qty,
                        'min_price'=>$max_price,
                        'max_price'=>$min_price,
                      );
                    }


                    /**
                     * menu average index for a menu
                     */

                    static function geAverageIndexforMenu($menu){
                       $i = 0;
                       foreach ($menu as $key => $value){
                         $i++;

                         foreach ($value->child($value->menu_id) as $key1 => $value1) {
                           $i++;
                         }
                       }


                       return intval($i/4);

                     }



                     /**
                      * check if product has customize options
                      */

                      static function checkforProductCustomizeOptions($product){

                        if ( !empty($product->imprint_color) OR  !empty($product->imprint_location)) {
                          return true;
                        }else
                        {
                          return false;
                        }
                      }

                      /**
                       * arrange faqs for shop page
                       */
                      static function arrangeFAQS($data){
                        $faqs = str_replace('Q:','<br><br><b>Q: ',$data);
                        $faqs = str_replace('?','?</b><br/>',$faqs);
                        return $faqs;
                      }
}
