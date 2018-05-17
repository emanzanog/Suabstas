<?php
class Puja{
	private $codPuja;
	private $codSubasta;
	private $codPujador;
	private $cantidad;

	public function __construct($row){
		$this->codPuja = $row['CodPuja'];
		$this->codSubasta = $row['CodSubasta'];
		$this->codPujador = $row['CodPujador'];
		$this->cantidad = $row['Cantidad'];
	}

    public function getCodPuja()
    {
        return $this->codPuja;
    }

    public function setCodPuja($codPuja)
    {
        $this->codPuja = $codPuja;

        return $this;
    }

    public function getCodSubasta()
    {
        return $this->codSubasta;
    }

    public function setCodSubasta($codSubasta)
    {
        $this->codSubasta = $codSubasta;

        return $this;
    }

    public function getCodPujador()
    {
        return $this->codPujador;
    }

    public function setCodPujador($codPujador)
    {
        $this->codPujador = $codPujador;

        return $this;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}

?>