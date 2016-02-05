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
        <link rel="stylesheet" type="text/css" href="usermenu.css"/>
        <link rel="shortcut icon" href="../favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="../css/style3.css" />
        <link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
        <title>Welcome to admin panel</title>
    </head>
    <body>
        <div class="row">
            <div class="column grid_12 header">

                <h1>Sport'sbd</h1>

                <h2></h2>

            </div>
        </div>
        <div class="row">
            <div class="column grid_12 menu">
                <?php include 'usermenu.html' ?>
            </div>
        </div>
        <div class="row">
            <div class="column grid_12 introtwo">
                <?PHP include 'insertform.html' ?>
                <!--
            <form method="post" action="process.php">
            
            <center>
            <table width="200" border="1" cellspacing="2" cellpadding="1">
              <tr>
                <td><div align="justify">Usesrname:</div></td>
                <td><input name="username" type="text" /></td>
              </tr>
              <tr>
                <td><div align="justify">Firstname:</div></td>
                <td><input type="text" name="fname" /></td>
              </tr>
              <tr>
                <td><div align="justify">Lastname:</div></td>
                <td><input name="lname" type="text" /></td>
              </tr>
              <tr>
                <td><div align="justify">Email:</div></td>
                <td><input type="email" name="email" /></td>
              </tr>
              <tr>
                <td><div align="justify">Password:</div></td>
                <td><input type="password" name="password"></td>
              </tr>
              <tr>
                
                
              </tr>
            </table>
            <table><td colspan="2" align="right"><input type="submit" value="SIGNUP"></td></table>
            </center> 
            
            </form>
                --> 
                </div>
            </div>
        
               
    
    
       
</html>