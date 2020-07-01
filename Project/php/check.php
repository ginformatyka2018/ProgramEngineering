<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
	if(mb_strlen($login)<5 || mb_strlen($login)>32){
		echo "Niepoprawna dlugosc loginu.";
		exit();
	}
	if(mb_strlen($name)<3 || mb_strlen($name)>32){
		echo "Niepoprawna dlugosc imiona.";
		exit();
	}
	if(mb_strlen($pass)<8 || mb_strlen($pass)>32){
		echo "Niepoprawna dlugosc hasla.";
		exit();
	}
	
	require "connect.php";
	$valid = $mysql->query("SELECT * FROM `users` WHERE `login`='$login'");
	$user = $valid->fetch_assoc();
	if(count($user) != 0) {
		echo "Uzytkownik juz istnieje! Zmien login!";
		exit();
	}
	$pass = md5($pass."salozmajonezom");
	$mysql->query("INSERT INTO `users` (`name`, `login`, `password`) VALUES('$name', '$login', '$pass')");
	$mysql->close();
	header('Location: /index.php');
?>