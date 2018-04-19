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
function addToBasket($id){
	global $basket;
	if (array_key_exists($id,$basket)){
		$basket[$id]++;
	} else $basket[$id]=1;
	saveBasket();
}
function myBasket(){
	global $link,$basket;
	$goods=array_keys($basket);
	array_shift($goods);
	$ids=implode(",",$goods);
	$sql="select id,author, title, pubyear, price from catalog where id in ($ids)";
	if (!$result=mysqli_query($link, $sql)) return false;
	$items=result2Array($result);
	//print_r($items);
	mysqli_free_result($result);
	
	return $items;
}
function result2Array($data){
	global $basket;
	$arr=array();
	$row=mysqli_fetch_all($data, MYSQL_ASSOC);
	foreach ($row as $item){
		$item['quantity']=$basket[$item['id']];
		$arr[]=$item;
	}
	return $arr;
}
function deleteItemFromBasket($id){
	global $basket;
	unset ($basket[$id]);
	saveBasket();
}

function saveOrder($datetime,$orderid){
	global $link, $basket;
	$goods=myBasket();
	$stmt=mysqli_stmt_init($link);
	
	$sql='insert into orders (title, author, pubyear, price, quantity, orderid, datetime) values(?,?,?,?,?,?,?)';
	if (!mysqli_stmt_prepare($stmt,$sql)) return false;
	foreach($goods as $item){
		mysqli_stmt_bind_param($stmt,"ssiiisi",$item['title'], $item['author'], $item['pubyear'],$item['price'],$item['quantity'],$orderid,$datetime);
		mysqli_stmt_execute($stmt);
	}
	mysqli_stmt_close($stmt);
	setcookie('Basket');
	return true;
}
function getOrders(){
	global $link;
	if (!is_file(ORDERS_LOG)) return false;
	$orders=file(ORDERS_LOG);
	//print_r($orders);die();
	$allorders=array();
	foreach($orders as $order){
		list($name,$email,$phone,$address,$orderid,$date)=explode("|",$order);
		$orderinfo=array();
		$orderinfo["name"]=$name;
		$orderinfo["email"]=$email;
		$orderinfo["phone"]=$phone;
		$orderinfo["address"]=$address;
		$orderinfo["orderid"]=$orderid;
		$orderinfo["date"]=$date;
		$sql="select title, author, pubyear, price, quantity from orders where orderid='$orderid' and datetime=$date";
		if (!$result=mysqli_query($link,$sql)) return false;
		$items=mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		$orderinfo["goods"]=$items;
		$allorders[]=$orderinfo;
	}
	return $allorders;
}
?>