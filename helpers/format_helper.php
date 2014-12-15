<?php

// format the date
function formatDate($date){
	$date = date("F j, Y, g:i a", strtotime($date));
	return $date;
}


// preparing url
function urlFormat($str){
	$str = preg_replace('/\s*/', '', $str);  // strip out all whitespace
	$str = strtolower($str);  // convert the string to all lowercase
	$str = urlencode($str);  // url encode
	return $str;
}


// add classname active if category is active
function is_active($category){
	if(isset($_GET['category'])){
		if($_GET['category'] == $category){
			return 'active';
		} else {
			return '';
		}
	} else {
		if($category == null){
			return 'active';
		}
	}

}