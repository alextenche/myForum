<?php require('core/init.php');

// create topic object
$topic = new Topic;

if(isset($_POST['do_create'])){

	// create validator object
	$validate = new Validator;
	
	// create data array
	$data = array();
	$data['title'] = $_POST['title'];
	$data['body'] = $_POST['body'];
	$data['category_id'] = $_POST['category'];
	$data['user_id'] = getUser()['user_id'];
	$data['last_activity'] = date('Y-m-d H:i:s');
	
	// required fields
	$field_array=  array('title', 'body','category');
	
	if($validate->isRequired($field_array)){
		// register user
		if($topic->create($data)){
			redirect('index.php', 'Your topic has been posted', 'success');
		} else {
			redirect('topic.php?id='.$topic->id, 'Something went wrong with your topic creation', 'error');
		}
	} else {
		redirect('create.php', 'Please fill in all required fields', 'error');
	}
}



//get template & assign vars
$template = new Template('templates/create.php');

//display template
echo $template;