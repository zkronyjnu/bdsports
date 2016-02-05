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
                && isset($_POST['team_id'])
                && isset($_POST['team_name'])
                && isset($_POST['team_country'])
                && isset($_POST['team_coach'])) {

            $UserEmail = $_SESSION['user_email'];
            $team_id = $_POST['team_id'];
            $team_name = $_POST['team_name'];
            $team_country = $_POST['team_country'];
            $team_coach = $_POST['team_coach'];
            if (!empty($team_id) && !empty($team_name) && !empty($team_country) && !empty($team_coach)) {
                $query = "UPDATE `team_info` SET `team_name`='$team_name',`team_country`='$team_country',`team_coach`='$team_coach' WHERE `team_id` = '$team_id';";
                $result = mysql_query($query) or die(mysql_error());
            }
        }
        ?>
<?php include_once '../html/header.html'; ?>
        
        <div class="row">
            <div class="column grid_12 introtwo"> 
                <?php include_once '../user/usermenu.html'; ?>
            </div>
        </div>

        <div class="row">
            <div class="column grid_4 introtwo">
                <center>

                    <?php
                    echo '<form action="updateteam.php" method="POST">';

                    echo'<table>';
                    @session_start();
                    if (isset($_SESSION['user_email'])) {
                        $UserEmail = $_SESSION['user_email'];
                        $query = "SELECT `team_id`, `team_name` FROM `team` WHERE `user_mail` = '$UserEmail';";
                        $result = mysql_query($query) or die(mysql_error());
                        echo'<tr>
                                <td>Select Team ID</td>
                                <td><select name="team_id">';
                        while ($row = mysql_fetch_array($result)) {
                            extract($row);
                            echo '<option value="' . $row['team_id'] . '">' . $row['team_id'] . '</option>';
                        }
                        echo'</select></td></tr>';
                        echo '<tr><td colspan="2"><input type="text" name="team_name" placeholder="Team Name"></tr>';
                        echo '<tr><td colspan="2"><input type="text" name="team_country" placeholder="Team Country"></tr>';
                        echo '<tr><td colspan="2"><input type="text" name="team_coach" placeholder="Team Coach"></tr>';
                        echo'<tr>
                                <td colspan="2"><input type="submit" value="Update Team" ></td>
                            </tr>
                        </table>';
                        echo'</form>';
                    }
                    ?>
                </center>
            </div>

            <div class="column grid_8 introtwo">
                <center>
                    <h1 style="padding: 20px; color: #8AC007">My Team Information</h1>
                    <table>
                        <tr>
                            <td>Team Id</td>
                            <td>Team Name</td>
                            <td>Team Country</td>
                            <td>Team Coach</td>
                        </tr>
                        <?php
                        include '../connection.php';
                        @session_start();
                        if (isset($_SESSION['user_email'])) {
                            $UserEmail = $_SESSION['user_email'];
                            $Query = "select * from team where `user_mail`='$UserEmail';";
                            $result = mysql_query($Query) or die(mysql_error());
                            if (mysql_num_rows($result) > 0) {
                                while ($row = mysql_fetch_array($result)) {
                                    extract($row);
                                    //----link the team list--------------------//
                                    echo "
                                    
                            <tr>
                            <td>$team_id</td>
                        <td><a href='http://localhost/bdsports/user/findteaminfo.php?team_id=$team_id'>$team_name</a></td>
                            <td>$team_country</td>
                                <td>$team_coach</td>
                            </tr>";
                                }
                            } else {
                                echo 'You have no team yet';
                                header('Location:http://localhost/bdsports/user/insertteam.php');
                            }
                        }
                        ?>
                    </table>
                </center> </div>  
        </div>


    </body>
    <?php include_once '../html/footer.html'; ?>
    
</html>