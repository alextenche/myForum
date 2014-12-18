<?php include('core/init.php');

if(isset($_POST['do_logout'])){
	
	// create user object
	$user = new User;
	
	if($user->logout()){
		redirect('index.php', 'You are now logged out', 'success');
	}
} else {
	redirect('index.php');
}

