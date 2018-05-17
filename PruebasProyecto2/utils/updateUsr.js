$("#vista").hover(
	function(evt){
		$("#pass").attr("type","text");
	},
	function (evt){
		$("#pass").attr("type","password");
	}
);
$(".updateUsr").submit(function(evt){
	evt.preventDefault();
	var inputs = $("#nick ,#pass ,#correo");
	var $error = "";
	if(!compruebaInputs(inputs)){
		$error += "| Hay Campos Vacíos. |";
	}
	if(!sanitizeMail(inputs.eq(2).val())){
		$error += "| Mail no válido. |";
		inputs.eq(2).css({"border-color":"red"});
	}else{
		inputs.eq(2).css({"border-color":""});
	}
	if(!sanitize(inputs.eq(0).val())){
		$error = "| NickName no válido |";
		inputs.eq(0).css({"border-color":"red"});
	}else{
		inputs.eq(0).css({"border-color":""});
	}
	if(!sanitize(inputs.eq(1).val())){
		$error = "| Password no válida |";
		inputs.eq(1).css({"border-color":"red"});
	}else{
		inputs.eq(1).css({"border-color":""});
	}
	if($error.length <=0){
		$.ajax({
			url:"./Controller/ProfileController.php",
			type: "POST",
			data:{"metodo": "updateUsr","codUsr" : $("#cod").val() , "nick" : inputs.eq(0).val(), "pass": inputs.eq(1).val(), "correo" : inputs.eq(2).val()}
		}).done(function (response){
			console.log("Profile Information was successfully updated!");
			$("#profNick").text(inputs.eq(0).val());
			$("cuerpo").load("./Controller/ProfileController.php",{"metodo": "creaPantalla"});
		}).fail(function (){
			console.log("Error: Cannot Connect to Database");
		});
	}else{
		console.log($error);
	}
	

	
});