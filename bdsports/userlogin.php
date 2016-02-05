<?php

session_start();
if (isset($_POST['mail']) && isset($_POST['passwordd'])) {
    $umail = $_POST['mail'];
    $password = md5($_POST['passwordd']);
    if (!empty($password) && !empty($umail)) {
        /* ............input query.............. */
        require_once('connection.php');
        $Query = "Select `user_name`,`user_mail`,`user_password` 
            from `user` where `user_mail`='$umail' and `user_password`='$password'";
        $result = mysql_query($Query);
        if (extract($result)) {
            while ($username = mysql_fetch_array($result)) {
            
            $username1 = $username['user_name'];
        };
        }
        else {
            header('Location:registration.php');
            
        }
        /* ..............get username from database............. */
        
        if ($result) {
            if (mysql_num_rows($result) == 1) {
                $_SESSION['user'] = $username1;
                $_SESSION['user_email']=$umail;
                header('Location:user/index.php');
            }
        } 
    }
}
?>
