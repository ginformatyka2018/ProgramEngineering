<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	$route = $_COOKIE['route'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$pass = md5($pass."salozmajonezom");
	$driver = $_COOKIE['user'];
	require "connect.php";
	$result = $mysql->query("UPDATE passengers set `active_to`='$to', `driver`='$driver' where `login`='$login'");
	$result = $mysql->query("SELECT money FROM `passengers` WHERE `login`='$login' and `password`='$pass'" );
	$money = $result->fetch_assoc();
	$money = $money['money'];
	$from = $mysql->query("SELECT stop_number FROM `routes` WHERE `route_name`='$route' and stop_name='$from'" );
	$from = $from->fetch_assoc();
	$from = $from['stop_number'];
	$to = $mysql->query("SELECT stop_number FROM `routes` WHERE `route_name`='$route' and stop_name='$to'" );
	$to = $to->fetch_assoc();
	$to = $to['stop_number']-1;
	$price = $mysql->query("SELECT SUM(`price`) as `sum` from `routes` WHERE `route_name`='$route' and stop_number BETWEEN '$from' and '$to-1'");
	$price = $price->fetch_assoc();
	$price = $price['sum'];
	if($money<$price){
		echo "Недостатньо коштів для проїзду!";
		exit();
	}
	else{
		echo "Ви можете проїхати.";
		$result = $mysql->query("UPDATE passengers set `money`=`money`-'$price' where `login`='$login'");
	}
	$mysql->close();
?>