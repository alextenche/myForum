<?php require('core/init.php');

// create topic object
$topic =  new Topic;

// get template & assign vars
$template = new Template('templates/frontpage.php');

// assign vars
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

// display template
echo $template;