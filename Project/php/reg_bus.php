<?php
	$route_name = filter_var(trim($_POST['route']), FILTER_SANITIZE_STRING);
	if(mb_strlen($route_name)==''){
		echo "Niedostepna nazwa.";
		exit();
	}
	
	require "connect.php";
	$valid = $mysql->query("SELECT DISTINCT `route_name` FROM `routes` WHERE `route_name`='$route_name'");
	$route = $valid->fetch_assoc();
	if(count($route)!=0)
	{
		echo "Taka trasa juz istnieje!";
		exit();
	}
	for($i=0; $i<count($_POST['name']); $i++)
	{
		$name = $_POST['name'][$i];
		$price = $_POST['price'][$i];
		$mysql->query("INSERT INTO `routes` (`route_name`, `stop_number`, `stop_name`, `price`) VALUES('$route_name', '$i', '$name','$price')");
	}
	$mysql->close();
	header('Location: /index.php');
?>