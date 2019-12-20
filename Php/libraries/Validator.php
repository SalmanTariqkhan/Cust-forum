<?php 
class Validator{
	/*
	 * Check Requred Fields
	 */
	 public function isRequired($field_array){
		 foreach($field_array as $field)
		 {
			 if($_POST[''.$field.'']==''){
				 return false;
			 }
		 }
		 return true;
	 }
	 /*
	  * Validate Email field
	  */
	  public function isValidEmail($email){
		  if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			  return true;
		  }else{
			  return false;
		  }
	  }
	  
	  /*
	   *Check Password Match
	   */
	   public function PasswordsMatch($pw1,$pw2){
		 if($pw1==$pw2){
			 return true;
		 }
		 else{
			 return false;
		 }
			 }
}
?>