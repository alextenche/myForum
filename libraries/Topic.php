<?php
class Topic{
	
	// init database variable
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
	
	
	// get total number of topics
	public function getTotalTopics(){  
		$this->db->query('SELECT * FROM topics');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
	
	
	// get total number of categories
	public function getTotalCategories(){  
		$this->db->query('SELECT * FROM categories');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
	
	
	// get total number of replies
	public function getTotalReplies($topic_id){ 
		$this->db->query('SELECT * FROM replies WHERE topic_id=' . $topic_id);
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}

}