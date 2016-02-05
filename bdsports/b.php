<?php
include'connection.php';
$name=$_POST['name'];
$rank=$_POST['rank'];
$date=$_POST['year'].$_POST['month'].$_POST['day'];
$email = $_POST['email'];
//echo $date;
//echo '<br>';
//$time = strtotime( $date );
//$myDate = date( 'Y-m-d', $time );
//echo $myDate;
//echo $name.$rank.$date.$email;
if (!empty($name)&&!empty($rank)&&!empty($date)&&!empty($email)){	
	$sql="INSERT INTO `player_info`(`player_name`, `player_rank`, `player_birthday`, `player_email`) VALUES ('$name','$rank','$date','$email');";
//$insert = 'INSERT INTO user(username,fname,lname,email,password) //VALUES("'.$username1.'","'.$fname.'","'.$lname.'","'.$email.'","'.$password1.'")';
}
if (!mysql_query($sql))
		 {
		 	die('Error: ' . mysql_error());
		 }


?>
