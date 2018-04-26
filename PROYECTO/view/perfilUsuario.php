<?php
include_once("../DATA/Persona.php");
include_once("../DATA/operacionesDB.php");
session_start();
$personas = OpDb::selectUsuarioCod($_SESSION['sesion']['CodUsr']);
if($personas== null){echo "PROBLEMOS";}
?>
<div class="container marginTop">
	<div class="card">
		<div class="card-header">
			<h3>Perfil de: <?= $personas->getCodUsuario() ?></h3>
		</div>
		<div class="card-body">
			<form action="">
				<label>Nombre: </label>
				<input type="text" name="" value="<?=$personas->getNombre()?>"><br/>
				<label>Apellidos: </label>
				<input type="text" name="" value="<?=$personas->getApellido()?>"><br/>
				<label>NickName: </label>
				<input type="text" name="" value="<?=$personas->getUsuario()?>"><br/>
				<label>Password: </label>
				<input type="password" name="" value="<?=$personas->getPass()?>"><br/>
				<label>Email: </label>
				<input type="email" name="" value="<?=$personas->getMail()?>"><br/>

			</form>
			<?TODO esto?>
		</div>
	</div>
</div>