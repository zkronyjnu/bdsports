<?php

@session_start();
if (isset($_SESSION['user_email'])
        && isset($_SESSION['match_id'])) {
    $matchid = $_SESSION['match_id'];
    include '../connection.php';
    $query1 = "SELECT `team_id` , `team_name` , `player_id` , `player_name`
FROM `match_player` WHERE `match_id` = '$matchid' LIMIT 0 , 30;";
    $result = mysql_query($query1) or die(mysql_error());

    
    if (isset($_POST['playerid'])) {
        
        $playerid = $_POST['player_id'];

        if (!empty($matchid) && !empty($playerid)) {
            $query2 = "INSERT INTO `goal`(`match_id`, `player_id`) VALUES ('$matchid','$playerid');";
            $result1 = mysql_query($query2) or die(mysql_error());
            if ($result1) {
                echo 'ONE GOAL ADDED';
                
            }
            
        }
    }
}
else    mysql_error();
?>