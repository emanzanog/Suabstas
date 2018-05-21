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
		$subastas = DbManager::getSubastasCompleta($vendedor);
		if(count($subastas) <= 0 || $subastas == "FALLO Obteniendo Subasta"){
			echo AuctionView::noAuctions($vendedor);
		}else{
			echo AuctionView::upload();
			echo AuctionView::panelSubastas($subastas);
			echo '<script type="text/javascript">$(".carousel").carousel()</script>';
		}
	}
	public function subasta(){
		echo AuctionView::WIP();
	}
	public function newSubasta(){
		$categorias =  DbManager::getCategorias();
		echo AuctionView::newUpload($categorias);
	}
	public function expandSubasta(){
		$codSubasta = $_POST['codSubasta'];
		$subasta = DbManager::getSubastaCompleta($codSubasta);
		if($subasta instanceof SubastaCompleta){
			echo AuctionView::subasta($subasta);
		}else{
			echo "FALLO";
		}
	}
	public function tiempoSubasta(){
		$fecha = DbManager::getFF($_POST['codSubasta']);
		echo json_encode(strtotime($fecha));
	}
	public function store(){
		$codVendedor = $_SESSION['sesion']['codUsuario'];
		$nombreProd = $_POST['nombreProd'];
		$precioProd= $_POST['precio'];
		$descripcion= $_POST['desc'];
		$categoriaProd= $_POST['categoria'];
		$fInicio= $_POST['fInicio'];
		$fFin= $_POST['fFin'];
		$ficheros= $_POST['image'];
		$idProd = DbManager::insertProducto($nombreProd,$descripcion,$precioProd,$codVendedor,$categoriaProd);
		$idSubasta = "";
		if($idProd!=-1){
			$idSubasta = DbManager::insertSubasta($idProd,$fInicio,$fFin);
			
		}
		if(isset($idSubasta) && $idSubasta !=-1){
			$bien=true;
			for ($i =0 ; $i< count($ficheros); $i++) {
				//echo var_dump($ficheros);
				//echo $ficheros[$i];
				$imgs = DbManager::insertImg($idProd,$ficheros[$i]);
				if($imgs == -1){
					$bien = false;
				}
			}
			echo ($bien?$imgs:$imgs);
		}else{
			echo $idSubasta . " IdSubasta| ";
			echo $idProd. " idProducto| ";
		}
		
		
	}
	
	
}
if(isset($_POST['metodo'])){
AuctionController::ejecuta($_POST['metodo']);
		
}else{
	header("Location: ../index.php");
}
?>