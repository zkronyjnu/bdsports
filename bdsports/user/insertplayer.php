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



                <?php
                include '../connection.php';
                @session_start();
                if (isset($_SESSION['user_email'])) {
                    $UserEmail = $_SESSION['user_email'];
                    $Query = "select * from team where `user_mail`='$UserEmail';";
                    $result = mysql_query($Query) or die(mysql_error());
                    if (mysql_num_rows($result) > 0) {

                        echo '<h1 style="padding: 20px; color: #8AC007">Select Any Team</h1>';
                        echo '<table>';

                        while ($row = mysql_fetch_array($result)) {
                            extract($row);
                            //----link the team list--------------------//
                            echo '<tr>';
                            echo"<td><a href='http://localhost/bdsports/user/PlayerInfo.php?team_id=$team_id'>$team_name</a></br>
                    </td>";
                            echo'</tr>';
                        }

                        echo '</table>';
                    } else {

                        echo '<h1 style="padding: 20px; color: #8AC007">Please First Insert Your Team</h1>';
                        echo '<a href="http://localhost/bdsports/user/insertteam.php"><button>Insert Team</button></a>';
                    }
                }
                ?>

            </center>
            <?php include '../html/footer.html'; ?>
    </body>
</html>
