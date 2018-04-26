<?php
class Producto{
	private $CodProducto;
	private $Nombre;
	private $PrecioInicial;
	private $CodVendedor;
	private $Categoria;

	public function __construct($row){
		$this->CodProducto = $row['CodProducto'];
		$this->Nombre = $row['Nombre'];
		$this->PrecioInicial = $row['PrecioInicial'];
		$this->CodVendedor = $row['CodVendedor'];
		$this->Categoria = $row['Categoria'];
	}
	
	public function getCodProducto(){
		return $this->CodProducto;
	}

	public function setCodProducto($CodProducto){
		$this->CodProducto = $CodProducto;
	}			

	public function getNombre(){
		return $this->Nombre;
	}

	public function setNombre($Nombre){
		$this->Nombre = $Nombre;
	}	

	public function getPrecioInicial(){
		return $this->PrecioInicial;
	}

	public function setPrecioInicial($PrecioInicial){
		$this->PrecioInicial = $PrecioInicial;
	}

	public function getCodVendedor(){
		return $this->CodVendedor;
	}

	public function setCodVendedor($CodVendedor){
		$this->CodVendedor = $CodVendedor;
	}

	public function getCategoria(){
		return $this->Categoria;
	}

	public function setCategoria($Categoria){
		$this->Categoria = $Categoria;
	}


}
?>
