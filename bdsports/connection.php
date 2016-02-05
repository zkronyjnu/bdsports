  
<?php

$SERVER = 'localhost';
$DatabaseUsername = 'root';
$DatabasePassword = '';
$DatabaseName = 'mydb';
if (!mysql_connect($SERVER, $DatabaseUsername, $DatabasePassword) || !mysql_select_db($DatabaseName)) {
    echo mysql_error();
}
?>
    