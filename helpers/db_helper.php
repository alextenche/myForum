<?php
function replyCount($topic_id){  //get number of replies per topic
	$db = new Database;
	$db->query("SELECT * FROM replies WHERE topic_id = :topic_id");
	$db->bind(":topic_id", $topic_id);
	
	$rows = $db->resultset();  //assign rows
	
	return $db->rowCount();  //get count
}
?>