<html>
    <head>
        <title>

        </title>
        <link rel="stylesheet" type="texr/css" href="../css/style2.css"/>
        <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">
    </head>
    <body>
        <?php
        mysql_connect('localhost', 'root','');
        mysql_select_db('tms');
        $date= time();
        $Query="INSERT INTO `matchinfo`(`start_time`) VALUES ('$date');";
        if (mysql_query($Query)) {
            echo "done"; 
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
                <?php include_once 'functionlive.php'; ?>
                <form action="creategame.php" method="POST">
                    <center>
                        <table>
                            <tr>
                                <td>Enter Home Team Name</td>
                                <td><select name="teamname"><?php
                while ($row = mysql_fetch_array($query3)) {
                    echo '<option value="' . $row['team_name'] . '">' . $row['team_name'] . '</option>';
                }
                ?></select></td>
                            </tr>

                            <tr>
                                <td></br>Enter  Away Team Name</td>
                                <td></br><select name="playername"><?php
                                        while ($row = mysql_fetch_array($query1)) {
                                            echo '<option value="' . $row['team_name'] . '">' . $row['team_name'] . '</option>';
                                        }
                ?></select></td>
                            </tr>
                            <tr>
                                <td colspan="2"></br><input type="submit" value="Start Game" ></td>
                            </tr>
                        </table>
                    </center>

                </form>
            </div>
        </div>               

    </body>
    <?php include_once '../html/footer.html'; ?>
</html>