<?php require('core/init.php');

// create topic object
$topic = new Topic;

// get id from url
$topic_id = $_GET['id'];

// process rely
if(isset($_POST['do_reply'])){
	// create data array
	$data = array();
	$data['topic_id'] = $_GET['id'];
	$data['body'] = $_POST['body'];
	$data['user_id'] = getUser()['user_id'];
	
	// create validator object
	$validate = new Validator;
	
	// required fields
	$field_array = array('body');
	
	if($validate->isRequired($field_array)){
		// register user
		if($topic->reply($data)){
			redirect('topic.php?id='.$topic_id, 'Your reply has been posted', 'success');
		} else {
			redirect('topic.php?id='.$topic_id, 'Something went wron with your reply', 'error');
		}	
	} else {
		redirect('topic.php?id='.$topic_id, 'Your reply form is blank !', 'error');
	}
}



// get template & assign vars
$template = new Template('templates/topic.php');

// assign vars
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;

// display template
echo $template;