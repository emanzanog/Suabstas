<?php
require_once("../DATA/Mensaje.php");
require_once("../DATA/operacionesDB.php");
session_start();
$mensajes  = OpDb::getMsg($_SESSION['sesion']['CodUsr']);
$contenido = array();

include_once("./msgCabecera.php"); 
?>
<div class="container marginTop msgs">
	<?php
	if($mensajes){
		include_once("../Business/initMsg.php");
	}
	?>
</div>

<script type="text/javascript">
	$(function(){
		$(".leido").click(function(evt){
			$(this).removeClass("leido");
			$.ajax({
				url : "./Business/changeState.php",
				method : "POST",
				data : {"CodMensaje" : $(this).attr("data")}
			}).done(cambiaBorder).fail(mensajeError);
		});
	});
	function cambiaBorder (data){
		console.log(data);
		
	}
	function mensajeError(){
		console.log("POS SI QUE HAY ERROR");
	}
</script>