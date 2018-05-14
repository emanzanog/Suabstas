<?php
require_once("../Model/conexion.php");
require_once("../Model/objects/Usuario.php");
require_once("../Model/objects/Mensaje.php");
require_once("../Model/objects/Producto.php");
require_once("../Model/objects/Subasta.php");
require_once("../Model/objects/Puja.php");
require_once("../Model/objects/Categoria.php");
class DbManager{
	public static function getConnection(){
		$inst = Conexion::getInstance();
		return $inst->getConnection();
	}


	/**
		=============================================================================================
		|||||||||||||||||||||||||||||||||||||||||| USUARIO ||||||||||||||||||||||||||||||||||||||||||
		=============================================================================================
	*/

	public static function authnUser($userName, $pass){
		$connection = self::getConnection();
		$sql = "SELECT * FROM Usuario WHERE NickName = '".$userName."' AND Password = '".$pass."'";
		$result = $connection->query($sql);
		$usuario;
		if($result){
			$row = $result->fetch_array();
			$usuario = new Usuario($row);
		}
		return $usuario;
	}
	public static function getUser($codUsr){
		$connection = self::getConnection();
		$sql = "SELECT * FROM Usuario WHERE codUsuario = ".$codUsr;
		$result = $connection->query($sql);
		$usuario = null;
		if($result){
			$row = $result->fetch_array();
			$usuario = new Usuario($row);
		}
		return $usuario;
	}

	public static function getCodUsr($nick){
		$connection = self::getConnection();
		$sql = "SELECT * FROM Usuario WHERE NickName = '".$nick."'";
		$result = $connection->query($sql);
		$usuario = null;
		if($result){
			$row = $result->fetch_array();
			$usuario = new Usuario($row);
		}
		return $usuario;
	}

	public static function insertUser($name, $lastName, $nickName, $email, $password){
		$connection = self::getConnection();
		$sql = "INSERT INTO Usuario (Nombre, Apellidos, NickName, Email, Password)";
		$sql .= "VALUES ('".$name."', '".$lastName."', '".$nickName."', '".$email."', '".$password."')";
		$result = $connection->query($sql);
		if($result){
			return true;
		}
		return false;
	}


	public static function updateUsr($codUsr, $nickName, $email, $password){
		$connection = self::getConnection();
		$sql = "UPDATE usuario SET NickName = '".$nickName."', Password ='".$password."', Email='".$email."' WHERE CodUsuario = " . $codUsr;
		$result = $connection->query($sql);

		return $result;
	}

	public static function deleteUser($codUsr){
		$connection = self::getConnection();
		$sql = "DELETE FROM Usuario WHERE CodUsuario = ".$codUsr;
		$result = $connection->query($sql);
		if($result){
			return true;
		}
		return false;
	}

	/**
		===========================================================================================
		|||||||||||||||||||||||||||||||||||||||| MENSAJES |||||||||||||||||||||||||||||||||||||||||
		===========================================================================================
	*/


//HAY QUE ARREGLAR COSAS ======== ESTO YA TIENE MEJOR FORMA //CREO QUE YA ARREGLADO
	public static function buscaPersonas($codUsuario){
		$connection = self::getConnection();
		$emisores = "SELECT DISTINCT u.*  FROM Usuario u, Mensajes m WHERE m.CodEmisor = u.CodUsuario AND m.CodReceptor =".$codUsuario;
		$receptores = "SELECT DISTINCT u.*  FROM Usuario u, Mensajes m WHERE m.CodReceptor = u.CodUsuario AND m.CodEmisor =".$codUsuario;
		$personas = [];
		$result1 = $connection->query($emisores);
		if($result1){
			while($row = $result1->fetch_array()){
				$personas[]=new Usuario($row);
			}
		}else{
			return $result1;
		}
		$result2 = $connection->query($receptores);
		if($result2){
			while($row2 = $result2->fetch_array()){
				$libre = true;
				foreach ($personas as $people) {
					if($people->getCodUsuario() == $row2['CodUsuario']){
						$libre = false;
					}
				}
				if($libre){
					$personas[]=new Usuario($row2);
				}
				
			}
		}else{
			return $result2;
		}
		return $personas;

	}

	public static function insertMsg($codEmisor, $codReceptor, $asunto, $mensaje){
		$connection = self::getConnection();
		$sql = "INSERT INTO Mensajes (CodEmisor, CodReceptor, Asunto, Mensaje) ";
		$sql .= "VALUES (".$codEmisor.", ".$codReceptor.", '".$asunto."', '".$mensaje."')";
		$result = $connection->query($sql);
		if ($result) {
			return $result;
		}
		$mensaje = ($codEmisor . " - " . $codReceptor . " - " . $asunto . " - " . $mensaje);
		return $mensaje;
	}

	public static function deleteMsg($codMensaje){
		$connection = self::getConnection();
		//recoge el registro del mensaje en concreto y crea una instancia de mensaje
		$recogeSql = "SELECT * FROM Mensajes where CodMensaje = ".$codMensaje;
		$reg = $connection->query($recogeSql);
		$mensaje = null;
		if($row = $reg->fetch_array()){
			$mensaje = new Msg($row);
			//borramos el mensaje de Mensajes
			$sql = "DELETE FROM Mensajes WHERE CodMensaje = ".$codMensaje;
			$result = $connection->query($sql);
			if ($result) {
				// creamos un registro en mensajes borrados
				$sqlInsert = "INSERT INTO MensajesBorrados (CodEmisor, CodReceptor, Asunto, Mensaje) ";
				$sqlInsert .= "VALUES (".$mensaje->getCodEmisor().", ".$mensaje->getCodReceptor().", '".$mensaje->getAsunto()."', '".$mensaje->getMensaje()."')";
				$success = $connection->query($sqlInsert);
				if($success){
					return $success;
				}
				return "No se ha insertado el registro en Mensajes Borrados";
			}
			return "Fallo: " .$codMensaje;
		}
		return "Fallo: ". $codMensaje;
	}
	public static function numMsg($codReceptor){
		$connection =  self::getConnection();
		$sql = "SELECT * FROM Mensajes where CodReceptor = " . $codReceptor; 
		$result = $connection->query($sql);	

		if($result){
			return $result->num_rows;
		}
		return 0;
	}

	public static function getMsgByReceptor($codReceptor){
		$connection =  self::getConnection();
		$sql = "SELECT * FROM Mensajes WHERE CodReceptor = ".$codReceptor." ORDER BY Estado ASC, fecha DESC";
		$result = $connection->query($sql);
		$mensajes = array();
		if($result){
			while($row = $result->fetch_array()){
				$mensajes[] = new Msg($row);
			}
		}
		return $mensajes;
	}

	public static function changeState($codMsg){
		$connection =  self::getConnection();
		$sql = "UPDATE Mensajes SET Estado = 'VISTO' WHERE CodMensaje = " . $codMsg;
		$result = $connection->query($sql);
		if($result){
			return "1A";
		}else{
			return $codMsg;
		}
		
	}

	/**
		=============================================================================================================
		||||||||||||||||||||||||||||||||||||||||||||||||| PRODUCTOS |||||||||||||||||||||||||||||||||||||||||||||||||
		=============================================================================================================
	*/

	public static function getProductoByVendedor($codUsuario){
		$connection =  self::getConnection();
		$sql = "SELECT * FROM Producto WHERE CodVendedor = ".$codUsuario;
		$result = $connection->query($sql);
		$producto = null ;
		if($row = $result->fetch_array()){
			$producto = new Producto($row);
		}
		return $producto;
	}

	public static function insertProducto($nombre, $precioInicial, $codVendedor, $categoria, $tipo = ""){
		$connection =  self::getConnection();

		$sql = "INSERT INTO ";

		switch ($tipo){
			case "BASURA": 
				$sql .= "ProductoBasura ";
				break;
			case "FINALIZADA":
				$sql .= "ProductoUsado ";
				break;
			default:
				$sql .= "Producto ";
				break;
		}
		$sql .= "(Nombre, PrecioInicial, CodVendedor, Categoria) VALUES ('".$nombre."', ".$precioInicial.", ".$codVendedor.", ".$categoria.")";
		if($result= $connection->query($sql));

	}

	public static function deleteProducto($codProducto, $tipo){
		$connection =  self::getConnection();
		$select = "SELECT * FROM Producto WHERE CodProducto = ".$codProducto;
		$resSelect = $connection->query($select);
		$row = $resSelect->fetch_array();
		$producto = new Producto($row);
		$delete = "DELETE FROM Producto WHERE CodProdcuto = ".$codProdcuto;

		$resDelete = $connection->query($delete);

		$insert = self::insertProducto($prodcuto->getNombre(), $producto->getPrecioInicial(), $producto->getCodVendedor(), $prodcuto->getCategoria(), $tipo);


		return $connection->insert_id;
		//SELECCIONA PRODUCTO, BORRA SUBASTA RELACIONADA Y 
	}





	/**
		============================================================================================================
		||||||||||||||||||||||||||||||||||||||||||||||||| SUBASTAS |||||||||||||||||||||||||||||||||||||||||||||||||
		============================================================================================================
	*/

	public static function getSubastaByCategoria($codCategoria){
		//RECURSIVIDAD VER SI LA CATEGORIA ESPECIFICADA TIENE HIJOS, NIETOS, ETC Y SACAR TODAS LAS SUBASTAS RELACIONADAS.
		$connection =  self::getConnection();
		$sql = "SELECT * FROM Categoria WHERE CodCategoria = ".$codCategoria;
		$result = $connection->query($sql);

		// if($result){
		// 	$
		// }
		

		$sql = "SELECT * FROM Subasta WHERE CodProducto IN ";
		$sql .="(SELECT CodProducto FROM Producto WHERE Categoria IN";
		$sql.= "(SELECT CodCategoria FROM Categoria WHERE CodCategoria =".$codCategoria." OR CategoriaPadre = ".$codCategoria."))";
	}

	public static function getSubastas($codVendedor){
		$connection =  self::getConnection();
		$sql = "SELECT s.* FROM Subasta s, producto p WHERE s.CodProducto = p.CodProducto AND p.CodVendedor = ".$codVendedor;
		$result = $connection->query($sql);
		$subasta = [];
		if($result){
			while($row = $result->fetch_array()){
				$subasta[] = new Subasta($row);
				
			}
			return $subasta;
		}
		return "FALLO Obteniendo Subasta";
	}

	public static function getSubasta($codSubasta){
		$connection =  self::getConnection();
		$sql = "SELECT * FROM Subasta WHERE CodSubasta = ".$codSubasta;
		$result = $connection->query($sql);
		$subasta = null;
		if($row = $result->fetch_array()){
			$subasta = new Subasta($row);
			return $subasta;
		}
		return "FALLO Obteniendo Subasta";
	}

	public static function insertSubasta($codProducto, $fechaInicio, $fechaFin,  $tabla = ""){
		$connection =  self::getConnection();
		$sql = "INSERT INTO ";
		switch ($tabla){
			case "BASURA":
				$sql .= "SubastaBasura ";
				$estado = "BASURA";
				break;
			case "FINALIZADA":
				$sql .= "SubastaFinalizada ";
				$estado = "FINALIZADO";
				break;
			default:
				$sql .= "Subasta ";
				$estado = "ACTIVA";
				break;
		}
		$sql .= "(CodProducto, FechaInicio, FechaFin, Estado) VALUES (".$codProducto.",STR_TO_DATE('".$fechaInicio."',' %d %M %Y'), STR_TO_DATE('".$fechaFin."',' %d %M %Y'), '".$estado."')";
		$result = $connection->query($sql);
		if($result){
			return $result;
		}
		return false;

	}

	public static function deleteSubasta($codSubasta, $tipo){
		$connection =  self::getConnection();
		$select = "SELECT * FROM Subasta WHERE CodSubasta = ".$codSubasta;
		$result = $connection->query($select);
		if($row = $result->fetch_array()){
			$subasta = new Subasta($row);
		}
		if ($result){
			$borraPujas = self::deletePujas($subasta->getCodSubasta());

			$delete = "DELETE FROM Subasta WHERE CodSubasta = ".$subasta->getCodSubasta();
			$resDelete = $connection->query($delete);
			if($resDelete){
				$deleteProducto = self::deleteProducto($subasta->getCodProducto(),$tipo);
				$insertSub = self::insertSubasta($deleteProducto, $subasta->getFechaInicio(),$subasta->getFechaFin(), $tipo);
				$codSub = $connection->insert_id;
				if($tipo == 'FINALIZADA'){
					for ($i=0; $i < count($borraPujas) ; $i++) { 
						if($i ==0){
							$resultfinal = self::insertPuja($codSub,$borraPujas[$i]->getCodPujador(),$borraPujas[$i]->getCantidad(), "PujaGanadora");
						}else{
							$resultfinal = self::insertPuja($codSub,$borraPujas[$i]->getCodPujador(),$borraPujas[$i]->getCantidad(), "PujaBasura");
						}
					}
				}
				
			}
		}
		return $result . " - " . $resDelete . " - " . $resultfinal;
		
	}
	

	/**
		=============================================================================================================
		||||||||||||||||||||||||||||||||||||||||||||||||||| PUJAS |||||||||||||||||||||||||||||||||||||||||||||||||||
		=============================================================================================================
	*/

	public static function insertPuja($codSubasta, $codPujador, $cantidad, $tabla){
		$connection =  self::getConnection();
		$sql = "INSERT INTO ";
		switch ($tabla){
			case "PujaGanadora":
				$sql .= "PujaGanadora ";	
				break;
			case "PujaBasura":
				$sql .= "PujaBasura ";
				break;
			default:
				$sql .= "Puja ";
				break;
		}
		$sql .= "(CodSubasta, CodPujador, Cantidad) VALUES (".$codSubasta.",".$codPujador.", ".$cantidad.")";
		$result = $connection->query($sql);
		if($result){
			return $result;
		}
		return false;
	}
	public function getPujas($codPujador){
		$connection =  self::getConnection();
		$sql = "SELECT * FROM Puja WHERE CodPujador = ".$codPujador;
		$result = $connection->query($sql);
		return $result;
	}

	public static function deletePujas($codSubasta){
		$connection =  self::getConnection();
		$select = "SELECT * FROM Puja WHERE CodSubasta = ".$codSubasta ." ORDER BY Cantidad DESC";
		$pujas = $connection->query($select);
		$lista = [];
		while($row= $pujas->fetch_array()){
			$lista[]= new Puja($row);
		}
		$delete = "DELETE FROM puja WHERE CodSubasta = ".$codSubasta;
		if($result = $connection->query($delete)){
			return $lista;
		}
		return $lista;
	}

	public static function getPujaMasAlta($codSubasta){
		$connection =  self::getConnection();
	}


	/**
		=============================================================================================================
		||||||||||||||||||||||||||||||||||||||||||||||||| CATEGORÍA |||||||||||||||||||||||||||||||||||||||||||||||||
		=============================================================================================================
	*/

	public static function getCategorias(){
		$connection =  self::getConnection();
		$sql = "SELECT * FROM Categoria";
		$result = $connection->query($sql);
		$categorias = [];
		if($result){
			while($row = $result->fetch_array()){
				$categorias[] = new Categoria($row);
			}
		}
		return $categorias;
	}

	public static function getCategoriaHijo($codPadre){
		$connection =  self::getConnection();
		$sql = "SELECT * FROM Categoria WHERE CodPadre = ". $codPadre;

		$result = $connection->query($sql);
		$hijas = [];
		if($result){
			while($row=$result->fetch_array()){
				$hijas[] = new Categoria($row);
			}
			return $hijas;
		}
		return false;
	}

}

?>