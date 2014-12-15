<?php

// get number of replies per topic
function replyCount($topic_id){  
	$db = new Database;
	
	$db->query("SELECT * FROM replies WHERE topic_id = :topic_id");
	$db->bind(":topic_id", $topic_id);
	
	$rows = $db->resultset();  //assign rows
	return $db->rowCount();  //get count
}


// get all the categories
function getCategories(){
	$db = new Database;
	$db->query('SELECT * FROM categories ');
	
	$results = $db->resultset();
	return $results;
}