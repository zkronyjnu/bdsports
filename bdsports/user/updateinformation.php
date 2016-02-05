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
         <?php
    @session_start();
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
        <div class="row" >
            <div class="column grid_12 header">

                <h1>Sport'sbd</h1>

                <div style="letter-spacing:8px;">TRY YOUR SPORT'S NOW</div>

                <div style="color:#ff9f94;">ON
                    <span style="background-color:#B4009E;color:#d3f34f;">LIVE</span>
                </div>

                <div style="color:#fbd109;">and more...</div>

            </div>
        </div>
        <div class="row">
            <div class="column grid_12 introtwo">
                <?php include 'usermenu.html' ?>
            </div>
        </div>
        <div class="row">

            <div class="column grid_4 sidebar introtwo"> 
                <ul>
                    <li><a herf="#"><a href="http://localhost/bdsports/php/updateteam.php">Update Team</a></a></li>
                    <li><a herf="#"><a href="http://localhost/bdsports/php/updateplayer.php">Update Player</a></a></li>
                    <li><a herf="#"><a href="http://localhost/bdsports/php/updatematch.php">Update Match</a></a></li>
                    <li><a herf="#"><a href="http://localhost/bdsports/user/deleteteam.php">Delete Team</a></a></li>
                    <li><a herf="#"><a href="http://localhost/bdsports/user/deleteplayer.php">Delete Player</a></a></li>
                    

                </ul>
            </div>
            <div class="column grid_8 introtwo">

                <ul>

                    <li><h2>At first Create Your Team</h2></li>
                    <li><h2>Then Start Your Live Game</h2></li>

                </ul>

            </div>
        </div>
    </body>
    <?php include_once '../html/footer.html'; ?>
</html>
