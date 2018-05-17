$("#newMsg").click(function(evt){
	evt.preventDefault();
	$("cuerpo").load("./Controller/MsgController.php",{"sesion" : sesion, "metodo": "nuevoMensaje"});
	return false;
});
