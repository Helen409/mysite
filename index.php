<?php include 'cookie.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<?php 

include 'data.php';

	//инициализация заголовков 
	$title='Сайт нашей школы';
	$header="$welcome, Гость!";
	$id=strtolower(strip_tags(trim($_GET['id'])));
	switch($id){
		case 'about':$title='О сайте';
		             $header='О нашем сайте';
								 break;
		case 'contact':$title='Контакты';
		             $header='Обратная связь';
								 break;
		case 'table':$title='Таблица умножения';
		             $header='Таблица умножения';
								 break;
		case 'calc':$title='Онлайн калькулятор';
		             $header='Калькулятор';
								 break;
	 }	
	 ?>
	<head>
		<!-- Заголовок -->
		<title><?php echo $title?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
  </head>
	
	<body>
	<?php include 'data.php';?>
	<!-- Верхняя часть страницы -->
	<?php include 'header.php';?>
	<!-- Верхняя часть страницы -->

	<!-- Область основного контента -->
	<div id="content">
	<!-- Заголовок -->
	<h1><?php echo $header?></h1>
	<!-- Заголовок -->
	<?php
		echo "Сегодня $day $month $year года, $hour часов $min минут<br>";
		//echo $visitcounter;
			 if($visitCounter == 1){
				echo "Спасибо что зашли на огонёк";
				} else {
					echo "Вы зашли к нам $visitCounter раз<br>";
					echo "Последнее посещение $lastVisit";
				} 
		
	?>
	<?php
	switch ($id){
		case 'about':include 'about.php';break;
		case 'contact':include 'contact.php';break;
		case 'table':include 'table.php';break;
		case 'calc':include 'calc.php';break;
		default:	include 'content.php';
	}

?>
	</div>
	<!-- Навигация -->
	<!-- Меню -->
	<?php include 'menu.php';?>
	<!-- Меню -->
	<!-- Навигация -->
	<!-- Нижняя часть страницы -->
	<?php include 'footer.php';?>
	<!-- Нижняя часть страницы -->


	</body>
</html>