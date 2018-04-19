<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
	if($_SERVER['REQUEST_METHOD'] == "GET") {
		$id = (int)(trim(strip_tags($_GET['id'])));
		//echo $id;
		addToBasket($id);
	}
	header('Location: catalog.php');
?>