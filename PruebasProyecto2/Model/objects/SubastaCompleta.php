<?php 
class SubastaCompleta{
	private $codSubasta;
	private $codProducto;
	private $FechaInicio;
	private $FechaFin;
	private $Estado;
	private $Nombre;
	private $PrecioInicial;
	private $Categoria;
	private $NickName;
	private $img=[];
	private $PujaMax;
	private $codVendedor;
	private $descripcion;
	
	public function __construct($row){
		if(isset($row['codSubasta'])){
			$this->codSubasta = $row['codSubasta'];
		}

		if(isset($row['codProducto'])){
			$this->codProducto = $row['codProducto'];
		}

		if(isset($row['FechaInicio'])){
			$this->FechaInicio = $row['FechaInicio'];
		}

		if(isset($row['FechaFin'])){
			$this->FechaFin = $row['FechaFin'];
		}

		if(isset($row['Estado'])){
			$this->Estado = $row['Estado'];
		}

		if(isset($row['Nombre'])){
			$this->Nombre = str_replace("_"," ",$row['Nombre']);
		}

		if(isset($row['PrecioInicial'])){
			$this->PrecioInicial = $row['PrecioInicial'];
		}

		if(isset($row['Categoria'])){
			$this->Categoria = $row['Categoria'];
		}

		if(isset($row['NickName'])){
			$this->NickName = $row['NickName'];
		}

		if(isset($row['img'])){
			$this->img[] = $row['img'];
		}

		if(isset($row['PujaMax'])){
			$this->PujaMax = $row['PujaMax'];
		}

		if(isset($row['CodVendedor'])){
			$this->codVendedor = $row['CodVendedor'];
		}
		if(isset($row['Descripcion'])){
			$this->descripcion = $row['Descripcion'];
		}else{
			$this->descripcion = "Este artículo no tiene descripción.";
		}

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
        return $this->FechaInicio;
    }

    public function setFechaInicio($FechaInicio)
    {
        $this->FechaInicio = $FechaInicio;

        return $this;
    }

    public function getFechaFin()
    {
        return $this->FechaFin;
    }

    public function setFechaFin($FechaFin)
    {
        $this->FechaFin = $FechaFin;

        return $this;
    }

    public function getEstado()
    {
        return $this->Estado;
    }

    public function setEstado($Estado)
    {
        $this->Estado = $Estado;

        return $this;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getPrecioInicial()
    {
        return $this->PrecioInicial;
    }

    public function setPrecioInicial($PrecioInicial)
    {
        $this->PrecioInicial = $PrecioInicial;

        return $this;
    }

    public function getCategoria()
    {
        return $this->Categoria;
    }

    public function setCategoria($Categoria)
    {
        $this->Categoria = $Categoria;

        return $this;
    }

    public function getNickName()
    {
        return $this->NickName;
    }

    public function setNickName($NickName)
    {
        $this->NickName = $NickName;

        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img[] = $img;

        return $this;
    }

    public function getPujaMax()
    {
        return $this->PujaMax;
    }

    public function setPujaMax($PujaMax)
    {
        $this->PujaMax = $PujaMax;

        return $this;
    }

    public function getCodVendedor()
    {
        return $this->codVendedor;
    }

    public function setCodVendedor($codVendedor)
    {
        $this->codVendedor = $codVendedor;

        return $this;
    }

    public function addImg($img){
    	$this->img[] = $img;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}

?>