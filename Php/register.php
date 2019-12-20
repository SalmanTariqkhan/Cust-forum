<?php require('core/init.php');?>
<?php
//Create Topic Object
$topic =new Topic;
//Create User object
$user = new User;
//Create validate Object
$validate =new Validator;
if(isset($_POST['register'])){
	//create Data Array
	$data=array();
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['username'] = $_POST['username'];
	$data['password'] = md5($_POST['password']);
	$data['password2'] = md5($_POST['password2']);
	$data['about'] = $_POST['about'];
	$data['last_activity'] = date("Y-m-d H:i:s");
	//Required Fields
	$field_array =array('name','email','username','password','password2');
	if($validate->isRequired($field_array)){
		if($validate->isValidEmail($data['email'])){
			if($validate->passwordsMatch($data['password'],$data['password2'])){
				//Upload Avatar Image
				$image = $user->uploadAvatar();
	          if($image[0]){
		        $data['avatar'] = $image[1];
	             }else{
		         $data['avatar'] = 'noimage.png';
	                   }
					//Register User
	              if($user->register($data)){
	                	redirect('index.php','You are registered and can now log in','Success');
	               }else{
		                redirect('index.php','Something went wrong with registration','Success');
	                 }
			}else{
				redirect('register.php','Your passwords did not match','error');
			}
		}else{
			redirect('register.php','please use a valid address','error');
		}
	}else{
		redirect('register.php','please fill all the "Require fields"','error');
	}
}
//Get Template & Assign Vars
$template=new Template('templates/register.php');
//Display template
echo $template;
?>