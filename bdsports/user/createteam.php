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

        <link rel="stylesheet" type="text/css" href="../css/style2.css">
        <link rel="stylesheet" type="text/css" href="../css/menu.css">


        <title>
            Welcome
<?php
echo $_SESSION['user'];
?>
            to your home page
        </title>
    </head><body>
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
            <div class="column grid_12">
<?php include 'usermenu.html' ?>
            </div>
        </div>
</html>
