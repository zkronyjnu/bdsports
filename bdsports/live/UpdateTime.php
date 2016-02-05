
<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('tms');
$Query = "SELECT * FROM  `matchinfo`;";
$result = mysql_query($Query);
if ($result) {
    $row = mysql_fetch_array($result);
    extract($row);
    echo floor((time()-$start_time)/60);
}else{
    echo mysql_error();
}
?>
