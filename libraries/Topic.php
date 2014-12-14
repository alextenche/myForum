<?php
class Topic{
	
	//init DB variable
	private $db;
	
	
	public function __construct(){
		$this->db = new Database;
	}
	
	
	public function getAllTopics(){
		$this->db->query("SELECT topics.*, users.username, users.avatar, categories.name FROM topics
			INNER JOIN users ON topics.user_id = users.id
			INNER JOIN categories ON topics.category_id = categories.id
			ORDER BY create_date DESC");
		//assign result set
		$result = $this->db->resultset();
		
		return $result;
	}
	
	
	public function getTotalTopics(){  //get total number of topics
		$this->db->query('SELECT * FROM topics');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
	
	
	public function getTotalCategories(){  //get total number of categories
		$this->db->query('SELECT * FROM categories');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
	
	public function getTotalReplies($topic_id){  //get total number of replies
		$this->db->query('SELECT * FROM replies WHERE topic_id=' . $topic_id);
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}

}
?>