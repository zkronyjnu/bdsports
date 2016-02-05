<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style2.css"/>
        <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">
        <script type="text/javascript" src="counter.js"></script>
        <script type="text/javascript">
            var timer = null;
            function auto_reload()
            {
                window.location ='http://localhost/bdsports/live/livegame.php';
            }
        </script>
    </head>
    <body onload="timer = setTimeout('auto_reload()',5000);">
        <?php include_once '../html/header.html'; ?>
        <div class="row">
            <div class="column grid_12"> 
                <?php
                @session_start();
                if (isset($_SESSION['user_email'])) {
                    include_once '../user/usermenu.html';
                } else {
                    include_once '../html/menu.html';
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="column grid_12"> 
                <center>
    <td width="468" valign="top" bgcolor="#111111">
        <table width="468" bgcolor="#666666" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <?php
                 @session_start(); 
                 echo '<center>';
                if (!isset($_SESSION['user_email']))
                                {
                include '../connection.php';
                $Query = "select `match_id` from `match` ORDER BY `match_id` DESC LIMIT 8;";

                $result = mysql_query($Query) or die(mysql_error());
                $result_array = array();
                while($row = mysql_fetch_assoc($result)){
                    $result_array[] = $row['match_id'];
                }
                if (!empty($result_array[0])) {
                    $matchid = $result_array[0];
                    $_SESSION['matchid'] = $matchid;
                    include 'match1.php';
                }
                if(!empty($result_array[2])){
                    $matchid = $result_array[2];
                    $_SESSION['matchid'] = $matchid;
                    include 'match1.php';//match page....
                }
                if(!empty($result_array[4])){
                    $matchid = $result_array[4];
                    $_SESSION['matchid'] = $matchid;
                    include 'match1.php';
                }
                if(!empty($result_array[6])){
                    $matchid = $result_array[6];
                    $_SESSION['matchid'] = $matchid;
                    include 'match1.php';
                }
                if(!empty($result_array[8])){
                    $matchid = $result_array[8];
                    $_SESSION['matchid'] = $matchid;
                    include 'match1.php';
                }

                
                                }
                                if (isset($_SESSION['user_email'])) {
                                    include_once 'userlivegame.php';
}
                                ?>
                <tbody>
    </table>
        </center>
            </div>
        </div>
        <?php require_once '../html/footer.html'; ?>
    </body>

</html>