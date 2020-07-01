<?php
	$name = $_COOKIE['user'];
	require "connect.php";
	$stop = $mysql->query("SELECT `cur_stop` FROM `users` WHERE `name`='$name'" );
	$stop = $stop->fetch_assoc();
	$stop = $stop['cur_stop'];
	$way = $_COOKIE['route'];
	$number = $mysql->query("SELECT `stop_number` FROM `routes` WHERE `stop_name`='$stop' and `route_name`='$way'" );
	$number = $number->fetch_assoc();
	$number = $number['stop_number']+1;
	$new = $mysql->query("SELECT `stop_name` FROM `routes` WHERE `stop_number`='$number' and `route_name`='$way'" );
	$new = $new->fetch_assoc();
	if(count($new)==0)
	{
		$new = $mysql->query("SELECT `stop_name` FROM `routes` WHERE `stop_number`=0 and `route_name`='$way'" );
		$new = $new->fetch_assoc();
		$new = $new['stop_name'];
		$result = $mysql->query("UPDATE users set `cur_stop`='$new' where `name`='$name'");
		$resul = $mysql->query("UPDATE `passengers` set `driver`=NULL, `active_to`=NULL where `driver`='$name' and `active_to`='$new'");
	}
	else
	{
	$new = $new['stop_name'];
	$result = $mysql->query("UPDATE users set `cur_stop`='$new' where `name`='$name'");
	$resul = $mysql->query("UPDATE `passengers` set `driver`=NULL, `active_to`=NULL where `driver`='$name' and `active_to`='$new'");
	}
	$mysql->close();
	header('Location: /bus_menu.php');
?>