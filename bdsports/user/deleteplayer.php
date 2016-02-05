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
        <link rel="stylesheet" type="texr/css" href="../css/style2.css"/>
        <link rel="stylesheet" type="texr/css" href="../css/table.css"/>
        <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">
    </head>
    <body>
        <?php include_once '../html/header.html'; ?>
        <div class="row">
            <div class="column grid_12"> 
                <?php include_once '../user/usermenu.html'; ?>
            </div>
        </div>
        <div class="row">
            <div class="column grid_12 introone"> 
                <center>
                        <?php
                        include '../connection.php';
                        //-----Function for Insert Team--------//
                        @session_start();
                        if (isset($_SESSION['user_email'])
                                && !isset($_POST['teamid'])) {
                            $UserEmail = $_SESSION['user_email'];
                            $query1 = "SELECT `team_id` FROM `team` WHERE `user_mail` = '$UserEmail';";
                            $result = mysql_query($query1) or die(mysql_error());
                            echo '<form action="deleteplayer.php" method="POST">';
                            echo'<table><tr>
                                    <td>Select Team ID</td>
                                    <td><select name="teamid">';
                            while ($row = mysql_fetch_array($result)) {
                                extract($row);
                                echo '<option value="' . $row['team_id'] . '">' . $row['team_id'] . '</option>';
                            }
                            echo'</select></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Select Team" ></td>
                                </tr></table>';
                            echo '</form>';
                        }
                        if (isset($_SESSION['user_email'])
                                && isset($_POST['teamid'])) {
                            $UserEmail = $_SESSION['user_email'];
                            $Teamid = $_POST['teamid'];
                            if (!empty($Teamid) && !empty($UserEmail)) {


                                $sql = "SELECT `team_id`, `player_id`, `player_name`, `player_age`, `player_jersey` FROM 
                    `player_list` WHERE `team_id` = '$Teamid';";
                                $result = mysql_query($sql) or die(mysql_error());
                                echo '<h1 style="padding-bottom: 20px;color: #8AC007;">Your Player Information</h1>';
                                echo '<table><tr>
                                    <td>Player Id</td>
                    <td>player Name</td>
                    <td>Player Age</td>
                    <td>Player Jersey</td>';
                                if (mysql_num_rows($result) > 0) {
                                    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                        extract($row);

                                        echo "
                   <tr>
                    <td>$player_id</td>
                    <td>$player_name</td>
                    <td>$player_age</td>
                    <td>$player_jersey</td></tr>
                      </table>  
                   ";
                                    }if (isset($_SESSION['user_email'])
                                            && isset($_POST['teamid'])) {
                                        $UserEmail = $_SESSION['user_email'];
                                        $Teamid = $_POST['teamid'];
                                        //--Query for  get player information from Player_list
                                        $sql = "SELECT `player_id` FROM 
                    `player_list` WHERE `team_id` = '$Teamid';";
                                        $result = mysql_query($sql) or die(mysql_error());
                                        //form for get a player to delete---------------
                                        echo '<form action="deleteplayer.php" method="POST">';
                                        echo'<table><tr>
                                    <td>Player ID</td>
                                    <td><select name="player_id">';
                                        while ($row = mysql_fetch_array($result)) {
                                            extract($row);
                                            echo '<option value="' . $row['player_id'] . '">' . $row['player_id'] . '</option>';
                                        }
                                        echo'</select></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Delete Player" ></td>
                                </tr></table>';
                                        echo '</form>';
                                    }
                                }
                            }
                        }
                        // Check for Player ID--------------------
                        if (isset($_POST['player_id'])
                                && isset($_SESSION['user_email'])) {
                            $player_id = $_POST['player_id'];
                            echo 'Select Another Player to delete';
//------Query for delete A Player From  Playerteam--------------
                            $Query = "DELETE FROM `playerteam` WHERE `player_id` = '$player_id'";
                            mysql_query($Query) or dir(mysql_error());
//--Query For Check Player in player_info  Which is not in playerteam And delete it-----------  
                            $QueryClear = "delete from `player_info` where `player_info`.`player_id` not in (select `player_id` from `playerteam`);";
                            mysql_query($QueryClear) or die(mysql_error());
                        }
                        ?>
                    
                </center>
            </div>
        </div> 
        <?php //include_once '../html/footer.html';  ?>
    </body>

</html>