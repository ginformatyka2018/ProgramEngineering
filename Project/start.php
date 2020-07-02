<!DOCKTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<?php
	if($_COOKIE['user']!='' AND $_COOKIE['route']==''):
	?>
	<?php
	require "shapka.html";
	?>
	<div class="container mt-4">
	<h1>Rozpoczac trase</h1>
		<form action="php/starter.php" method="post">
			<select class="form-control" name="way">
			<?php
			require "php/connect.php";
			$result = $mysql->query("SELECT DISTINCT route_name FROM `routes`");
			$mysql->close();
			while($catalog = $result->fetch_assoc())
				echo "<option>".$catalog['route_name']."</option>";
			?>
			</select></br>
			<button class="btn btn-success" type="submit">Поїхали!</button>
		</form>
	</div>
	<?php endif;?>
</body>

</html>
