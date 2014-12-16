<?php require('core/init.php');

// create topic object
$topic = new Topic;

// create user object
$user = new User;

if(isset($_POST['register'])){
	// create data array
	$data = array();
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['username'] = $_POST['username'];
	$data['password'] = md5($_POST['password']);
	$data['password2'] = md5($_POST['password2']);
	$data['about'] = $_POST['about'];
	$data['last_activity'] = date("Y-m-d H:i:s");
	
	// upload avatar image
	if($user->uploadAvatar()){
		$data['avatar'] = $_FILES["avatar"]["name"];
	} else {
		$data['avatar'] = 'noimage.png';
	}
}

//get template & assign vars
$template = new Template('templates/register.php');

//display template
echo $template;