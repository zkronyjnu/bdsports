<?php
@session_start();
if (!isset($_SESSION['user'])) {
    header('Location:../index.php');
    die();
}
//echo 'In admin Panel';
?>
<?php
if (isset($_SESSION['user_email'])) {
    $UserEmail = $_SESSION['user_email'];
    include '../connection.php';
    $query1 = "SELECT  `match_id` FROM  `userlive_match` 
                                  WHERE  `user_mail` =  '$UserEmail'
                                   ORDER BY  `match_id` DESC LIMIT 8";
    $result = mysql_query($query1) or die(mysql_error());
    
    $result_array = array();
                while($row = mysql_fetch_assoc($result)){
                    $result_array[] = $row['match_id'];
                }
                if (!empty($result_array[0])) {
                    $matchid = $result_array[0];
                    $_SESSION['matchid'] = $matchid;
                    include 'usermatch2.php';
                }
                if(!empty($result_array[2])){
                    $matchid = $result_array[2];
                    $_SESSION['matchid'] = $matchid;
                    include 'usermatch2.php';//match page....
                }
                if(!empty($result_array[4])){
                    $matchid = $result_array[4];
                    $_SESSION['matchid'] = $matchid;
                    include 'usermatch2.php';
                }
                if(!empty($result_array[6])){
                    $matchid = $result_array[6];
                    $_SESSION['matchid'] = $matchid;
                    include 'usermatch2.php';
                }

                
                                }