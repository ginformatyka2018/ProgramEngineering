<!DOCKTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<?php
		if($_COOKIE['user']!=''):
	?>
	<?php
	require "shapka.html";
	?>
	<div class="container mt-4">
	<ul class="list-group">
	<?php
	require "php/connect.php";
	$result = $mysql->query("SELECT id, name, login, money FROM `passengers`");
	$mysql->close();
	while($catalog = $result->fetch_assoc())
		echo '<li class="list-group-item">'.$catalog['id'],' - ', $catalog['login'],' - ',$catalog['name'],' - ',$catalog['money']."</li>";
	?>
	<?php endif;?>
	</ul>

</body>
</html>
