<?php require('core/init.php');?>
<?php
//Create Topic Object 
$topic=new Topic;
//Create User object
$user= new User;
//GET Category From URL
$category =isset($_GET['category']) ? $_GET['category'] : null;
//GET user From URL
$user_id =isset($_GET['user']) ? $_GET['user'] : null;
//Get Template & Assign Vars
$template=new Template('templates/topics.php');
//Assign Template Variables
if(isset($category)){
	$template->topics=$topic->getByCategory($category);
	$template->title='Posts In"'.$topic->getCategory($category)->name.'"';
}
//Check for user filter
if(isset($user_id)){
	$template->topics=$topic->getByUser($user_id);
	//$template->title='Posts In"'.$user->getUser($user_id)->username.'"'
}
//Check if not set filter
if(!isset($category)&& !isset($user_id)){
	$template->topics=$topic->getAllTopics();
}
//Assign Vars 
$template->totalTopics=$topic->getTotalTopics();
$template->totalCategories=$topic->getTotalCategories();
$template->totalUsers=$user->getTotalUsers();
//Display template
echo $template;
?>
