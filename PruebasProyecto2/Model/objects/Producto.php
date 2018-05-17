<?php
class Producto{
	private $codProducto; 
	private $nombre; 
	private $precioInicial; 
	private $codVendedor; 
	private $categoria; 

	public function __construct($row){
		$this->codProducto = $row['CodProducto'];
		$this->nombre = $row['Nombre'];
		$this->precioInicial = $row['PrecioInicial'];
		$this->codVendedor = $row['CodVendedor'];
		$this->categoria = $row['Categoria'];
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPrecioInicial()
    {
        return $this->precioInicial;
    }

    public function setPrecioInicial($precioInicial)
    {
        $this->precioInicial = $precioInicial;

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

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
}

?>