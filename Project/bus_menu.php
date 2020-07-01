<!DOCKTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-4">
		<h1>Trasa aktywna. Nacisnij aby zakonczyc <a href="/finish.php">tutaj</a>.</h1>
		<h1>Idziesz trasa <?=$_COOKIE['route']?>. Przystanek: "<?php
		$mysql = new mysqli('localhost','root','','proj_bd');
		$name = $_COOKIE['user'];
		$stop = $mysql->query("SELECT `cur_stop` FROM `users` WHERE `name`='$name'" );
		$stop=$stop->fetch_assoc();
		$stop=$stop['cur_stop'];
		echo $stop;
		?>".</h1>
		<h2>Dodaj sie do trasy.</h2>
		<form action="php/next_st.php" method="post">
		<button class="btn btn-success" type="submit">Next Stop</button>
		</form>
		<form action="php/reg_pas.php" method="post">
		<input type="text" name="login" placeholder="login" class="form-control">
		<input type="password" name="password" placeholder="password" class="form-control">
		<select class="form-control" name="from">
		<?php
			require "php/connect.php";
			$way = $_COOKIE['route'];
			$result = $mysql->query("SELECT stop_name FROM `routes` where route_name='$way'");
			$mysql->close();
			while($catalog = $result->fetch_assoc())
				echo "<option>".$catalog['stop_name']."</option>";
		?>
		</select>
		<select class="form-control" name="to">
		<?php
			require "php/connect.php";
			$way = $_COOKIE['route'];
			$result = $mysql->query("SELECT stop_name FROM `routes` where route_name='$way'");
			$mysql->close();
			while($catalog = $result->fetch_assoc())
				echo "<option>".$catalog['stop_name']."</option>";
		?>
		</select>
		<button class="btn btn-success" type="submit">Dodac sie</button>
		</form>
</body>
</html>