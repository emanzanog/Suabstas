$("#formMsg").submit(function (evt){
	evt.preventDefault();
	var dest = $("#destinatario");
	var asunto = $("#asunto");
	var mensaje = $("#mensaje");
	asunto.val(parseComillas(asunto.val()));
	mensaje.val(parseComillas(mensaje.val()));
	var todoBien = true;

	if(dest.val().length<=0 || !sanitize(dest.val())){
		todoBien = false;
		dest.css({"border-color":"red"});
	}else{
		dest.css({"border-color":""});
	}
	if(asunto.val().length<=0){
		todoBien = false;
		asunto.css({"border-color":"red"});
	}else{
		asunto.css({"border-color":""});
	}

	if(mensaje.val().length<=0){
		todoBien = false;
		mensaje.css({"border-color":"red"});
	}else{
		mensaje.css({"border-color":""});
	}

	if(todoBien){
		$.ajax({
			url: "./Controller/MsgController.php",
			method: "POST",
			data:{"metodo": "insertMensaje", "receptor":dest.val(), "asunto":asunto.val(), "mensaje": mensaje.val()}
		}).done(function (response){
			if(response){
				$("cuerpo").load("./Controller/MsgController.php",{"metodo": "creaPantalla"});
			}else{
				console.log("Uncaught Error: invalid response data.");
			}
		}).fail(function (){
			console.log("Connection Error: Couldn't Access MsgController.");
		});
	}else{
		console.log("Uncaught Error: Some input value's missing.");
	}

});

$('#destinatario').keyup(function(){
    //Obtenemos el value del input
    var service = $(this).val();   
    if(service.length > 0){
    	var dataString = 'service='+service;
    	$("#suggestions").load("./Controller/MsgController.php",{"metodo" : "buscaSugestiones","valor": service});
    }else{
    	$("#suggestions > *").detach();
    }
});

$("#suggestions").on("click",".sugg",function(evt){
	//SE van sumando las acciones, esto puede causar un generoso problema de rendimiento en casos extremos
	// (alguien cambiando 2 millones de veces el destinatario en vez de enviarlo)
	/** 
	*	ARREGLADO (ESTABA DENTRO DEL KEYUP Y SE IBAN CLONANDO LOS TRIGGERS)
	*/
	$("#suggestions > *").detach();
	evt.preventDefault();
	console.log("Updating '#destinatario' setting value to: "+ $(this).text());
	$('#destinatario').val($(this).text());
	return false;
});                
