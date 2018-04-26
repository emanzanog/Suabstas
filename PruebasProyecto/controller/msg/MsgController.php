<?php
use \controller\Controller
class MsgController extends Controller{
	
	public function insertaMsg(){}


	public function controlPeticion($sesion,$metodo){
		switch($metodo){
			case "accion1":
				accion1($sesion);
				break;
			case "accion2":
				accion2($sesion);
				break;
			default:
				devuelveIndex();
				break;
		}
	}


}
?>