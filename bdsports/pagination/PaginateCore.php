<?php
//include pagination class
include "Paginate.php";
$paginate = new Paginate("mydb", "localhost", "root", "");
$paginate->setCurrentPage(isset($_GET['page']) ? $_GET['page'] : 1);
$paginate->setPerPage(1);
$paginate->setLinkPerPage(3);
$paginate->setIDType('class');
$paginate->setOutterHTML('<div class="pagination dark"><div>', '</div></div>');
$paginate->setCurrentID('page active');
$paginate->setLinkID("page dark active");
$paginate->setNextLinkID("page dark");
$paginate->setPreviousID("page dark");
?>
