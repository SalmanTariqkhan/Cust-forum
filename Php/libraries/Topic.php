<?php 
class Topic{
	//init DB variable
	private $db;
	
	/*
	 * Constructor
	 */
	 public function __construct(){
		 $this->db=new Database;
	 }
	 
	 /*
	 * Get All Topics
	 */
	 public function getAllTopics(){
		 $this->db->query("SELECT topics.*, users.avatar,users.username, categories.name From topics
		                    INNER JOIN users
							On topics.user_id=users.id
							INNER JOIN categories
							ON topics.category_id= categories.id
							Order by create_date Desc");
							
		  //Assign Result Set
		  $result=$this->db->resultset();
		  return $result;
	 }
	 
    /*
	 * Get By Categories
	 */
	 public function getByCategory($category_id){
		 $this->db->query("SELECT topics.*, users.avatar,users.username, categories.* From topics
		                    INNER JOIN categories
							On topics.category_id=categories.id
							INNER JOIN users
							ON topics.user_id= users.id
							where topics.category_id=:category_id");
							
		 $this->db->bind(':category_id',$category_id);
							
		  //Assign Result Set
		  $result=$this->db->resultset();
		  return $result;
	 }
	 
	 /*
	 * Get Topics By Username
	 */
	 public function getByUser($user_id){
		 $this->db->query("SELECT topics.*, users.avatar,users.username, categories.name , categories.description From topics
		                    INNER JOIN categories
							On topics.category_id=categories.id
							INNER JOIN users
							ON topics.user_id= users.id
							where topics.user_id=:user_id");
							
		 $this->db->bind(':user_id',$user_id);
							
		  //Assign Result Set
		  $result=$this->db->resultset();
		  return $result;
	 }
	 
	 /*
	  *GET Total # of Topics
	  */
	 public function getTotalTopics(){
		 $this->db->query('SELECT * FROM topics');
		 $rows = $this->db->resultset();
		 return $this->db->rowCount();
	 }
	  /*
	  *GET Total # of Categories
	  */
	 public function getTotalCategories(){
		 $this->db->query('SELECT * FROM categories');
		 $rows = $this->db->resultset();
		 return $this->db->rowCount();
	 }
	  /*
	  *GET Total # of Replies
	  */
	 public function getTotalReplies($topic_id){
		 $this->db->query('SELECT * FROM replies where topic_id='.$topic_id);
		 $rows = $this->db->resultset();
		 return $this->db->rowCount();
	 }
	 
	  /*
	  *GET Category By ID
	  */
	 public function getCategory($category_id){
		 $this->db->query('SELECT * FROM categories where id=:category_id');
		 $this->db->bind(':category_id',$category_id);
		 
		 //Assign Row
		 $rows = $this->db->single();
		 
		 return $rows;
	 }
	 
	 /*
	  *GET Topic By ID
	  */
	 public function getTopic($id){
		 $this->db->query('SELECT topics.*, users.username, users.name, users.avatar FROM topics
                            INNER JOIN users
                            ON topics.user_id=users.id 
							where topics.id=:id');
		 $this->db->bind(':id',$id);
		 
		 //Assign Row
		 $rows = $this->db->single();
		 
		 return $rows;
	 }
	 
	  /*
	  *GET Topic Replies
	  */
	 public function getReplies($topic_id){
		 $this->db->query('SELECT replies.*, users.* FROM replies
                            INNER JOIN users
                            ON replies.user_id=users.id							
							where replies.topic_id=:topic_id
							Order by create_date ASC');
		 $this->db->bind(':topic_id',$topic_id);
		 
		 //Assign Row
		 $results = $this->db->resultset();
		 
		 return $results;
	 }
	 
	 /*
	  * Create Topic
	  */
	  
	  public function create($data){
		  //Insert Query
		  $this->db->query("Insert Into topics (category_id,user_id,title,body,last_activity) values (:category_id,:user_id,:title,:body,:last_activity)");
		  
		  //Bind values
		  $this->db->bind(':category_id',$data['category_id']);
		  $this->db->bind(':user_id',$data['user_id']);
		  $this->db->bind(':title',$data['title']);
		  $this->db->bind(':body',$data['body']);
		  $this->db->bind(':last_activity',$data['last_activity']);
		  
		  //Execute
		  if($this->db->execute()){
			  return true;
		  }else{
			  return false;
		  }
	  }
	  
	  /*
	   * Add Reply
	   */
	   public function reply($data){
		   //Insert Query
		   $this->db->query('Insert Into replies (topic_id,user_id,body) values (:topic_id,:user_id,:body)');
		   
		   //Bind Values
		   $this->db->bind(':topic_id',$data['topic_id']);
		   $this->db->bind('user_id',$data['user_id']);
		   $this->db->bind(':body',$data['body']);
		   
		  //Execute
		  if($this->db->execute()){
			  return true;
		  }else{
			  return false;
		  }
	   }
	
}
?>