<?php

$visitCounter=1;
$lastVisit='';

if (isset($_COOKIE["visitCounter"])){
	$visitCounter=$_COOKIE["visitCounter"];
	$visitCounter++;
}

if (isset($_COOKIE["lastVisit"])){
	$lastVisit=date('d F j, h:m:s',$_COOKIE["lastVisit"]);
}

if(date('d-m-y', $_COOKIE['lastVisit']) != date('d-m-y')) {
	setcookie('visitCounter', $visitCounter);
	setcookie('lastVisit', time());
}

?>