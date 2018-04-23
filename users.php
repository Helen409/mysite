<?php
class User{
	public $name;
	public $login;
	public $password;
	public function showInfo(){
		echo 'Имя пользователя: ',$name;
		echo 'Логин: ',$login;
		echo 'Пароль: ',$password;
	}
}
$user1=new User('Вася', 'vasya23', '123456');
$user2=new User('Света', 'Sveta', '123456');
$user3=new User('Таня', 'tanushka', '123456');
echo $user1->showInfo();
echo $user2->showInfo();
echo $user3->showInfo();
?> 