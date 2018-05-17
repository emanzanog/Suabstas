<?php


?>
	

	<nav class="navbar navbar-dark bg-dark">
		<a href="./index.php" class="navbar-brand"><img src="favicon.png" width="50px" />SubastasBastas</a>
		<form action="#" class="form-inline">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		<div>
			<?php
			if($sesion_abierta){
			?>
			<a href="#" title="Mi Perfil" id="profile" class="btn btn-outline-success"><span id="profNick"><?=$_SESSION['sesion']['nickName']?></span> <i class="far fa-user"></i></a>

			<a title="Mi Correo" id="mail" href="#" class="btn btn-outline-secondary"><span id="numMsg"></span><i class="far fa-envelope"></i></a>

			<a href="#" title="Mis Subastas" id="upload" class="btn btn-outline-primary"><i class="fas fa-gavel"></i></a>

			<a href="./login/logout.php" title="Desconéctate" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i></a><?php
			}else{
			?>
			<a href="./login/login.php" title="Inicia Sesión" id="profile" class="btn btn-outline-success">Inicia Sesión <i class="far fa-user"></i></a>
			<?php
			}

			?>

			
		</div>
	</nav>
	<script type="text/javascript">
		
	</script>




