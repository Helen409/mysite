<?php
function addItemToCatalog($title, $author, $pubyear, $price){
	global $link;
	$sql='insert into catalog (title,author,pubyear, price) values(?,?,?,?)';
	if (!$stmt=mysqli_prepare($link,$sql)) return false;
	mysqli_stmt_bind_param($stmt,"ssii",$title, $author, $pubyear, $price);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
	
}
function selectAllItems(){
	global $link;
	$sql='select id,title,author,pubyear,price from catalog';
	if (!$result=mysqli_query($link,$sql)) return false;
	$items=mysqli_fetch_all($result,MYSQLI_ASSOC);
	mysqli_free_result($result);
	return $items;
}	
function saveBasket(){
	global $basket;
	$basket=base64_encode(serialize($basket));
	setcookie('basket', $basket, 0x7FFFFFFF);
	
}
	/*function uniqid(){
		$i=0;$len=15;
		$chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$pass='';		
		for ($i=0;$i<$len;$i++){
			$c=$chars{rand(0,strlen($chars))};
			$pass=$pass.$c;
		} 
		return $pass;
	}*/
	
function basketInit(){
	global $basket, $count;
	if (!isset($_COOKIE['basket'])){
		$basket=array('orderid'=>uniqid());
		savebasket();
	}else{
		$basket=unserialize(base64_decode($_COOKIE['basket']));
		$count=count($basket)-1;
	}
}
?>