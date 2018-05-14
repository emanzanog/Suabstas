<?php
class Usuario{
	private $CodUsuario;
	private $Nombre;
	private $Apellidos;
	private $NickName;
	private $Email;
	private $Password;
	
	public function __construct($row){
		$this->CodUsuario= $row['CodUsuario'];
		$this->Nombre= $row['Nombre'];
		$this->Apellidos= $row['Apellidos'];
		$this->NickName= $row['NickName'];
		$this->Email= $row['Email'];
		$this->Password= $row['Password'];
	}
	
	/**GETTERs & SETTERs*/
    public function getCodUsuario()
    {
        return $this->CodUsuario;
    }

    public function setCodUsuario($CodUsuario)
    {
        $this->CodUsuario = $CodUsuario;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function getApellidos()
    {
        return $this->Apellidos;
    }

    public function setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;
    }

    public function getNickName()
    {
        return $this->NickName;
    }

    public function setNickName($NickName)
    {
        $this->NickName = $NickName;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function setPassword($Password)
    {
        $this->Password = $Password;
    }
}
?>