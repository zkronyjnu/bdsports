
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style2.css"/>
        <link rel="stylesheet" type="text/css" href="css/menu.css"  media="all">
        <title>
            Welcome to admin panel
        </title>
        <?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header('Location:login.php');
            die();
        }
//echo 'In admin Panel';
        ?>
    </head>
    <body>
        <div class="row">
            <div class="column grid_12 header">

                <h1>Sport'sbd</h1>

                <div style="letter-spacing:8px;">TRY YOUR SPORT'S NOW</div>

                <div style="color:#ff9f94;">WELCOME TO
                    <span style="background-color:#B4009E;color:#d3f34f;">Admin-Panel</span>
                </div>

                <div style="color:#fbd109;">Modify Your Site</div>
            </div>

        </div>
        <div class="row">
            <div class="column grid_12">
                <div class="example">
                    <ul id="nav">
                        
                            <li><a herf="#"><a href="admin.php">Admin-panel</a></a></li>
                            <li><a herf="#"><a href="insert.php" target="_blank">Insert</a></a></li>
                            <li><a herf="#"><a href="update.php" target="_blank">Update</a></a></li>
                            <li><a herf="#"><a href="delete.php" target="_blank">Delete</a></a></li>
                            <li><a herf="#"><a href="registration.php">Registration</a></a></li>
                            <li><a herf="#"><a href="logout.php">Log Out</a></a></li> 
                </div>

            </div>
            </div>
            <div class="row">
                <div class="column grid_12 introone">
                    <p><h1 style="text-align:center">WElcome to Admin panel</h1></p>
                </div>
            </div>

    </body>

