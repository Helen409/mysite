<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>Корзина пользователя</title>
</head>
<body>
	<h1>Ваша корзина</h1>
<?php

?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, грн.</th>
	<th>Количество</th>
	<th>Удалить</th>
</tr>
<?php
	//global $basket;
	//print_r($basket);
		$i=0;
		$sum=0;
	if (count($basket==1)){
		echo '<A href="catalog.php">товаров в корзине нет, вернуться в каталог</a><p></p>';
	}else{
		$items=myBasket();

		foreach ($items as $item){
			$i++;$sum+=$item['price'];
	?>
	<tr>
		<td><?php echo $item['title']?></td>
		<td><?php echo $item['author']?></td>
		<td><?php echo $item['pubyear']?></td>
		<td><?php echo $item['price']?></td>
		<td><a href="delete_from_basket.php?id=<?php echo $item['id'];?>">В корзину</a></td>
<?php
}}
//echo '<p>Всего товаров в корзине: ',$i,' на сумму ',$sum;
	
?>
</table>

<p>Всего товаров в корзине <?php echo $i?> на сумму: <?php echo $sum?> грн.</p>

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'" />
</div>

</body>
</html>







