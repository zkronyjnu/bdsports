<?php
require_once'connection.php';
$username1 = @$_POST['username'];
$email = @$_POST['email'];
$password1 = md5(@$_POST['password']);
$password2 = md5(@$_POST['passwordconfirm']);
echo $password1. " " .$password2;
if($password1==$password2){
	if(!empty($username1)&&!empty($email)&&!empty($password1)){
		$insert = 'INSERT INTO user(user_name,user_mail,user_password) VALUES("'.$username1.'","'.$email.'","'.$password1.'")';
	if(mysql_query($insert)){
            header('Location:registration.php');
	}else{
		echo mysql_error();
		}
	}else{
		echo "Password did not matched";
		}
}
/*if ($password1==$password2){
	
if (!empty($username1)&&!empty($email)&&!empty($password1)){

}
else {echo "please fillup aquretly";}
}
else {echo "Password did not matched";}
*/	
?>