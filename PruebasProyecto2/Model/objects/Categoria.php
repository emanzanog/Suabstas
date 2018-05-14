<?php
class Categoria{

	private $codCategoria;
	private $nombre;
	private $categoriaPadre;

	public function __construct($row){
		$this->codCategoria = $row["CodCategoria"];
		$this->nombre = $row["Nombre"];
		$this->categoriaPadre = $row["CategoriaPadre"];
	}



    public function getCodCategoria(){
        return $this->codCategoria;
    }

    public function setCodCategoria($codCategoria){
        $this->codCategoria = $codCategoria;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getcategoriaPadre(){
        return $this->categoriaPadre;
    }

    public function setcategoriaPadre($categoriaPadre){
        $this->categoriaPadre = $categoriaPadre;
    }
}

?>