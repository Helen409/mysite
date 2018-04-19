<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
	if(isset($_GET['id'])) {
		$id = (int)(trim(strip_tags($_GET['id'])));
		addToBasket($id);
	}
	header('Location: catalog.php');
?>