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
        <link rel="stylesheet" type="text/css" href="../css/table.css"/>
        <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">
    </head>
    <body>
        <?php
        include '../connection.php';
        //-----Function for Insert Team--------//
        @session_start();
        if (isset($_SESSION['user_email'])
                && isset($_POST['playerid'])
                && isset($_POST['playername'])
                && isset($_POST['playerage'])
                && isset($_POST['Playerjersey'])) {

            $UserEmail = $_SESSION['user_email'];
            $player_id = $_POST['playerid'];
            $player_name = $_POST['playername'];
            $player_age = $_POST['playerage'];
            $player_jersey = $_POST['Playerjersey'];
            if (!empty($player_id) && !empty($player_name) && !empty($player_age) && !empty($player_jersey)) {
                $query = "UPDATE `player_info` SET `player_name`='$player_name',`player_age`='$player_age',`player_jersey`='$player_jersey' WHERE `player_id` = '$player_id';";
                $result = mysql_query($query) or die(mysql_error());
            }
        }
        ?>

        <?php include_once '../html/header.html'; ?>
        <div class="row">
            <div class="column grid_12"> 
                <?php include_once '../user/usermenu.html'; ?>
            </div>
        </div>

        <div class="row">
            <div class="column grid_4 introtwo">
                <center>
                    <form action="updateplayer.php" method="POST">
                        <?php
                        echo'<table>';
                        @session_start();
                        if (isset($_SESSION['user_email'])) {
                            $UserEmail = $_SESSION['user_email'];
                            $query = "SELECT distinct `player_id` FROM `player_list`,`user`,`userteam` WHERE
                        `user`.`user_mail` = `userteam`.`user_mail` and `userteam`.`team_id`=`player_list`.`team_id` and `user`.`user_mail`= '$UserEmail';";
                            $result = mysql_query($query) or die(mysql_error());
                            echo'<tr>
                                <td>Select Player ID</td>
                                <td><select name="playerid">';
                            while ($row = mysql_fetch_array($result)) {
                                extract($row);
                                echo '<option value="' . $row['player_id'] . '">' . $row['player_id'] . '</option>';
                            }
                            echo'</select></td></tr>';
                            echo '<tr><td colspan="2"><input type="text" name="playername" placeholder="Player Name"></tr>';
                            echo '<tr><td colspan="2"><input type="text" name="playerage" placeholder="Player Age"></tr>';
                            echo '<tr><td colspan="2"><input type="text" name="Playerjersey" placeholder="Player Jersey"></tr>';
                            echo'<tr>
                                <td colspan="2"><input type="submit" value="Update Player" ></td>
                            </tr>
                        </table>';
                        }
                        ?>
                    </form>
                </center>
            </div>

            <div class="column grid_8 introtwo">
                <center>
                    <h1 style="padding: 20px; color: #8AC007">My Player Information</h1>
                    <table>
                        <tr>
                            <td>Player Id</td>
                            <td>Player Name</td>
                            <td>Player Age</td>
                            <td>Player Jersey</td>
                        </tr>
<?php
include '../connection.php';
@session_start();
if (isset($_SESSION['user_email'])) {
    $UserEmail = $_SESSION['user_email'];
    $Query = "SELECT distinct `player_id`, `player_name`,`player_age`,`player_jersey` FROM `player_list`,`user`,`userteam` WHERE
                        `user`.`user_mail` = `userteam`.`user_mail` and `userteam`.`team_id`=`player_list`.`team_id` and `user`.`user_mail`= '$UserEmail';";
    $result = mysql_query($Query) or die(mysql_error());
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_array($result)) {
            extract($row);
            //----link the team list--------------------//
            echo "
                                    
                            <tr>
                            <td>$player_id</td>
                        <td>$player_name</a></td>
                            <td>$player_age</td>
                                <td>$player_jersey</td>
                            </tr>";
        }
    } else {
        echo 'You have no Player';
        header('Location:http://localhost/bdsports/user/insertplayer.php');
    }
}
?>
                    </table>
                </center> </div>  
        </div>


    </body>
<?php include_once '../html/footer.html'; ?>
</html>