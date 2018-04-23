<?php
class User{
	public $name;
	public $login;
	public $password;
	public function showInfo(){
		echo 'Имя пользователя: ',$this->name;
		echo ' Логин: ',$this->login;
		echo ' Пароль: ',$this->password;
		$this->myHr();
	}
	public function myHr(){
		echo '<hr/>';
	}
	public function __construct($name,$login,$password){
		$this->name=$name;
		$this->login=$login;
		$this->password=$password;
	}
	public function __destruct(){
		echo 'Пользователь ',$this->name,' удален';
		$this->myHr();
	}
	public function __clone(){
		$this->name='';
		$this->login='';
		$this->password='';
	}
}
$user1=new User('Вася','vasya23','123456');
$user2=new User('Света','Sveta','123456');
$user3=new User('Таня','tanushka','123456');
$user4=clone $user3;

echo $user1->showInfo();
echo $user2->showInfo();
echo $user3->showInfo();
echo $user4->showInfo();
?> 