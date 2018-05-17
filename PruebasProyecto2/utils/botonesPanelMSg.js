$(".leer").each(function(){
	$(this).click(function(evt){
		if(confirm("¿SEGURO?")){
			var codM = $(this).attr("data");
			evt.preventDefault();
			$.ajax({
				url : "./Controller/MsgController.php",
				method : "POST",
				data: {"metodo" : "leido", "codMsg" : codM}
			}).done(function(response){
				if(response){
					console.log("Message Updated, loading MsgController");
					$("cuerpo").load("./Controller/MsgController.php",{"metodo":"creaPantalla"});
				}else{
					console.log("Uncaught Error: Couldn't change message state");
				}
			}).fail(function(){
				console.log("Error Loading MsgController.php in botonesPanelMSg");
			});
		}

	});
});

$(".borrar").each(function(){
	$(this).click(function(evt){
		if(confirm("¿SEGURO?")){
			var codM = $(this).attr("data");
			//console.log(codM);
			evt.preventDefault();
			$.ajax({
				url : "./Controller/MsgController.php",
				method : "POST",
				data: {"metodo" : "borrarMsg", "codMsg" : codM}
			}).done(function(response){
				//console.log(response);
				if(response){
					console.log("Message Deleted, loading MsgController");
					$("cuerpo").load("./Controller/MsgController.php",{"metodo":"creaPantalla"});
				}else{
					console.log("Uncaught Error: Couldn't delete message");
				}
			}).fail(function(){
				console.log("Error Deleting MsgController.php in botonesPanelMSg");
			});
		}

	});
});