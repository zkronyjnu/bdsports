<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style2.css"/>
        <title>
            Insert new player info
        </title>
    </head>
    <body>
        <div class="row">
            <div class="column grid_12 banner">
            <!--<img src="banner.jpg"/>-->
                <header>
                    <h1>Insertion-Panel	</h1>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="column grid_12 table1">


                <form method="post" action="b.php">
                    <center>
                        <table width="400" border="2" cellspacing="1" cellpadding="1">
                            <tr>
                                <td width="91">Name:</td><!---------Player Name------>
                                <td width="237"><input type="text" name="name" size="25.5"/></td>
                            </tr>
                            <tr>
                                <td>Player-rank:</td>
                                <td width="237"><input type="text" name="rank" size="25.5"/></td>
                            </tr>
                            <tr>
                                <td>Birthday:</td>
                                <?php include'a.php' ?>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td width="237"><input type="email" name="email" size="25.5"/></td>
                            </tr>
                            <tr>

                                <td colspan="2" align="right"><input type="submit" value="GO"></td>
                            </tr>
                        </table>
                    </center> 
                </form>
            </div>
        </div>
    </body>
</html>