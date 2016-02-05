<?php

include_once '../connection.php';
//-----Function for Insert Team--------//
@session_start();
if (isset($_SESSION['user_email'])
        &&isset($_POST['teamname'])
        && isset($_POST['teamcountry'])
        && isset($_POST['teamcoach'])) {
    $Teamname = $_POST['teamname'];
    $Teamcountry = $_POST['teamcountry'];
    $Teamcoach = $_POST['teamcoach'];
    if (!empty($Teamname) && !empty($Teamcountry) && !empty($Teamcoach)) {
        $sql = "INSERT INTO `team_info`(`team_id`, `team_name`, `team_country`, `team_coach`)
            VALUES ('','$Teamname','$Teamcountry','$Teamcoach');";
//$insert = 'INSERT INTO user(username,fname,lname,email,password) //VALUES("'.$username1.'","'.$fname.'","'.$lname.'","'.$email.'","'.$password1.'")';
    }
    mysql_query($sql) or die(mysql_error());
    $team_id = mysql_insert_id();
    
    $UserEmail = $_SESSION['user_email'];
    $Query = "INSERT INTO `userteam`(`user_mail`, `team_id`) 
        VALUES ('$UserEmail',$team_id);";
    mysql_query($Query) or dir(mysql_error());
    $QueryClear = "delete from `userteam` where `userteam`.`team_id` not in (select `team_id` from `team_info`);";
    mysql_query($QueryClear) or die(mysql_error());
}

//-------Function for insertplayer--------//
if (isset($_POST['playername'])
        && isset($_POST['playerage'])
        && isset($_POST['playerjersey'])) {
    $Playername = $_POST['playername'];
    $Playerage = $_POST['playerage'];
    $Playerjersey = $_POST['playerjersey'];
    if (!empty($Playername) && !empty($Playerage) && !empty($Playerjersey)) {
        $sql = "INSERT INTO `player_info`(`player_id`, `player_name`, `player_age`, `player_jersey`) VALUES ('','$Playername','$Playerage','$Playerjersey');";
//$insert = 'INSERT INTO user(username,fname,lname,email,password) //VALUES("'.$username1.'","'.$fname.'","'.$lname.'","'.$email.'","'.$password1.'")';
    }
    mysql_query($sql) or die(mysql_error());
    $team_id = mysql_insert_id();
    @session_start();

    $Query = "INSERT INTO `playerteam`(`team_id`, `player_id`) 
        VALUES ('$UserEmail',$team_id)";
    mysql_query($Query) or dir(mysql_error());
    $QueryClear = "delete from `team_info` where `team_info`.`team_id` not in (select `team_id` from `userteam`);";
    mysql_query($QueryClear) or die(mysql_error());
}

//function for matchinsert=============

if (isset($_SESSION['user_email'])
        &&isset($_POST['leaguename'])
        && isset($_POST['matchvenue'])) {
    $leaguename = $_POST['leaguename'];
    $matchvenue = $_POST['matchvenue'];
    
    if (!empty($leaguename) 
            && !empty($matchvenue)) {


        $Query = "INSERT INTO `match_info`(`match_id`, `league_name`, `match_venue`, `match_result`)
            VALUES ('','$leaguename','$matchvenue','0-0');";
        mysql_query($Query) or die(mysql_error());
    }
    $match_id = mysql_insert_id();
    @session_start();
    $UserEmail = $_SESSION['user_email'];
     
    $Query = "INSERT INTO `usermatch`(`user_mail`, `match_id`) 
        VALUES ('$UserEmail','$match_id');";
    mysql_query($Query) or dir(mysql_error());
    $QueryClear = "delete from `match_info` where `match_info`.`match_id` not in (select `match_id` from `usermatch`);";
    mysql_query($QueryClear) or die(mysql_error());
    header('Location:http://localhost/bdsports/user/insertmatch.php');
}


?>