<!DOCKTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<?php
		if($_COOKIE['user']==''):
	?>
	<div class="container mt-4">
	<h6><a href="authorize.html">Sign in</a></h6>
	<h1>Forma Rejestracji</h1>
	<form action="php/check.php" method="post">
		<input type="text" class="form-control" name="name" id="name" placeholder="Wpisz imie"></br>
		<input type="text" class="form-control" name="login" id="login" placeholder="Wpisz Login"></br>
		<input type="password" class="form-control" name="pass" id="pass" placeholder="Wpisz haslo"></br>
		<button class="btn btn-success" type="submit">Zarejestrowac</button>
	</form>
	</div>
	<?php else: ?>
	<?php
	require "shapka.html";
	?>
		<div class="container mt-4">
		<h1><?=$_COOKIE['user']?>, jestes zalogowany! Udalej pracy.</h1>
		</div>
	<?php endif;?>
</body>
</html>