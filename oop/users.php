<?php
/*function __autoload($class_name){
	$filename=$class_name.'.class.php';
	require_once ($filename);
}*/

include ('User.class.php');
include ('SuperUser.class.php');
include ('Auser.class.php');
include ('ISuperUser.class.php');




$user1=new User('Вася','vasya23','123456');
$user2=new User('Света','Sveta','123456');
$user3=new User('Таня','tanushka','123456');
$user4=clone $user3;
$suser=new SuperUser('Администратор','admin','qwerty','admin');
echo $user1->showInfo();
echo $user2->showInfo();
echo $user3->showInfo();
echo $user4->showInfo();
echo $suser->showInfo();
$s=get_class($suser);
echo $suser->getInfo($s);

abstract class Car{
	public $petrol;
	abstract function startEngine();
	abstract function stopEngine();
}
class Toyota extends Car{
	function startEngine(){
		
	}
	function stopEngine(){
		
	}
}
$toyota=new Toyota();

?> 