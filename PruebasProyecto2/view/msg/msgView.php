<?php
class MsgView{
	private function __construct(){
	}
	public static function generaCabecera($numMsg){
		$cabecera = '<nav class="navbar navbar-light bg-light">'.
					'<div>'.
					'<a href="#" title="Nuevo Mensaje" id="newMsg" class="btn btn-outline-primary"><i class="far fa-plus-square"></i> Nuevo Mensaje</a> -> TODO BOTONES (ENVIADOS y lo que sea)';  
		$cabecera .='</div></nav>';
		$cabecera .='<script type="text/javascript" src = "./utils/botonesCabeceraMsg.js"></script>';
		return $cabecera;
	}

	public static function noMsgPanel(){
		$panel = '<div class="container">'
				.'<div class="jumbotron" style="min-height:600px">'
				.'<h4 class="text-center"> No tienes mensajes en este momento </h4>'
				.'</div></div>';
		return $panel;
	}

	public static function creaMensaje($mensaje,$emisor,$receptor){
		$return = "<div class='container";
		 $return .=($mensaje->getEstado()=='NUEVO'? " nuevo" : "");
		$return .= "'><div class='card'>";
		$return .= "<div class='card-header'>De: ".$emisor->getNickName()." - Para: ".$receptor->getNickName();
		if($mensaje->getEstado() == "NUEVO"){
			$return .= " <button class='btn btn-outline-secondary leer' data='".$mensaje->getCodMensaje()."'> Marcar Como Leido </button>";
		}
		$return .= " <button class='btn btn-outline-danger borrar' data='".$mensaje->getCodMensaje()."'> Borrar Mensaje </button>";
		$return .="</div>";
		$return .= "<div class='card-body'>";
		$return .= "<div class='card-title'><h6>Asunto: ".$mensaje->getAsunto()."</h6></div>";
		$return .= "<div class='card-text'>".$mensaje->getMensaje()."</div></div>";
		$return .= "<div class='card-footer text-muted'>".$mensaje->getFecha()."</div>";
		$return.= "</div></div>";
		
		return $return;
	}

	public static function nuevoMensaje($emisor){
		$total = '<div class="container">';
		$total .= '<form id="formMsg">';
		$total .= '<div class="form-group">';
		$total .= '<label for="destinatario">Para: </label>';
		$total .= '<input type="text" class="form-control" id="destinatario" name="usrRecep" autocomplete="off"/>';
		$total .= '</div><div id="suggestions"></div>';
		$total .= '<div class="form-group">';
		$total .= '<label for="asunto">Asunto: </label>';
		$total .= '<input type="text" class="form-control" id="asunto" name="asunto" autocomplete="off"/>';
		$total .= '</div>';
		$total .= '<div class="form-group">';
		$total .= '<label for="mensaje">Mensaje: </label>';
		$total .= '<textarea class="form-control" id="mensaje" rows="3" name="mensaje" ></textarea>';
		$total .= '</div>';
		$total .= '<button type="submit" class="btn btn-outline-primary" id="newMsg">Enviar</button>';
		$total .= '</form>';
		$total .= '</div>';
		$total .= '<script type="text/javascript" src="./utils/sanitizeInputs.js"></script>';
		$total .= '<script type="text/javascript" src="./utils/newMsg.js"></script>';
		return $total;

	}
	public static function suggestion($nickName){
		$total = "<span class='sugg btn btn-outline-warning'>".$nickName."</span>";
		return $total;
	}

}
?>