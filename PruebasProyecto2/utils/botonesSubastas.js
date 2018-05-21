$("#newAuction").click(function(evt){
	$("cuerpo").load("./Controller/AuctionController.php",{"metodo" : "newSubasta"});
});

$("#fInicio").change(function(evt){
	console.log("va lento");
	evt.preventDefault();
	var fechaElegida = $(this).val();
	var fechaFin= dateAddDays(fechaElegida,30);
	var fechaFinInit = dateAddDays(fechaElegida,15);
	$("#fFinal").attr("value",fechaFinInit);
	$("#fFinal").attr("min",fechaElegida);
	$("#fFinal").attr("max",fechaFin);
});

function dateAddDays( /*string yyyy/mm/dd*/ fechaString, /*int*/ diasExtra){
  var temp = fechaString;
  var newDate =  new Date(temp);
  newDate.setDate(newDate.getDate()+diasExtra || 1);
  var date = [[ newDate.getFullYear() 
          ,formatFechas(newDate.getMonth()+1, 10)
          ,formatFechas(newDate.getDate(), 10)].join('-')
	          ,[	formatFechas(newDate.getHours(),10)
	          		,formatFechas(newDate.getMinutes(),10)
	          	].join(":")
	       ].join("\T");
  return date;
}

function formatFechas(nr, base){
  var len = (String(base).length - String(nr).length) + 1;
  return len > 0? new Array(len).join('0') + nr : nr;
}

$("form#newSubasta").submit(function(e) {
    e.preventDefault();
    var nombre = $("#nombreProd").val().replace(/ /g,"_");
    var precio = $("#precio").val();
    var desc = $("#desc").val();
	var categoria = $("#cat").val();
	var fechaInicio = $("#fInicio").val();
	var fechaFin = $("#fFinal").val();
	// var ficheros = $("#imgs")[0].files;
	var ficheros = $("#imgs").prop("files");
	// var fileNames =[];
	// PROBANDO COSAS
	
	/*console.log(ficheros);
	console.log(ficheros[0]);
	console.log(ficheros[1]);*/
	var imgsSubir ;
	var formds = $("form#newSubasta")[0];
	var formData = new FormData();
	var Images = true;

	$.each(ficheros,function(i, file) {
		console.log($(this));
    	formData.append('file[]', file);
    	// formData.append('image'+i, file);
	});
	for (var i = 0; i < ficheros.length; i++) {
		if(isImage(ficheros[i].name)){
			// formData.append("image"+i, );
		}else{
			Images = false;
			break;
		}
		
	}
	/*if(fileNames.length <= 0) {
		Images = false;
	}*/
	var todoBien = true;
	if(!Images){
		todoBien = false;
		$("#imgs").css({"border-color":"red"});
		$("label[for='#imgs']").css({"color":"red"});
	}else{
		$("#imgs").css({"border-color":""});
		$("label[for='#imgs']").css({"color":""});
	}
	if(!sanitizeNames(nombre) || nombre.length ==0){
		todoBien = false;
		console.log(sanitizeNames(nombre));
		$("#nombreProd").css({"border-color":"red"});
	}else{
		$("#nombreProd").css({"border-color":""});
	}
	
	if(Images && ficheros.length > 0){
		
		$.ajax({
			url: "./utils/uploadImg.php",
			method : "POST",
			contentType: false,
			processData :  false,
			cache: false,
			data:formData
		}).done(function (data){
			if(data)
			imgsSubir = JSON.parse(data);
			//console.log(imgsSubir);
			if(todoBien){
				$.ajax({
					url: "./Controller/AuctionController.php",
					method : "POST",
					data:{"metodo" : "store", "nombreProd":nombre,"desc":desc, "precio" : precio, "categoria" : categoria, "fInicio" : fechaInicio, "fFin":fechaFin, "image":(imgsSubir != undefined)?imgsSubir:"0" }
				}).done(function (response){
					console.log(response);
					$("cuerpo").load("./Controller/AuctionController.php",{"metodo":"principal"});

				}).always(function(){
					console.log("ENTRAR ENTRA");
				});
			}
			
		});
		
	}
	

	
	
	


    
    


});

function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}

function isImage(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'jpg':
    case 'gif':
    case 'bmp':
    case 'png':
        //etc
        return true;
    }
    return false;
}


$(".datosSubasta").on("click",function(evt){
	$("cuerpo").load("./Controller/AuctionController.php",{"metodo":"expandSubasta","codSubasta":$(this).attr("cod")});
});