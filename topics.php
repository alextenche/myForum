<?php require('core/init.php');

$topic = new Topic;

// get category from url
$category = isset($_GET['category'])  ?  $_GET['category']  :  null;

//get template & assign vars
$template = new Template('templates/topics.php');

// assign template variables
if(isset($category)){
	echo "yeeeeeeeee";
	$template->topics = $topic->getByCategory($category);
	$template->title = 'Posts in "' . $topic->getCategory($category)->name.'"';
}

if(!isset($category)){
	$template->topics = $topic->getAllTopics();
}

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

//display template
echo $template;