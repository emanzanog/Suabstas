<?php
function sanitizeInput($input){
	if(preg_match('/^[a-zA-Z0-9._-]*$/',$input)){
		return true;
	}
	return false;
}

function sanitizeMail($input){
	if(preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $input)){
		return true;
	}
	return false;
}
?>