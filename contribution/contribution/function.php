<?php
/**
 * Created by PhpStorm.
 * User: Nitin Pandey
 * Date: 6/20/2020
 * Time: 2:17 PM
 */
// session_start();
error_reporting(0);
class EncryptDecrypt
{

    function encrypt($str,$privateValue,$privateKey) {

        $iv = $privateValue;
        $key = $privateKey;
        $s = $this->pkcs5_pad($str);
        $td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv);
        mcrypt_generic_init($td, $key, $iv);
        $encrypted = mcrypt_generic($td, $s);
        $encrypted1=base64_encode($encrypted);
        return (trim($encrypted1));

    }

    function decrypt($code,$privateValue,$privateKey) {
        $iv = $privateValue;
        $key = $privateKey;
        $an=base64_decode($code);
        $iv = $this->$iv;
        $td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv);
        mcrypt_generic_init($td, $key, $iv);
        $decrypted = mdecrypt_generic($td, $an);
        return (trim($decrypted));
    }
    protected function pkcs5_pad ($text) {
        $blocksize = 16;
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }
}

//$privateKey = 'bMRvXJYsXfHmPGrp';
//$privateValue = 'qnRbCH997o9vJwfM';
//$mcode = 'THE265';
//$uname = 'MINFOS265';
//$pws = '[C@49b3e4ed';


$privateKey = 'cFH7I1BzpMt7xEyj';
$privateValue = 'nAZ1PPsp3S7izhaI';
$mcode = 'THE265';
$uname = 'MINFOS155';
$pws = '[C@13118f69';


function numberTowords($num)
{
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = $num;
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'ONE', '2' => 'TWO',
    '3' => 'THREE', '4' => 'FOUR', '5' => 'FIVE', '6' => 'SIX',
    '7' => 'SEVEN', '8' => 'EIGHT', '9' => 'NINE',
    '10' => 'TEN', '11' => 'ELEVEN', '12' => 'TWELE',
    '13' => 'THIRTEEN', '14' => 'FOURTEEN',
    '15' => 'FIFTEEN', '16' => 'SIXTEEN', '17' => 'SEVENTEEN',
    '18' => 'EIGHTEEN', '19' =>'NINETEEN', '20' => 'TWENTY',
    '30' => 'THIRTY', '40' => 'FOURTY', '50' => 'FIFTY',
    '60' => 'SIXTY', '70' => 'SEVENTY',
    '80' => 'EIGHTY', '90' => 'NINETY');
   $digits = array('', 'HUNDRED', 'THOUSAND', 'LAKH', 'CRORE');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' AND ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  return $result ;
  

}
// function numberTowords($num)
// {

    // $ones = array(
        // 0 =>"ZERO",
        // 1 => "ONE",
        // 2 => "TWO",
        // 3 => "THREE",
        // 4 => "FOUR",
        // 5 => "FIVE",
        // 6 => "SIX",
        // 7 => "SEVEN",
        // 8 => "EIGHT",
        // 9 => "NINE",
        // 10 => "TEN",
        // 11 => "ELEVEN",
        // 12 => "TWELVE",
        // 13 => "THIRTEEN",
        // 14 => "FOURTEEN",
        // 15 => "FIFTEEN",
        // 16 => "SIXTEEN",
        // 17 => "SEVENTEEN",
        // 18 => "EIGHTEEN",
        // 19 => "NINETEEN",
        // "014" => "FOURTEEN"
    // );
    // $tens = array(
        // 0 => "ZERO",
        // 1 => "TEN",
        // 2 => "TWENTY",
        // 3 => "THIRTY",
        // 4 => "FORTY",
        // 5 => "FIFTY",
        // 6 => "SIXTY",
        // 7 => "SEVENTY",
        // 8 => "EIGHTY",
        // 9 => "NINETY"
    // );
    // $hundreds = array(
        // "HUNDRED",
        // "THOUSAND",
        // "MILLION",
        // "BILLION",
        // "TRILLION",
        // "QUARDRILLION"
    // ); /*limit t quadrillion */
    // $num = number_format($num,2,".",",");
    // $num_arr = explode(".",$num);
    // $wholenum = $num_arr[0];
    // $decnum = $num_arr[1];
    // $whole_arr = array_reverse(explode(",",$wholenum));
    // krsort($whole_arr,1);
    // $rettxt = "";
    // foreach($whole_arr as $key => $i){

        // while(substr($i,0,1)=="0")
            // $i=substr($i,1,5);
        // if($i < 20){
            // /* echo "getting:".$i; */
            // $rettxt .= $ones[$i];
        // }elseif($i < 100){
            // if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)];
            // if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)];
        // }else{
            // if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
            // if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)];
            // if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)];
        // }
        // if($key > 0){
            // $rettxt .= " ".$hundreds[$key]." ";
        // }
    // }
    // if($decnum > 0){
        // $rettxt .= " and ";
        // if($decnum < 20){
            // $rettxt .= $ones[$decnum];
        // }elseif($decnum < 100){
            // $rettxt .= $tens[substr($decnum,0,1)];
            // $rettxt .= " ".$ones[substr($decnum,1,1)];
        // }
    // }
    // return $rettxt;
// }