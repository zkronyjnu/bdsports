<?php
$leaguename = "SELECT `league_name` FROM `match_info` WHERE `match_id` ='$result_array[0]';";
    $result2 = mysql_query($leaguename) or die(mysql_error());
    while ($row = mysql_fetch_array($result2)) {
        
        $leaguename = $row[0];
    }
    $hometeam = "SELECT `team_name`, `team_id` FROM `userlive_match` WHERE `match_id` = '$result_array[0]'
ORDER BY `team_name` ASC
LIMIT 1;";
    $result3 = mysql_query($hometeam) or die(mysql_error());
    while ($row = mysql_fetch_array($result3)) {
        extract($row);
        $hometeamname = $team_name;
        $hometeamid = $team_id;
        //echo $hometeamid;
    }

    $awayteam = "SELECT `team_name`,`team_id` FROM `userlive_match` WHERE `match_id` = '$result_array[0]'
ORDER BY `team_name` DESC
LIMIT 1;";
    $result4 = mysql_query($awayteam) or die(mysql_error());
    while ($row = mysql_fetch_array($result4)) {
        extract($row);
        $awayteamname = $team_name;
        $awayteamid = $team_id;
       // echo $awayteamid;
        
    }
    $teamgoal1 = "SELECT COUNT( goal_id )
FROM `goal_info`
WHERE `team_id` = '$hometeamid'";
    $result5 = mysql_query($teamgoal1);
    while ($row1 = mysql_fetch_array($result5)) {
        $hometeamgoal = $row1[0];
    }
    $teamgoal2 = "SELECT COUNT( goal_id )
FROM `goal_info`
WHERE `team_id` = '$awayteamid'";
    $result6 = mysql_query($teamgoal2);
    while ($row1 = mysql_fetch_array($result6)) {
        $awayteamgoal = $row1[0];
    }
  
?>
<tr bgcolor="#7bb573">
                    <td colspan="4" height="4">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" height="1">
                    </td>
                </tr>
                <tr bgcolor="#7bb573">

                    <td class="title" colspan="4" height="26">&nbsp;<?php echo $leaguename; ?> 
                    </td>
                </tr>
                <tr bgcolor="#e8f5b9">

                    <td class="match-light"id="counter" width="45" height="18">&nbsp;10:32</td>
                    <td class="match-light" align="right" width="423" colspan="3">April 18&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="4" height="1">

                    </td>
                </tr>
                <tr bgcolor="#cfcfcf">
                    <td width="45" height="18"></td>
                    <td align="right" width="186"><a href="http://localhost/tutslogin/php/detailslive.php"><?php echo $hometeamname;?></a></td>
                    <td align="center" width="51"><a href="http://localhost/tutslogin/php/detailslive.php"><?php 
                    echo $hometeamgoal." - ". $awayteamgoal ;
                    ?></a></td>
                    <td width="186"><a href="http://localhost/tutslogin/php/detailslive.php"><?php echo $awayteamname; ?></a></td>
                
                </tr>
                <tr>
                    <td colspan="4" height="1"></td>
                </tr>
               
