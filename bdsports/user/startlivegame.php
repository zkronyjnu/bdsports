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
        <!------------------- CSS START---------------------->
        <link rel="stylesheet" type="text/css" href="../css/style2.css">
        <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">
        <link rel="stylesheet" href="../css/table.css" type="text/css">
        <!------------------- CSS END---------------------->

    </head>
    <body>

        <?php include '../html/header.html'; ?>
        <div class="row">
            <div class="column grid_12">
                <?php include 'usermenu.html'; ?>
            </div>
            <div class="column grid_4 introtwo">
                <?php
                include_once '../connection.php';
                @session_start();
                if (isset($_SESSION['user_email'])
                        && isset($_POST['match_id'])
                        && isset($_POST['hometeam'])
                        && isset($_POST['awayteam'])) {
                    if (!empty($_SESSION['user_email']) && !empty($_POST['match_id'])
                            && !empty($_POST['hometeam']) && !empty($_POST['awayteam'])) {
                        $hometeamid = $_POST['hometeam'];
                        $awayteamid = $_POST['awayteam'];
                        $match_id = $_POST['match_id'];
                        $time = time();
                        $query1 = "INSERT INTO `match`(`team_id`, `match_id`, `starttime`) VALUES ('$hometeamid','$match_id','$time');";
                        $result1 = mysql_query($query1) or die(mysql_error());
                        if ($result1) {
                            $query2 = "INSERT INTO `match`(`team_id`, `match_id`, `starttime`) VALUES ('$awayteamid','$match_id','$time');";
                            mysql_query($query2) or die(mysql_error());
                        }
                    }
                } 
                ?>
                <?php
                include '../connection.php';
                @session_start();
                if (isset($_SESSION['user_email'])) {
                    $UserEmail = $_SESSION['user_email'];
                    $query1 = "SELECT `team_id` FROM `team` WHERE `user_mail` = '$UserEmail';";
                    $query2 = "SELECT `match_id` FROM `match_all` WHERE `user_mail` = '$UserEmail';";
                    $result = mysql_query($query1) or die(mysql_error());
                    $result1 = mysql_query($query1) or die(mysql_error());
                    $result2 = mysql_query($query2) or die(mysql_error());
                }
                ?>

                <?php include_once '../php/insertmatch.php'; ?>

            </div>
            <div class="column grid_8">
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
                    </table></center>
            </div>
        </div>


        <?php include '../html/footer.html'; ?>



    </body>

</html>