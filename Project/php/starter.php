<?php
	setcookie('route', $_POST['way'], time()+3600*24,"/");
	$route = $_POST['way'];
	require "connect.php";
	$user = $_COOKIE['user'];
	$stop = $mysql->query("SELECT `stop_name` FROM `routes` WHERE `route_name`='$route' and `stop_number`=0" );
	$stop = $stop->fetch_assoc();
	$stop = $stop['stop_name'];
	$result = $mysql->query("UPDATE users set `cur_stop`='$stop' where `name`='$user'");
	$mysql->close();
	header('Location: /bus_menu.php');
?>