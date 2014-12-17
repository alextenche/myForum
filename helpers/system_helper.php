<?php

// redirect to page
function redirect($page = FALSE, $message = NULL, $message_type = "NULL"){
	if(is_string($page)){
	$location = $page;
	} else {
		$location = $_SERVER ['SCRIPT_NAME'];
	}
	
	// check for message
	if($message != NULL){
		// set message
		$_SESSION['message'] = $message;
	}
	
	// check for type
	if($message_type != NULL){
		// set message
		$_SESSION['message_type'] = $message_type;
	}
	
	// redirect
	header('Location: '. $location);
	exit;	
}


// display message
function displayMessage(){
	if(!empty($_SESSION['message'])){
	
		// assign message var
		$message = $_SESSION['message'];
		
		if(!empty($_SESSION['message_type'])){
			// assign type var
			$message_type = $_SESSION['message_type'];
			// create output
			if($message_type == 'error'){
				echo '<div class="alert alert-danger">' . $message . '</div>';
			} else {
				echo '<div class="alert alert-success">' . $message . '</div>';
			}
		}
		// unset message
		unset($_SESSION['message']);
		unset($_SESSION['message_type']);
	} else {
		echo ' ';
	}
}