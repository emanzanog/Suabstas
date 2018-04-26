<?php
session_start();
?>
<form id="formMsg">
  <div class="form-group">
    <label for="destinatario">Para: </label>
    <input type="text" class="form-control" id="destinatario" name="usrRecep"/>
  </div>
  <div class="form-group">
    <label for="asunto">Asunto: </label>
    <input type="text" class="form-control" id="asunto" name="asunto" />
  </div>
  <div class="form-group">
    <label for="mensaje">Mensaje: </label>
    <textarea class="form-control" id="mensaje" rows="3" name="mensaje"></textarea>
  </div>
  <button type="submit" class="btn btn-outline-primary" id="enviar">Enviar</button>
</form>

<script type="text/javascript">
	$("#formMsg").submit(function(evt){
		evt.preventDefault();
		if(compruebaInputs()){
			$.ajax({
				url: "./Business/insertMsg.php",
				method: "POST",
				data: {
					"destinatario" : $("#destinatario").val(),
					"asunto" : $("#asunto").val(),
					"mensaje": $("#mensaje").val()
				}
			}).done(successFunction).fail(failFunction);
			return false;
		}else{
			console.log("alguno vacío");
		}	
		

	});
	function successFunction(data){
		if(data){
			$(".contenido").load("./view/msgpage.php");
		}
	};
	function failFunction(){
		console.log("NI SE CONECTA");
	};
	function compruebaInputs(){
		var llenos = true;
		$("#formMsg .form-control").each(function(){
			if($(this).val().length <=0){
				llenos = false;
			}
		});
		return llenos;
	}

</script>