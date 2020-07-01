<!DOCKTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="JavaScript/register_bus.js"></script>
</head>
<body>
	<?php
	if($_COOKIE['user']!=''):
	?>
	<?php
	require "shapka.html";
	?>
	<div class="container">
	<h1>Rejestracja trasy</h1></br>
	<form action="php/reg_bus.php" method="post">
		<input type="text" class="form-control" name="route" placeholder="Wpisz nazwę trasy"></br>
		<div class="inp"><input type="text" class="form-control" name="name[]" placeholder="Wpisz nazwę przystanku"><input type="text" class="form-control w-25" name="price[]" placeholder="Cena"></div></br>
		<div id="input0"></div>
		<input type="button" class="form-control" value="Dodaj przystanek" onclick="addInput()"></br></br>
		<button class="btn btn-success" type="submit">Zarejestrować</button>
	</form>
	</div>
	<?php endif;?>
</body>
</html>