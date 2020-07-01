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
	<h1>Rejestracja nowego pasazera</h1>
	<form action="php/create_pas.php" method="post">
		<input type="text" class="form-control" name="name" id="name" placeholder="Imie"></br>
		<input type="text" class="form-control" name="login" id="login" placeholder="Login"></br>
		<input type="password" class="form-control" name="pass" id="pass" placeholder="Haslo"></br>
		<button class="btn btn-success" type="submit">Dodac</button>
	</form>
	</div>
	<?php endif;?>
</body>
</html>