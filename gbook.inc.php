
<!-- Основные настройки -->
<?php
define('DB_HOST','localhost');
define('DB_LOGIN','root');
define('DB_PASSWORD','');
define('DB_NAME','qbook');
$link=mysqli_connect(DB_HOST,DB_LOGIN,DB_PASSWORD,DB_NAME);
?>
<!-- Основные настройки -->
<!-- Удаление записи из БД -->
<?php
if ($_SERVER['REQUEST_METHOD']=='GET'){
	if (isset($_GET['del'])){
		$delid=(int)$_GET['del'];

		if (strripos($_SERVER['REQUEST_URI'],'&')){
			$i=strripos($_SERVER['REQUEST_URI'],'&');
			$str=substr($_SERVER['REQUEST_URI'],0,($i));
			//echo $str,'<br>';
		}

		$sql="delete from msgs where id='$delid'";
		mysqli_query($link,$sql);
		header('Location: '.$str);
		//exit();
		
		
	}
}
?>
<!-- Удаление записи из БД -->
<!-- Сохранение записи в БД -->
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$name = mysqli_real_escape_string($link, trim(strip_tags($_POST['name'])));
	$email = mysqli_real_escape_string($link, trim(strip_tags($_POST['email'])));
	$msg = mysqli_real_escape_string($link, trim(strip_tags($_POST['msg'])));
	$sql="insert into msgs (name,email,msg) values('$name','$email','$msg')";
	mysqli_query($link,$sql);
}
?>
<!-- Сохранение записи в БД -->


<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<!-- Вывод записей из БД -->
<?php
$sql="select id, name, email, msg, unix_timestamp(datetime) as dt from msgs order by id desc";
$result=mysqli_query($link,$sql);
//header('Location: '.$_SERVER['REQUEST_URI']);
//exit();
$arr=mysqli_fetch_all($result, MYSQL_ASSOC);
$count=count($arr);

echo '<p>Всего записей в гостевой книге - ',$count,'</p>';
	foreach($arr as $msg) {
?>	
	<hr>
	<p>
		<a href="mailto:<?php echo $msg['email']; ?>"><?php echo $msg['name']; ?></a> 
		<?php echo date('d-m-Y H:i:s', $msg['dt']); ?>
		<br>
		<?php echo $msg['msg']; ?>			
	</p>
	<p align="right">
		<a href="<?php echo $_SERVER['REQUEST_URI'].'&del='.$msg['id']; ?>">Delete</a> 
	</p>
	
<?php		
	}
?>

<!-- Вывод записей из БД -->

