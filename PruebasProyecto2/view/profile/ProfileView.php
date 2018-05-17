<?php
class ProfileView{


	public static function generaPanel($Persona){
		$echo = "<div class='container' style='margin-top:50px;'>";
		$echo .= "<div class='card'>";
		$echo .= "<div class='card-header'><h3>". $Persona->getNickName() . ": Mi perfil. </h3></div>";
		$echo .= "<div class='card-body'>";
		$echo .= "<form class='updateUsr'>";
		$echo .= "<div class='form-group'><label for='#nick'>NickName</label><input type='text' class='form-control' value='".$Persona->getNickName()."' id='nick' name='nick'/></div>";
		$echo .= "<div class='form-group'>
					<label for='#pass'>Password</label>
					<div class='input-group'>
						<div class='input-group-prepend btn btn-outline-secondary' id='vista' ><i class='far fa-eye-slash'></i></div>
						<input type='password' class='form-control' value='".$Persona->getPassword()."' id='pass' name='pass'/>
					</div>
				</div> ";
		$echo .= "<div class='form-group'><label for='#name'>Nombre</label><input type='text' class='form-control disabled' value='".$Persona->getNombre()."' id='name' name='name' disabled/></div>";
		$echo .= "<div class='form-group'><label for='#ap'>Apellidos</label><input type='text' class='form-control disabled' value='".$Persona->getApellidos()."' id='ap' name='ap' disabled/></div>";
		$echo .= "<div class='form-group'><label for='#correo'>e-mail</label><input type='email' class='form-control' value='".$Persona->getEmail()."' id='correo' name='mail'/></div>";
		$echo .="<input type='hidden' value='".$Persona->getCodUsuario()."' id='cod' name='cod'/>"; 
		$echo .= "<input type='submit' value='GuardarCambios' class='btn btn-outline-primary'/>";
		$echo .= "</form>";
		$echo .= "</div>";
		$echo .= "</div>";
		$echo .= "<script type='text/javascript' src='./utils/sanitizeInputs.js'></script>";
		$echo .= "<script type='text/javascript' src='./utils/updateUsr.js'></script>";

		return $echo;
	}
}
?>