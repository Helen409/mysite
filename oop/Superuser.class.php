class SuperUser extends User implements ISuperUser{
	public $role='Администратор';	
	public $arr;
	public function showInfo(){
		parent::ShowInfo();
		echo 'Роль: ',$this->role;
		$this->myHr();
	}
	public function __construct($name,$login,$password,$role){
		parent::__construct($name,$login,$password);
		$this->role=$role;
		
	}
	function getInfo($nameclass){
		$arr=get_class_vars($nameclass);
		foreach ($arr as $name => $value) {
				echo "$name : $value",'<br>';
		}
		echo '<hr>';
	}

}