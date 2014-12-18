<?php require('core/init.php');

// create topic object
$topic =  new Topic;

// create user object
$user = new User;

// get template & assign vars
$template = new Template('templates/frontpage.php');

// assign vars
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();

// display template
echo $template;