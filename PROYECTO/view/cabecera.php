<?php
	$usr = $_SESSION['sesion']['usr'];
	$codUsr = $_SESSION['sesion']['CodUsr'];
	include_once("./DATA/operacionesDB.php");
	$msgs= OpDb::getMsgNuevos($codUsr);
?>
	

	<nav class="navbar navbar-dark bg-dark">
		<a href="./index.php" class="navbar-brand"><img src="favicon.png" width="50px" />SubastasBastas</a>
		<form action="#" class="form-inline">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		<div>

			<a href="#" title="Mi Perfil" id="profile" class="btn btn-outline-success"><?=$usr?> <i class="far fa-user"></i></a>

			<a title="Mi Correo" id="mail" href="#" class="btn btn-outline-secondary"><?=$msgs?> <i class="far fa-envelope"></i></a>

			<a href="#" title="Sube un producto" id="upload" class="btn btn-outline-primary"><i class="fas fa-upload"></i></a>

			<a href="./AC/logout.php" title="Desconéctate" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i></a>
		</div>
	</nav>

