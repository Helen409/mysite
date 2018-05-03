class User extends AUser{
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