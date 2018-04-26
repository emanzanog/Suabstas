<?php
class Persona{
    private $codUsuario;
	private $nombre;
	private $ape;
	private $usuario;
	private $pass;
	private $mail;
	public function __construct($row){
        $this->codUsuario = $row['CodUsuario'];
		$this->nombre = $row['Nombre'];
		$this->ape = $row['Apellidos'];
		$this->usuario = $row['NickName'];
		$this->pass = $row['Password'];
		$this->mail = $row['Email'];
	}

	public function getPersona(){
		return $this;
	}


    
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;     
    }

    
    public function getApellido()
    {
        return $this->ape;
    }

    public function setApellido($ape)
    {
        $this->ape = $ape;     
    }

    
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;     
    }

    
    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;     
    }

    
    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;     
    }

    
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }

    
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;

    }
}
?>