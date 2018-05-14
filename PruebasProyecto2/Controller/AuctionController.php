<?php

require_once("../Model/dbmanager.php");
require_once("../view/auction/AuctionView.php");
session_start();
class AuctionController{

	public function __construct($metodo){
		
		// $this->$metodo();
	}

	public static function ejecuta($metodo){
		self::$metodo();
	}
	
	public function principal(){
		$vendedor = $_SESSION['sesion']['codUsuario'];
		$subastas = DbManager::getSubastas($vendedor);
		if(count($subastas) <= 0 || $subastas == "FALLO Obteniendo Subasta"){
			echo AuctionView::noAuctions($vendedor);
		}else{
			echo AuctionView::panelSubastas($subastas);
		}
	}
	public function subasta(){
		echo AuctionView::WIP();
	}
	public function newSubasta(){
		$categorias =  DbManager::getCategorias();
		echo AuctionView::newUpload($categorias);
	}
	public function store(){
		// MIRAR AÚN COMO SUBIR LAS IMÁGENES
		$nombre = $_POST['nombreProd'];
		$precio= $_POST['precio'];
		$categoria= $_POST['categoria'];
		$fInicio= $_POST['fInicio'];
		$fFin= $_POST['fFin'];
		$ficheros= $_POST['image'];

		

		echo $nombre . " - " . $precio ." - " . $categoria ." - " . $fInicio ." - " . $fFin ." - " . var_dump($ficheros);
	}
	
	
}
if(isset($_POST['metodo'])){
	$auctionController;
	switch($_POST['metodo']){
		case "principal":
			$auctionController = AuctionController::ejecuta("principal");
			break;
		case "subasta":
			$auctionController = AuctionController::ejecuta("subasta");
			break;
		case "newSubasta":
			$auctionController = AuctionController::ejecuta("newSubasta");
			break;
		case "store":
			$auctionController = AuctionController::ejecuta("store");
			break;
		default:
			break;
	}
}else{
	header("Location: ../index.php");
}


?>