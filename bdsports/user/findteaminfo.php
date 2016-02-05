<head>
    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location:../index.php');
        die();
    }
//echo 'In admin Panel';
    ?>
    <!-------------------CSS START---------------------->
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/table.css" type="text/css">
    <!-------------------CSS END---------------------->

</head>
<body>
    <?php include '../html/header.html'; ?>
    <div class="row">
        <div class="column grid_12">
            <?php include 'usermenu.html';
            ?>
        </div>
        </div>
    <div class="row">
        <div class="column grid_12 introtwo">
        <center>
            <table>
                <tr>
                    <td>Player Id</td>
                    <td>player Name</td>
                    <td>Player Age</td>
                    <td>Player Jersey</td>
                </tr>
                <?php
                include '../connection.php';
                $teamid = $_GET['team_id'];

                $Query = "select `player_id`,`player_name`,`player_age`,`player_jersey` 
    from player_list where `team_id` = '$teamid';";
                $result = mysql_query($Query) or die(mysql_error());
                if (mysql_num_rows($result) > 0) {
                    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                        extract($row);
                        echo "
                   <tr>
                    <td>$player_id</td>
                    <td>$player_name</td>
                    <td>$player_age</td>
                    <td>$player_jersey</td></tr>
                   ";
                    }
                } else {



                    header("Location: http://localhost/bdsports/user/PlayerInfo.php?team_id=$teamid ");
                }
                ?>
        </center>
    </table>
            </div>
        </div>
    <?php include '../html/footer.html'; ?>
</body>