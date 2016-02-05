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
        <div class="column grid_12 introtwo">

<?php include_once '../html/teaminformation.html'; ?>
            <?php include 'userfunction.php';?>
        
        </div>
        

    </div>
    <body>
      <?php  include '../html/footer.html';?>
</html>

