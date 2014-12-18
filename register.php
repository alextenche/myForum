<?php require('core/init.php');

// create topic object
$topic = new Topic;

// create user object
$user = new User;

// create a validate object
$validate = new Validator;

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
	
	// required fields
	$field_array = array('name', 'email', 'username', 'password', 'password2');	
	
	if($validate->isRequired($field_array)){
		if($validate->isValidEmail($data['email'])){
			if($validate->passwordsMatch($data['password'], $data['password2'])){
			
				// upload avatar image
				if($user->uploadAvatar()){
					$data['avatar'] = $_FILES["avatar"]["name"];
				} else {
					$data['avatar'] = 'noimage.png';
				}
				
				// register user
				if($user->register($data)){
					redirect('index.php', 'You are registered and can now log in', 'succress');
				} else {
					redirect('index.php', 'Something went worong with the registration', 'error');
				}
			
			} else {
				redirect('register.php', 'Your passwords did not match', 'error');
			}
		} else {
			redirect('register.php', 'Please use a valid email address', 'error');
		}
	} else {
		redirect('register.php', 'Please fill in all required fields', 'error');
	}
	
}

//get template & assign vars
$template = new Template('templates/register.php');

//display template
echo $template;