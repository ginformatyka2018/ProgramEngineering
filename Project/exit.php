<?php
	$user = $_COOKIE['user'];
	require "php/connect.php";
	$result = $mysql->query("UPDATE users set `cur_stop`=NULL where `name`='$user'");
	$resul = $mysql->query("UPDATE `passengers` set `driver`=NULL, `active_to`=NULL where `driver`='$user'");
	$mysql->close();
	setcookie('user', $user, time()-3600*24,"/");
	setcookie('route', $route, time()-3600*24,"/");
	header('Location: /');
?>