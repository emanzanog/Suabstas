$(function(){
	var tiempoRestante= undefined;	
	var timer;
	$.ajax({
		url : "./Controller/AuctionController.php",
		method: "POST",
		data : {"metodo":"tiempoSubasta", "codSubasta": $("#tiempoRestante").attr("data")}
	}).done(function (response){
		// console.log(response);
		var json = JSON.parse(response);
		tiempoRestante = json*1000;
		timer = setInterval(comprueba,1000);

	});


	
	function formatearTiempoRestante(fechaFin){
		var fechaActual = new Date();
	// Tomar todos los segundos que diferencian con respecto a la fecha final
		var dif = Math.abs(fechaFin - fechaActual) / 1000;

		// calcula y resta los dias
		var days = Math.floor(dif / 86400);
		dif -= days * 86400;

		// calcula y resta las horas
		var hours = Math.floor(dif / 3600) % 24;
		dif -= hours * 3600;

		// calcula y resta los minutos
		var minutes = Math.floor(dif / 60) % 60;
		dif -= minutes * 60;

		// lo que queda son segundos
		var seconds = Math.floor(dif % 60);

		return new Array(formatFechas(days, 10), formatFechas(hours, 10), formatFechas(minutes, 10), formatFechas(seconds, 10));
	}

	function comprueba (){
		if(tiempoRestante - (new Date()) <=0){
			clearInterval(timer);
			$.ajax({
				url: "./Controller/AuctionController.php",
				method: "POST",
				data: {"metodo":"finishAuction","codSubasta":$("#tiempoRestante").attr("data")}
			}).done(function(data){
				console.log("finish");
			});
			$("#tiempoRestante").text("SE ACABÓ");
		}else{
			var tiempo = formatearTiempoRestante(tiempoRestante);

			if(tiempo[0]<=0 && tiempo[1] <= 0 && tiempo[2] <=0 && tiempo[3] <=0) {
				clearInterval(timer);
				$("#tiempoRestante").text("SE ACABÓ");
			}else{
				$("#dias").text(tiempo[0]);
				$("#horas").text(tiempo[1]);
				$("#minutos").text(tiempo[2]);
				$("#segundos").text(tiempo[3]);
			}
		}
		

	}


});


function formatFechas(nr, base){
  var len = (String(base).length - String(nr).length) + 1;
  return len > 0? new Array(len).join('0') + nr : nr;
}