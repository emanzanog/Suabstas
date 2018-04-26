<?php ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
</head>
<body>

	<div class="container col-sm-12 col-md-6">
		<div class="card">
			<div class="card-header">Registro</div>
			<form action="./registro.php" method="post" class="card-body">
				<div class="form-row">
					<div class="form-group col-lg-6 col-sm-12 col-xs-12">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control form-control-lg" name="nombre" id="nombre" placeholder="Nombre">
					</div>
					<div class="form-group col-lg-6  col-xs-12">
						<label for="apll">Apellidos</label>
						<input type="text" class="form-control form-control-lg" name="apell" id="apll" placeholder="Apellidos">
					</div>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">@</div>
						</div>
						<input type="email" class="form-control form-control-lg" name="mail" id="email" placeholder="algo@ejemplo.com">

					</div>
				</div>
				<div class="form-group">
					<label for="usr">Nombre de Usuario</label>
					<input type="text" class="form-control form-control-lg" name="usr" id="usr" placeholder="Usuario">
				</div>
				<div class="form-group">
					<label for="pass">Contraseña</label>
					<input type="password" class="form-control form-control-lg" name="pass" id="pass" placeholder="Contraseña...">
				</div>
				<div class="form-group">
					<label for="pass2">Repite la contraseña</label>
					<input type="password" class="form-control form-control-lg" id="pass2" placeholder="Contraseña...">
				</div>
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="gridCheck">
						<label class="form-check-label" for="gridCheck">
							Soy mayor de 18 años.
						</label>
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-lg">Adjudicado!</button>
				</div>
			</form>
			<h6 class="text-center	">¿Ya estás registrado? <a href="./login.php">Inicia sesión</a></h6>
		</div>
	</div>



	<script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
</body>
</html>