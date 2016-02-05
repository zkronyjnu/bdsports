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
                <?php include '../user/usermenu.html';
                ?>
            </div>
            <center>
                <h1 style="padding: 20px; color: #8AC007">My Match Information</h1>
                <table>
                    <tr>
                        <td>Match Id</td>
                        <td>league Name</td>
                        <td>Match Venue</td>
                        <td>Match Result</td>
                    </tr>
                    <?php
                    include '../connection.php';
                    @session_start();
                    if (isset($_SESSION['user_email'])) {
                        $UserEmail = $_SESSION['user_email'];
                        $Query = "select * from `match_all` where `user_mail`='$UserEmail';";
                        $result = mysql_query($Query) or die(mysql_error());
                        if (mysql_num_rows($result) > 0) {
                            while ($row = mysql_fetch_array($result)) {
                                extract($row);
                                //----link the team list--------------------//
                                echo "
                                    
                            <tr>
                            <td>$match_id</td>
                        <td><a href='#?team_id=$match_id'>$league_name</a></td>
                            <td>$match_venue</td>
                                <td>$match_result</td>
                            </tr>";
                            }
                        } else {
                            echo 'You have no match yet';
                            header('Location:http://localhost/bdsports/user/insertmatch.php');
                        }
                    }
                    ?>
                    </table></center>
                    <?php include '../html/footer.html'; ?>
                    </body>
                    </html>
