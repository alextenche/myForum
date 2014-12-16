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
	
	
	// get topics by category
	public function getByCategory($category_id){
		echo 'intra si in asta';
		$this->db->query("SELECT topics.*, categories.*, users.username, users.avatar, categories.name FROM topics 
									INNER JOIN users ON topics.user_id = users.id
									INNER JOIN categories ON topics.category_id = categories.id
									WHERE topics.category_id = :category_id");
		$this->db->bind(':category_id', $category_id);
		
		// assign result set
		$results = $this->db->resultset();
		
		return $results;
	}
	
	
	// get category by id
	public function getCategory($category_id){
		$this->db->query("SELECT * FROM categories WHERE id = :category_id");
		$this->db->bind(':category_id', $category_id);
		
		// assign row
		$row = $this->db->single();
		
		return $row;
	}
	
	
	// get total number of replies
	public function getTotalReplies($topic_id){ 
		$this->db->query('SELECT * FROM replies WHERE topic_id=' . $topic_id);
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
	
	
	public function getTopic($id){
		$this->db->query("SELECT topics.*, users.username, users.name, users.avatar FROM topics
									INNER JOIN users ON topics.user_id = users.id
									WHERE topics.id = :id");
		$this->db->bind(':id', $id);
		// assign row
		$row = $this->db->single();
		
		return $row;
	}
	
	
	public function getReplies($topic_id){
		$this->db->query("SELECT replies.*, users.* FROM replies
									INNER JOIN users ON replies.user_id = users.id
									WHERE replies.topic_id = :id
									ORDER BY create_date ASC");
		$this->db->bind(':topic_id', $topic_id);
		// assign row
		$row = $this->db->single();
		
		return $row;
	}
	
	
	
	

}