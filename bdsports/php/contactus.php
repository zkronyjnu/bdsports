<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style2.css"/>
        <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">

    </head>

    <body>

        <?php include_once '../html/header.html'; ?>
        <div class="row">
            <div class="column grid_12">
                <?php
                session_start();
                if (!isset($_SESSION['user'])) {
                    include '../html/menu.html';
                } else {

                    include '../user/usermenu.html';
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="column grid_12">

                <p><h1>Email :</hi><h2>zkronyjnu@hotmail.com</h2></br>
                    <h1>Website :</h1><h2>http://www.bdsports.com</h2></p>
            </div>
        </div>

        <?php
        include_once '../html/footer.html';
        ?>
</html>

