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
    <!-------------------CSS END---------------------->

</head>
<body>
    <?php include '../html/header.html'; ?>
    <div class="row">
        <div class="column grid_12">
            <?php include 'usermenu.html';
            ?>
        </div>
        <form action="playerInfo.php" method="POST">
            <center>
                <h1>Player Information</h1>

                <table   cellspacing="5" cellpadding="1">
                    <tr>
                        <td><div align="justify">Player Name:</div></td>
                        <td><input name="playername" type="text" /></td>
                    </tr>

                    <tr>
                        <td><div align="justify">Player Age:</div></td>
                        <td><div align="justify">
                                <select name="playerage">
                                    <option>....Player Age....</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                    <option>32</option>
                                    <option>33</option>
                                    <option>34</option>
                                </select></div></td>

                    </tr>
                    <tr>
                        <td><div align="justify">Jersey No:</div></td>
                        <td><div align="justify">
                                <select name="playerjersey">
                                    <option>....Jersey No.....</option>
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                </select></div></td>

                    </tr>
                </table>
                <table>
                    <tr>
                        <td colspan="2"><input type="submit" name="add" value="ADD" /></td>
                    <input type="hidden" 
                           value="<?php
            
                           
            if (isset($_GET['team_id'])) {
                @session_start();
                $team_id = $_GET['team_id'];
                echo "$team_id";
                 $_SESSION['teamid'] = $team_id;
            }
            ?>" name="team_id">
                    </tr>
                </table>
            </center> 
        </form>
        <?php
          @session_start(); 
        if (isset($_SESSION['teamid'])
                && isset($_POST['playername'])
                && isset($_POST['playerage'])
                && isset($_POST['playerjersey'])
                && isset($_POST['add'])) {
            $teame_id = $_SESSION['teamid'];
            

            $player_name = $_POST['playername'];
            $player_age = $_POST['playerage'];
            $player_jersey = $_POST['playerjersey'];
            include '../connection.php';

            $Query1 = "INSERT INTO 
        `player_info`(`player_name`, `player_age`, `player_jersey`) 
        VALUES ('$player_name','$player_age',$player_jersey);";
            mysql_query($Query1) or die(mysql_error());
            $player_id = mysql_insert_id();
            $Query2 = "INSERT INTO `playerteam`(`team_id`, `player_id`) 
        VALUES ($teame_id,$player_id)";
            mysql_query($Query2) or die(mysql_error());
           
            }
        ?>

        <?php include '../html/footer.html'; ?>
</body>
