<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$money = filter_var(trim($_POST['money']), FILTER_SANITIZE_STRING);
	require "connect.php";
	$result = $mysql->query("UPDATE passengers set `money`=`money`+'$money' where `login`='$login'");
	$mysql->close();
	header('Location: /index.php');
?>