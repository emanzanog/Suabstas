<?php
class Categoria{
	private $CodCategoria;
	private $Nombre;
	private $CategoriaPadre;

	public function __construct($row){
		$this->CodCategoria = $row['CodCategoria'];
		$this->Nombre = $row['Nombre'];
		$this->CategoriaPadre = $row['CategoriaPadre'];

	}

	public function getCodCategoria(){
		return $this->CodCategoria;
	}

	public function setCodCategoria($CodCategoria){
		$this->CodCategoria=$CodCategoria;
	}

	public function getNombre(){
		return $this->Nombre;
	}

	public function setNombre($Nombre){
		$this->Nombre=$Nombre;
	}

	public function getCategoriaPadre(){
		return $this->CategoriaPadre;
	}

	public function setCategoriaPadre($CategoriaPadre){
		$this->CategoriaPadre=$CategoriaPadre;
	}




}
?>