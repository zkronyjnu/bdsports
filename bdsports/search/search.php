<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../pagination/pagination.css" />
        <link rel="stylesheet" type="text/css" href="../css/style2.css"/>
        <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">
    </head>
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
            <?php
            if (isset($_GET['search_text'])) {
                $Search = $_GET['search_text'];
                include '../connection.php';
                include '../pagination/PaginateCore.php';
                $paginate->setFrom("`player_list`");
                $paginate->setWhere("`player_name` like '%$Search%' or team_name like '%$Search%'");
                $paginate->addUrlValues('search_text', $Search);
                $paginate->setURL("http://localhost/bdsports/search/search.php");
                $Query = $paginate->getQuery();
                $Result = mysql_query($Query) or die(mysql_error());

                if (mysql_num_rows($Result) > 0) {
                    $row = mysql_fetch_assoc($Result);
                    echo "<h2>Name:" . $row['player_name'] . "</h2><br />";
                    echo "<h2>Age : " . $row['player_age'] . "</h2><br />";
                    echo "<h2>Player Jersey : " . $row['player_jersey'] . "</h2><br />";
                    echo "<h2>Team : " . $row['team_name'] . "</h2><br />";
                    $paginate->paginate();
                }
            }
            ?>
            
</html>