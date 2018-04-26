<?php
class puja{
	private $CodPuja;
	private $CodSubasta;
	private $CodPujador;
	private $Cantidad;

	public function __construct($row){
		$this->CodPuja = $row['CodPuja'];
		$this->CodSubasta = $row['CodSubasta'];
		$this->CodPujador = $row['CodPujador'];
		$this->Cantidad = $row['Cantidad'];

	}

	public function getCodPuja(){
		return $this->CodPuja;
	}

	public function setCodPuja($CodPuja){
		$this->CodPuja = $CodPuja;
	}

	public function getCodSubasta(){
		return $this->CodSubasta;
	}

	public function setCodSubasta($CodSubasta){
		$this->CodSubasta = $CodSubasta;
	}

	public function getCodPujador(){
		return $this->CodPujador;
	}

	public function setCodPujador($CodPujador){
		$this->CodPujador = $CodPujador;
	}

	public function getCantidad(){
		return $this->Cantidad;
	}

	public function setCantidad($Cantidad){
		$this->Cantidad = $Cantidad;
	}


}






?>