<?php
class AuctionView{

	public static function panelInicio($subastasPublicadas, $participaciones, $subastasAcabadasPublicadas, $participacionesAcabadas){
		$todo = "<div class='container'><div class='jumbotron'>WORK IN PROGRESS</div></div> ";
		return $todo;
	}

	public static function pantallaSubasta($subasta){
		$todo = "<div class='container'><div class='jumbotron'>WORK IN PROGRESS</div></div> ";
		return $todo;
	}

	public static function WIP(){
		$todo = "<div class='container'><div class='jumbotron'>WORK IN PROGRESS</div></div> ";
		return $todo;
	}

	public static function noAuctions($vendedor){
		$todo = self::upload();
		$todo .= "<br/><div class='container'><div class='jumbotron'> ";
		$todo .= "<h1 class='text-center'>No tienes subastas publicadas</h1><br/> ";
		$todo .= "<h1 class='text-center'>¡PUBLICA UNA!</h1> ";
		$todo .= "</div></div> ";
		
		return $todo;
	}

	public static function upload(){
		$todo = '<nav class="nav navbar navbar-light bg-light  navbar-right">'.
					'<a href="#" title="Publica una Subasta" id="newAuction" class="btn btn-outline-primary"><i class="fas fa-upload"></i> ¡Publica una Subasta!</a>';  
		$todo .='</nav>';
		$todo .='<script type="text/javascript" src = "./utils/botonesSubastas.js"></script>';
		return $todo;
	}
	public static function newUpload($categorias){
		date_default_timezone_set("Europe/Madrid");
		$fActual = date("Y-m-d");
		$fDefault = date("Y-m-d", strtotime($fActual. ' + 15 days'));
		$fFinal = date("Y-m-d", strtotime($fActual. ' + 30 days'));
		$todo = "<div class='container'><div class='jumbotron'>"
				."<h1 class='text-center' >Subir Producto</h1>"
				."<form id='newSubasta'>"
				."<div class='form-group'> "
				."<label for='#nombreProd'>Nombre del prodcuto</label> "
				."<input type='text' id='nombreProd' class='form-control' placeholder='Producto'/> "
				."</div> "
				."<div class='form-group'> "
				."<label for='#precio'>Precio de salida:</label> "
				."<div class='input-group-append'>"
				."<input type='number' id='precio' class='form-control' min='0' value='00.00' step='.01' placeholder='0.00'/> "
				."<div class='input-group-text btn btn-outline-secondary' id='vista' >€</div>"
				."</div> </div>"
				."<div class='form-group'> "
				."<label for='#cat'>Categoría</label> "
				."<select id='cat' class='form-control'> ";
		if(count($categorias) > 0){
			foreach ($categorias as $cat) {
				$todo .= "<option value='".$cat->getCodCategoria()."'>".utf8_encode($cat->getNombre())."</option>";
			}
		}else{
			$todo .="<option value='err'> ERROR </option>";
		}
		$todo .="</select> "
				."</div> "
				."<div class='form-group'> "
				."<label for='#fInicio'>Fecha de inicio</label> "
				."<input type='date' id='fInicio' class='form-control' min='".$fActual."' value='".$fActual."'/> "
				."</div> "
				."<div class='form-group'> "
				."<label for='#fFinal'>Fecha de finalización</label> "
				."<input type='date' id='fFinal' class='form-control' min='".$fActual."' max='".$fFinal."' value='".$fDefault."'/> "
				."</div> "
				."<div class='form-group'> "
				."<label for='#imgs'>Imágenes del prodcuto</label> "
				."<input type='file' id='imgs' class='form-control imagenes i1' name='file[]' multiple='multiple' accept='image/*' /> "
				."</div> "
				."<input type='submit' value='Publicar' class='btn btn-outline-primary'/>"
				."</form>";
		$todo .='<script type="text/javascript" src = "./utils/botonesSubastas.js"></script>';
		$todo .= "<script type='text/javascript' src='./utils/sanitizeInputs.js'></script>";
		return $todo;
	}

	public static function panelSubastas($subastas){}
}
?>