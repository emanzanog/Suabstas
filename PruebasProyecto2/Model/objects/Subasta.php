<?php
class Subasta{
	private $codSubasta;
	private $codProducto;
	private $fechaInicio;
	private $fechaFin;
	private $estado;

	public function __construct($row){
		$this->codSubasta = $row['CodSubasta'];
		$this->codProducto = $row['CodProducto'];
		$this->fechaInicio = $row['FechaInicio'];
		$this->fechaFin = $row['FechaFin'];
		$this->estado = $row['Estado'];	
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

  
    public function getCodProducto()
    {
        return $this->codProducto;
    }

    public function setCodProducto($codProducto)
    {
        $this->codProducto = $codProducto;

        return $this;
    }

  
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

  
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

  
    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}

?>