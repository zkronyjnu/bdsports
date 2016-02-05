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
        <?php
        include '../connection.php';
        //-----Function for Insert Team--------//
        @session_start();
        if (isset($_SESSION['user_email'])) {
            $UserEmail = $_SESSION['user_email'];
            $query1 = "SELECT `team_id`, `team_name` FROM `team` WHERE `user_mail` = '$UserEmail';";
            $result = mysql_query($query1) or die(mysql_error());
            $result1 = mysql_query($query1) or die(mysql_error());
            echo '';
        }
        if (isset($_SESSION['user_email'])
                &&isset($_POST['teamid'])
                && isset($_POST['teamname'])) {
            $UserEmail = $_SESSION['user_email'];
            $Teamid = $_POST['teamid'];
            $Teamname = $_POST['teamname'];

            if (!empty($Teamid) && !empty($Teamname) && !empty($UserEmail)) {
                $sql = "DELETE FROM `userteam` WHERE `team_id` = '$Teamid';";
                mysql_query($sql) or die(mysql_error());
                $Query = "DELETE FROM `team_info` WHERE `team_id` = '$Teamid'";
                mysql_query($Query) or dir(mysql_error());
            }
            $QueryClear = "delete from `team_info` where `team_info`.`team_id` not in (select `team_id` from `userteam`);";
            mysql_query($QueryClear) or die(mysql_error());
        }
 
        ?>
        <?php include_once '../html/header.html'; ?>
        <div class="row">
            <div class="column grid_12"> 
                <?php include_once '../user/usermenu.html'; ?>
            </div>
        </div>

        <div class="row">
            <div class="column grid_12 introone"> 

                <form action="deleteteam.php" method="POST">
                    <center>
                        <table>
                            <tr>
                                <td>Select Team ID</td>
                                <td><select name="teamid"><?php
                while ($row = mysql_fetch_array($result)) {
                    extract($row);
                    echo '<option value="' . $row['team_id'] . '">' . $row['team_id'] . '</option>';
                }
                ?></select></td>
                            </tr>

                            <tr>
                                <td> Team Name</td>
                                <td><select name="teamname"><?php
                                        while ($row = mysql_fetch_array($result1)) {
                                            extract($row);
                                            echo '<option value="' . $row['team_name'] . '">' . $row['team_name'] . '</option>';
                                        }
                ?></select></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Delete Team" ></td>
                            </tr>
                        </table>
                    </center>

                </form>
            </div>
        </div>               

    </body>
    <?php include_once '../html/footer.html'; ?>
</html>