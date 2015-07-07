<?php
function is_utf8($liehuo_net){ 
	if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$liehuo_net) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$liehuo_net) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$liehuo_net) == true) 
	{ return true; } 
	else { return false; } 
}

function utf8StrCount($str){
	preg_match_all('/./us',$str,$desczf);//描述字符数量	
	return count($desczf[0]);
}
function curl_file_get_contents($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);
	curl_setopt($ch, CURLOPT_REFERER,_REFERER_);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	curl_close($ch);		
	Return $data;
}

function get_keywords($keywords){
	$keywords=str_replace("-",",",$keywords);
	$keywords=str_replace("，",",",$keywords);
	//$keywords=str_replace(" ",",",$keywords);
	$keywords=str_replace("|",",",$keywords);
	$keywords=str_replace("、",",",$keywords);
	$keywords=str_replace(",,",",",$keywords);
	$keywords=str_replace("<","",$keywords);
	$keywords=str_replace(">","",$keywords);
	return explode(",",trim($keywords));
}
function getfirstchar($s0){   
	$fchar = ord($s0{0});
	if($fchar >= ord("A") and $fchar <= ord("z") )return strtoupper($s0{0});
	$s1 = iconv("UTF-8","gb2312", $s0);
	$s2 = iconv("gb2312","UTF-8", $s1);
	if($s2 == $s0){$s = $s1;}else{$s = $s0;}
	$asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
	if($asc >= -20319 and $asc <= -20284) return "a";
	if($asc >= -20283 and $asc <= -19776) return "b";
	if($asc >= -19775 and $asc <= -19219) return "c";
	if($asc >= -19218 and $asc <= -18711) return "d";
	if($asc >= -18710 and $asc <= -18527) return "e";
	if($asc >= -18526 and $asc <= -18240) return "f";
	if($asc >= -18239 and $asc <= -17923) return "g";
	if($asc >= -17922 and $asc <= -17418) return "h";
	if($asc >= -17417 and $asc <= -16475) return "j";
	if($asc >= -16474 and $asc <= -16213) return "k";
	if($asc >= -16212 and $asc <= -15641) return "l";
	if($asc >= -15640 and $asc <= -15166) return "m";
	if($asc >= -15165 and $asc <= -14923) return "n";
	if($asc >= -14922 and $asc <= -14915) return "o";
	if($asc >= -14914 and $asc <= -14631) return "p";
	if($asc >= -14630 and $asc <= -14150) return "q";
	if($asc >= -14149 and $asc <= -14091) return "r";
	if($asc >= -14090 and $asc <= -13319) return "s";
	if($asc >= -13318 and $asc <= -12839) return "t";
	if($asc >= -12838 and $asc <= -12557) return "w";
	if($asc >= -12556 and $asc <= -11848) return "x";
	if($asc >= -11847 and $asc <= -11056) return "y";
	if($asc >= -11055 and $asc <= -10247) return "z";
	return null;
}


function pinyin($zh){
	$ret = "";
    $s1 = iconv("UTF-8","gb2312", $zh);
    $s2 = iconv("gb2312","UTF-8", $s1);
    if($s2 == $zh){$zh = $s1;}
	for($i = 0; $i < strlen($zh); $i++){
		$s1 = substr($zh,$i,1);
		$p = ord($s1);
		if($p > 160){
			$s2 = substr($zh,$i++,2);
			$ret .= getfirstchar($s2);
		}else{
			$ret .= $s1;
		}
	}
	return $ret;
}
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=false){
 if(function_exists("mb_substr")){
  if($suffix)
   return mb_substr($str, $start, $length, $charset)."...";
  else
   return mb_substr($str, $start, $length, $charset);
 }elseif(function_exists('iconv_substr')) {
  if($suffix)
   return iconv_substr($str,$start,$length,$charset)."...";
  else
   return iconv_substr($str,$start,$length,$charset);
 }
 $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
 $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
 $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
 $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
 preg_match_all($re[$charset], $str, $match);
 $slice = join("",array_slice($match[0], $start, $length));
 if($suffix) return $slice."…";
 return $slice;
}

function deldir($dir)
{
   $dh = opendir($dir);
   while ($file = readdir($dh))
   {
      if ($file != "." && $file != "..")
      {
         $fullpath = $dir . "/" . $file;
         if (!is_dir($fullpath))
         {
            unlink($fullpath);
         } else
         {
            deldir($fullpath);
         }
      }
   }
   closedir($dh);
   if (rmdir($dir))
   {
      return true;
   } else
   {
      return false;
   }
}




?>