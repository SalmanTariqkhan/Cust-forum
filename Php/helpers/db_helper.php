<?php 
/*
 *
 */
 function replyCount($topic_id){
	 $db=new Database;
	 $db->query('SELECT * From replies where topic_id=:topic_id');
	 $db->bind(':topic_id',$topic_id);
	 //Assign Rows
	 $rows =$db->resultset();
	 //Get Count
	 return $db->rowCount();
 }
 /*
  *Get Categories
  */
 function getCategories(){
	 $db=new Database;
	 $db->query("SELECT * from categories");
	 
	 //Assign Result set
	 $results=$db->resultset();
	 return $results;
 }
 /*
  * User Posts
  */
  function userPostCount($user_id){
	  $db= new Database;
	  $db->query('SELECT* from topics where user_id= :user_id');
	  $db->bind(':user_id',$user_id);
	  //Assign Rows
	  $rows=$db->resultset();
	  //Get Count
	  $topic_count=$db->rowCount();
	  
	  $db->query('SELECT * FROM replies Where user_id=:user_id');
	  
	  $db->bind(':user_id',$user_id);
	  //Assign Rows
	  $rows=$db->resultset();
	  //Get Count
	  $reply_count=$db->rowCount();
	  return $topic_count + $reply_count;
  }
  
?>