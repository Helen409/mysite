<?php
	ob_start();
header('Content-Type=utf-8');
define('DB_HOST','localhost');
define('DB_LOGIN','root');
define('DB_PASSWORD','');
define('DB_NAME','eshop');
define('ORDERS_LOG','orders.log');
$basket=array();
$count=0;
$link=mysqli_connect(DB_HOST,DB_LOGIN,DB_PASSWORD,DB_NAME);
global $basket;
$basket[$id]=1;
basketInit();
?>
