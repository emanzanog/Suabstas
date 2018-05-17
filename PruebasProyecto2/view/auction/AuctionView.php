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
		$fActual = date("Y-m-d\Th:m");
		$fDefault = date("Y-m-d\Th:m", strtotime($fActual. ' + 15 days'));
		$fFinal = date("Y-m-d\Th:m", strtotime($fActual. ' + 30 days'));
		$todo = "<div class='container'><div class='jumbotron'>"
				."<h1 class='text-center' >Subir Producto</h1>"
				."<form id='newSubasta'>"
				."<div class='form-group'> "
				."<label for='#nombreProd'>Nombre del prodcuto</label> "
				."<input type='text' id='nombreProd' class='form-control' placeholder='Producto'/> "
				."</div> "
				."<div class='form-group'> "
				."<label for='#desc'>Descripción del prodcuto</label> "
				."<textarea id='desc' class='form-control' placeholder='Descripción...'></textarea> "
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
				."<input type='datetime-local' id='fInicio' class='form-control' min='".$fActual."' value='".$fActual."'/> "
				."</div> "
				."<div class='form-group'> "
				."<label for='#fFinal'>Fecha de finalización</label> "
				."<input type='datetime-local' id='fFinal' class='form-control' min='".$fActual."' max='".$fFinal."' value='".$fDefault."'/> "
				."</div> "
				."<div class='form-group'> "
				."<label for='#imgs'>Imágenes del prodcuto</label> "
				."<input type='file' id='imgs' class='form-control imagenes i1' name='file[]' multiple='multiple' accept='image/*' /> "
				."</div> "
				."<input type='submit' value='Publicar' class='btn btn-outline-primary'/>"
				."</form>".self::loader();
		$todo .='<script type="text/javascript" src = "./utils/botonesSubastas.js"></script>';
		$todo .= "<script type='text/javascript' src='./utils/sanitizeInputs.js'></script>";
		return $todo;
	}

	public static function panelSubastas($subastas){
		$html = "";
		$cont = 0;
		$html .='<div class="card-body">';
		foreach($subastas as $s){
			$html .= self::cuadroSubasta($s,$cont);
			$cont++;
		}
		$html .='</div>';
		// $html .= '<script type="text/javascript">$(".carousel").carousel()</script>';
		return $html;
	}

	private static function cuadroSubasta($subasta, $num){

		$html1 = '<div class="card-body subasta" cod="'.$subasta->getCodSubasta().'"><div class="row"><div class=" col-md-4"><div class="card-block"><div class="card-img" style="max-width:500px"><div class ="img-fluid img-thumbnail"><div id="carouselExampleIndicators'.$num.'" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">';
				for ($i=0; $i < count($subasta->getImg()); $i++) { 
					if($i ==0){
						$html1 .= '<li data-target="#carouselExampleIndicators'.$num.'" data-slide-to="'.$i.'" class="active"></li>';
					}else{
						$html1 .= '<li data-target="#carouselExampleIndicators'.$num.'" data-slide-to="'.$i.'" ></li>';
					}
				}
				$html2 = '</ol>
				<div class="carousel-inner">';
				for ($i=0; $i < count($subasta->getImg()); $i++) { 
					if($i ==0){
						$html2 .= '<div class="carousel-item active">
						<img class="d-block w-100" src="'.$subasta->getImg()[$i].'" alt="First slide">
						</div>';
					}else{
						$html2 .= '<div class="carousel-item">
						<img class="d-block w-100" src="'.$subasta->getImg()[$i].'" alt="First slide">
						</div>';
					}
				}
				$html3 = '</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators'.$num.'" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators'.$num.'" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
				</a>
				</div></div></div></div></div>
				'./*COSAS AQUÍ*/'
				<div class="col-md-8">
					<div class="card-block">
						<h3 class="card-title">'.str_replace("_"," ",$subasta->getNombre()).'</h3>
						<h6 class="card-text">DESCRIPCIÓN</h6>
						<p class="card-text text-truncate">'.$subasta->getDescripcion().'</p>
						<h6 class="card-text">PRECIO</h6>
						<p class="card-text">'.$subasta->getPrecioInicial().'€</p>
						<p class="card-text text-truncate">Cras convallis ut turpis vitae facilisis. Morbi eu augue vel quam efficitur rhoncus vitae eget lectus. Cras augue ligula, aliquam ut enim ut, feugiat imperdiet sem.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				
				</div>

				</div></div>';
		return $html1.$html2.$html3;
	}

	public static function subasta($subastaC){
		$html = '<div class="container">
			<div class="row">
				<div class="col-lg-3">
				<h1 class="my-4">Shop Name</h1>
				<div class="list-group">
				<a href="#" class="list-group-item active">Category 1</a>
				<a href="#" class="list-group-item">Category 2</a>
				<a href="#" class="list-group-item">Category 3</a>
				</div>
				</div>
				<div class="col-lg-9">
				<div class="card mt-4">';

			$html.='<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">';
				for ($i=0; $i < count($subastaC->getImg()); $i++) { 
					if($i ==0){
						$html .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active"></li>';
					}else{
						$html .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" ></li>';
					}
				}
			$html .= '</ol>
			<div class="carousel-inner">';
			for ($i=0; $i < count($subastaC->getImg()); $i++) { 
				if($i ==0){
					$html .= '<div class="carousel-item active">
					<img class="d-block w-100" src="'.$subastaC->getImg()[$i].'" alt="First slide">
					</div>';
				}else{
					$html .= '<div class="carousel-item">
					<img class="d-block w-100" src="'.$subastaC->getImg()[$i].'" alt="First slide">
					</div>';
				}
			}
			$html .= '</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
			</div>';

			//NOMBRE PRODUCTO Y DESCRIPCIÓN
		$html .='<div class="card-body">
				<h3 class="card-title">'.$subastaC->getNombre().'</h3>
				<h4>'.$subastaC->getPrecioInicial().'€</h4>
				<p class="card-text">'.$subastaC->getDescripcion().'</p>
				<span class="text-secondary">Fecha Subida: </span>'.$subastaC->getFechaInicio().'
				4.0 stars
				</div>
				</div>
				<div class="card card-outline-secondary my-4">
				<div class="card-header">
				Product Reviews
				</div>
				<div class="card-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
				<small class="text-muted">Posted by Anonymous on 3/1/17</small>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
				<small class="text-muted">Posted by Anonymous on 3/1/17</small>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
				<small class="text-muted">Posted by Anonymous on 3/1/17</small>
				<hr>
				<a href="#" class="btn btn-success">Leave a Review</a>
				</div>
				</div>
				</div>
			</div>
		</div>';

		return $html;
	}

	public static function loader(){
		$html = '<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  			<div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			LOADING <i class="fas fa-spinner"></i>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
			</div>
			</div>
			</div>
			</div>';
			return $html;
	}
}
?>