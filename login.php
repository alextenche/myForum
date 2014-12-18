<?php include('core/init.php');

if(isset($_POST['do_login'])){
	// get vars
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	// create user object
	$user = new User;
	
	if($user->login($username, $password)){
		redirect('index.php', 'You have been login', 'success');
	} else {
		redirect('index.php', 'That login is not valid', 'error');
		
	}
} else {
	redirect('index.php');
}

