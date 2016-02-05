<?php
$leaguename = "SELECT `league_name` FROM `match_info` WHERE `match_id` ='$matchid';";
$result2 = mysql_query($leaguename) or die(mysql_error());
while ($row = mysql_fetch_array($result2)) {

    $leaguename = $row[0];
}
$hometeam = "SELECT `team_name`, `team_id` FROM `userlive_match` WHERE `match_id` = '$matchid'
ORDER BY `team_name` ASC
LIMIT 1;";
$result3 = mysql_query($hometeam) or die(mysql_error());
while ($row = mysql_fetch_array($result3)) {
    extract($row);
    $hometeamname = $team_name;
    $hometeamid = $team_id;
    //echo $hometeamid;
}

$awayteam = "SELECT `team_name`,`team_id` FROM `userlive_match` WHERE `match_id` = '$matchid'
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
WHERE `team_id` = '$hometeamid' and `match_id`='$matchid'";
$result5 = mysql_query($teamgoal1);
while ($row1 = mysql_fetch_array($result5)) {
    $hometeamgoal = $row1[0];
}
$teamgoal2 = "SELECT COUNT( goal_id )
FROM `goal_info`
WHERE `team_id` = '$awayteamid' and `match_id`='$matchid'";
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
<?php
include_once '../connection.php';
$Query = "SELECT `starttime` FROM `match` WHERE `match_id`='$matchid';";
$Result = mysql_query($Query) or die(mysql_error());
$row = mysql_fetch_assoc($Result);
$StartTime = $row['starttime'];
$PlayingMin = ceil((time() - $StartTime) / 60);
$PlayingSec = (time() - $StartTime) % 60
?>

    <td class="match-light"id="counter" width="45" height="18">
        <?php
        if ($PlayingMin == 45 || ($PlayingMin >= 46 && $PlayingMin <= 55)) {
            echo "Half Time";
        } else if ($PlayingMin > 55 && $PlayingMin < 100) {
            $PlayingMin-=10;
            echo "$PlayingMin:$PlayingSec";
        } else if (($PlayingMin) >= 100) {

            echo "Finished";
        } else {
            echo "$PlayingMin:$PlayingSec";
        }
        ?>
    </td>
    <td align="center" width="51"><<?php echo "a href='http://localhost/bdsports/live/insertgoal.php?match_id=$matchid'"; ?>><Button>Update</button></a></td>
    <td class="match-light" align="right" width="423" colspan="3">
        <?php
        error_reporting(E_PARSE);
        echo date("D:M:Y", $StartTime);?>
    </td>
</tr>
<tr>
    
</tr>
<tr bgcolor="#cfcfcf">
    <td width="45" height="18"></td>
    <td align="right" width="186"><<?php echo"a href='http://localhost/bdsports/live/detailslive.php?match_id=$matchid'"; ?>><?php echo $hometeamname; ?></a></td>
<td align="center" width="51"><<?php echo"a href='http://localhost/bdsports/live/detailslive.php?match_id=$matchid'"; ?>><?php
        echo $hometeamgoal . " - " . $awayteamgoal;
        ?></a></td>
<td width="186"><<?php echo"a href='http://localhost/bdsports/live/detailslive.php?match_id=$matchid'"; ?>><?php echo $awayteamname; ?></a></td>
 
</tr>
<tr>
    <td colspan="4" height="1"></td>
</tr>