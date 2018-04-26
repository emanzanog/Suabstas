<?php
class Img{
	private $CodImg;
	private $img;
	private $CodProd;
	private $CodProdUsado;
	private $CodProdBasura;

	public function __construct($row){
		$this->CodImg = $row['CodImg'];
		$this->img = $row['img'];
		$this->CodProd = $row['CodProd'];
		$this->CodProdUsado = $row['CodProdUsado'];
		$this->CodProdBasura = $row['CodProdBasura'];		
	}

	public function getCodImg(){
		return $this->CodImg;
	}

	public function setCodImg($CodImg){
		$this->CodImg=$CodImg;
	}

	public function getimg(){
		return $this->img;
	}

	public function setimg($img){
		$this->img=$img;
	}

	public function getCodProd(){
		return $this->CodProd;
	}

	public function setCodProd($CodProd){
		$this->CodProd=$CodProd;
	}

	public function getCodProdUsado(){
		return $this->CodProdUsado;
	}

	public function setCodProdUsado($CodProdUsado){
		$this->CodProdUsado=$CodProdUsado;
	}

	public function getCodProdBasura(){
		return $this->CodProdBasura;
	}

	public function setCodProdBasura($CodProdBasura){
		$this->CodProdBasura=$CodProdBasura;
	}

}
?>