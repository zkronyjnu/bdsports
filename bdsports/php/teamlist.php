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
        <link rel="stylesheet" href="../css/menu.css" type="text/css">
        </head>
        
        <body>
            <?php include_once '../html/header.html'; ?>
        <div class="row">
            <div class="column grid_12"> 
                <?php include_once '../user/usermenu.html'; ?>
            </div>
        </div>
            <div class="row">
                <div class="column grid_12 introone">
                    <ul>
                <li>Bangladesh</li>
                <li>Pakisthan</li>
                </ul>
                    </div>
                </div>
            </body>
            <?php include_once '../html/footer.html';?>
            
            </html>