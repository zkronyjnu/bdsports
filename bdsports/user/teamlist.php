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
        <!-------------------CSS START---------------------->
        <link rel="stylesheet" type="text/css" href="../css/style2.css">
        <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">
        <link rel="stylesheet" href="../css/table.css" type="text/css">
        <!-------------------CSS END--------------------------->
    </head>
    <body>
        <?php include '../html/header.html'; ?>
        <div class="row">
            <div class="column grid_12">
                <?php include 'usermenu.html';
                ?>
            </div>
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
                    <?php include '../html/footer.html'; ?>
                    </body>
                    </html>
