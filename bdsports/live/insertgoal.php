<html>
    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location:../index.php');
        die();
    }
//echo 'In admin Panel';
    ?>
    <head>
        <title>

        </title>
        <link rel="stylesheet" type="text/css" href="../css/style2.css"/>
        <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">
        <link rel="stylesheet" href="../css/table.css" type="text/css">
    </head>
    <body>

        <?php include_once '../html/header.html'; ?>
        <div class="row">
            <div class="column grid_12"> 
                <?php include_once '../user/usermenu.html'; ?>
            </div>

        </div>
        <div class="row">

            <div class="column grid_4 introtwo"> 
                <?php
                @session_start();
                if (isset($_SESSION['user_email'])
                        && isset($_GET['match_id'])) {
                    include '../connection.php';
                    @session_start();
                    $_SESSION['match_id'] = $_GET['match_id'];
                    $matchid = $_SESSION['match_id'];
                    
                    $query1 = "SELECT `team_id` , `team_name` , `player_id` , `player_name`
FROM `match_player` WHERE `match_id` = '$matchid';";
                    $result = mysql_query($query1) or die(mysql_error());
                    $result1 = mysql_query($query1) or die(mysql_error());
                }

                if (isset($_POST['playerid']) && isset($_SESSION['match_id'])) {
                     include '../connection.php';
                     $matchid = $_SESSION['match_id'];
                     $query1 = "SELECT `team_id` , `team_name` , `player_id` , `player_name`
FROM `match_player` WHERE `match_id` = '$matchid';";
                    $result = mysql_query($query1) or die(mysql_error());
                    $result1 = mysql_query($query1) or die(mysql_error());
                    $Query = "SELECT `starttime` FROM `match` WHERE `match_id`='$matchid'";
                    $Result = mysql_query($Query) or die(mysql_error());
                    $row=  mysql_fetch_assoc($Result);
                    $StartTime=$row['starttime'];
                    
                    
                    $playerid = $_POST['playerid'];
                    $time =  ceil((time()-$StartTime)/60);
                    if (!empty($matchid) && !empty($playerid)) {
                        $query2 = "INSERT INTO `goal`(`match_id`, `player_id`,`goal_time`) VALUES ('$matchid','$playerid','$time');";
                        $result2 = mysql_query($query2) or die(mysql_error());
                        if ($result2) {
                            echo 'ONE GOAL ADDED';
                        }
                    }
                }
                        

                else
                    mysql_error();
                ?>
                <?php include '../html/newgoal.html'; ?>

            </div>
            <div class="column grid_8 introtwo">
                <center>
                    <h1 style="padding: 20px; color: #8AC007">My Match Information</h1>
                    <table>
                        <tr>
                            <td>Team Id</td>
                            <td>Team Name</td>
                            <td>Player_id</td>
                            <td>Player_name</td>
                        </tr>
                        <?php
                        while ($row = mysql_fetch_array($result1)) {
                            extract($row);
                            //----link the team list--------------------//
                            echo "
                                     <tr>
                            <td>$team_id</td>
                        <td><a href='http://localhost/bdsports/user/findteaminfo.php?team_id=$team_id'>$team_name</a></td>
                      <td>$player_id</td>
                                    <td>$player_name</td>
                            </tr>";
                        }
                        ?>
                    </table></center>
            </div>
        </div>
        <?php include'../html/footer.html'; ?>
    </body>

</html>