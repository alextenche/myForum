<?php

function formatDate($date){
	$date = date("F j, Y, g:i a", strtotime($date));
	return $date;
}

function urlFormat($str){
	$str = preg_replace('/\s*/', '', $str);  //strip out all whitespace
	$str = strtolower($str);  //convert the string to all lowercase
	$str = urlencode($str);  //url encode
	return $str;
}
?>