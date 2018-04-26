<?php

?>

<nav class="navbar navbar-light bg-light">
	<div>
		<a href="#" title="Nuevo Mensaje" id="newMsg" class="btn btn-outline-primary"><i class="far fa-plus-square"></i> Nuevo Mensaje</a>
		<a href="#" title="Borrar Mensajes" id="borrarMsg" class="btn btn-outline-danger  <?php	if(!$mensajes){ echo " disabled";}?>"><i class="far fa-trash-alt"></i> Borrar Mensajes</a>
	</div>
</nav>
<script type="text/javascript">
	$("#newMsg").click(function(evt){
		evt.preventDefault();
		$(".msgs").load("./view/newMsg.php");

		return false;
	});
	$("#borrarMsg:not(.disabled)").click(function(evt){
		evt.preventDefault();
		$(".msgs").load();

		return false;
	});
</script>