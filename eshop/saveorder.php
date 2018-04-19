<?php
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
	/*
	<p>Заказчик: <input type="text" name="name" size="50" />
		<p>Email заказчика: <input type="text" name="email" size="50" />
		<p>Телефон для связи: <input type="text" name="phone" size="50" />
		<p>Адрес доставки: <input type="text" name="address" 	size="100" />
		<p><input type="submit" value="Заказать" />*/
		$name = mysqli_real_escape_string($link, trim(strip_tags($_POST['name'])));
		$email = mysqli_real_escape_string($link, trim(strip_tags($_POST['email'])));
		$phone = mysqli_real_escape_string($link, trim(strip_tags($_POST['phone'])));
		$address = mysqli_real_escape_string($link, trim(strip_tags($_POST['address'])));
		$datetime=time();
		$orderid=uniqid();
		$order=$name.'|'.$email.'|'.$phone.'|'.$address.'|'.$orderid.'|'.$datetime;
		//echo $order;die();
	//	echo $ORDERS_LOG;die();
		$flink=fopen('admin/'.ORDERS_LOG,'a-');
		fputs($flink,$order.PHP_EOL);
		saveOrder($datetime,$orderid);
		fclose($flink);
?>
<html>
<head>
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>