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
                && isset($_POST['match_id'])
                && isset($_POST['league_name'])
                && isset($_POST['match_venue'])) {

            $UserEmail = $_SESSION['user_email'];
            $match_id = $_POST['match_id'];
            $league_name = $_POST['league_name'];
            $match_venue = $_POST['match_venue'];
            if (!empty($match_id) && !empty($league_name) && !empty($match_venue)) {
                $query = "UPDATE `match_info` SET `league_name`='$league_name',`match_venue`='$match_venue' WHERE `match_id` = '$match_id';";
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
                    echo '<form action="updatematch.php" method="POST">';

                    echo'<table>';
                    @session_start();
                    if (isset($_SESSION['user_email'])) {
                        $UserEmail = $_SESSION['user_email'];
                        $query = "SELECT `match_id` FROM `match_all` WHERE `user_mail` = '$UserEmail';";
                        $result = mysql_query($query) or die(mysql_error());
                        echo'<tr>
                                <td>Select Match ID</td>
                                <td><select name="match_id">';
                        while ($row = mysql_fetch_array($result)) {
                            extract($row);
                            echo '<option value="' . $row['match_id'] . '">' . $row['match_id'] . '</option>';
                        }
                        echo'</select></td></tr>';
                        echo '<tr><td colspan="2"><input type="text" name="league_name" placeholder="League Name"></tr>';
                        echo '<tr><td colspan="2"><input type="text" name="match_venue" placeholder="Match Venue"></tr>';
                        echo'<tr>
                                <td colspan="2"><input type="submit" value="Update Match" ></td>
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
                            <td>Match Id</td>
                            <td>League Name</td>
                            <td>Match Venue</td>
                            
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
                        <td><a href='#'>$league_name</a></td>
                            
                                <td>$match_venue</td>
                            </tr>";
                                }
                            } else {
                               
                                header('Location:http://localhost/bdsports/user/insertmatch.php');
                            }
                        }
                        ?>
                    </table>
                </center> </div>  
        </div>


    </body>
    <?php include_once '../html/footer.html'; ?>
    
</html>