<?php
namespace app\helpers;

class Helper
{
    public static function terbilang($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = self::terbilang($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = self::terbilang($nilai/10)." puluh". self::terbilang($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . self::terbilang($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = self::terbilang($nilai/100) . " ratus" . self::terbilang($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . self::terbilang($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = self::terbilang($nilai/1000) . " ribu" . self::terbilang($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = self::terbilang($nilai/1000000) . " juta" . self::terbilang($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = self::terbilang($nilai/1000000000) . " milyar" . self::terbilang(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = self::terbilang($nilai/1000000000000) . " trilyun" . self::terbilang(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
  
  

 public static function my_array_unique($array, $field)
{
    $duplicate_keys = array();
    $tmp         = array();       
   $keep_key_assoc=false;

    foreach ($array as $key=>$val)
    {
        // convert objects to arrays, in_array() does not support objects
        if (is_object($val))
            $val = (array)$val[$field];

        if (!in_array($val, $tmp))
            $tmp[] = $val;
        else
            $duplicate_keys[] = $key;
    }

    return count($duplicate_keys)==0;
}
 
	
 
}

