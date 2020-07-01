<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
	
	$pass = md5($pass."salozmajonezom");
	
	require "connect.php";
	$result = $mysql->query("SELECT * FROM `users` WHERE `login`='$login' and `password`='$pass'" );
	$user = $result->fetch_assoc();
	if(count($user) == 0) {
		echo "Nie ma takiego uzytkownika.";
		exit();
	}
	setcookie('user', $user['name'], time()+3600*24,"/");
	$mysql->close();
	
	header('Location: /index.php');
?>