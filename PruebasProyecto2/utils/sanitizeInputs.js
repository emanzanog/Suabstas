
function sanitizeMail(input){
	var match = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
	if(input.match(match)){
		return true;
	}
	return false;
}

function sanitize(input){
	var match = new RegExp("^[a-zA-Z0-9._-]*$");
	if(match.test(input)){
		return true;
	}
	return false;
}

function sanitizeNames(input){
	var match = new RegExp("^[a-zA-Z0-9._-]*$");
	if(match.test(input)){
		return true;
	}
	return false;
}


function compruebaInputs(inputs){
	var llenos = true;
	$(inputs).each(function(){
		if($(this).val().length <=0){
			llenos = false;
		}
	});
	return llenos;
}
function parseComillas(input){
	input = input.replace(/"/g,"\"");
	return input;
}

