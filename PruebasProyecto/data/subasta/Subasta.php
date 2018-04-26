<?php
class Subabsta{
	private $CodSubasta;
	private $CodProducto;
	private $FechaInicio;
	private $FechaFin;
	private $Estado;

	public function __construct($row){
		$this->CodSubasta = $row['CodSubasta'];
		$this->CodProducto = $row['CodProducto'];
		$this->FechaInicio = $row['FechaInicio'];
		$this->FechaFin = $row['FechaFin'];
		$this->Estado = $row['Estado'];

	}
	
	public function getCodSubasta(){
		return $this->CodSubasta;
	}

	public function setCodSubasta($CodSubasta){
		$this->CodSubasta=$CodSubasta;
	}

	public function getCodProducto(){
		return $this->CodProducto;
	}

	public function setCodProducto($CodProducto){
		$this->CodProducto=$CodProducto;
	}

	public function getFechaInicio(){
		return $this->FechaInicio;
	}

	public function setFechaInicio($FechaInicio){
		$this->FechaInicio=$FechaInicio;
	}

	public function getFechaFin(){
		return $this->FechaFin;
	}

	public function setFechaFin($FechaFin){
		$this->FechaFin=$FechaFin;
	}

	public function getEstado(){
		return $this->Estado;
	}

	public function setEstado($Estado){
		$this->Estado=$Estado;
	}
}
?>
