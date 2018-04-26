<?php
class Msg{
	private $CodMensaje;
	private $CodEmisor;
	private $CodReceptor;
	private $Asunto;
	private $Mensaje;
	private $Estado;
	private $Fecha;

	public function __construct($CodEmisor,$CodReceptor,$Asunto,$Mensaje){
		$this->CodEmisor = $CodEmisor;
		$this->CodReceptor = $CodReceptor;
		$this->Asunto = $Asunto;
		$this->Mensaje = $Mensaje;
	}
	public function __construct($row){
		$this->CodMensaje = $row['CodMensaje'];
		$this->CodEmisor = $row['CodEmisor'];
		$this->CodReceptor = $row['CodReceptor'];
		$this->Asunto = $row['Asunto'];
		$this->Mensaje = $row['Mensaje'];
		$this->Estado = $row['Estado'];
		$this->Fecha = $row['Fecha'];
	}
	public function generaInsert(){
		$sql = "INSERT INTO Mensajes (CodEmisor,CodReceptor,Asunto,Mensaje)";
		$sql .= " VALUES ($this->CodEmisor,$this->CodReceptor,'$this->Asunto','$this->Mensaje')";
		return $sql;
	}
	public function generaDelete(){
		$sql = "DELETE FROM Mensajes WHERE CodMensaje = $this->CodMensaje"; 
		return $sql;
	}
	public function generaAlterState(){
		$sql = "ALTER TABLE Mensajes SET Estado = '$this->Estado' WHERE CodMensaje = '$this->CodMensaje'";
		return $sql;
	}
	/** GETTERs & SETTERs*/
    public function getCodMensaje()
    {
        return $this->CodMensaje;
    }

    public function setCodMensaje($CodMensaje)
    {
        $this->CodMensaje = $CodMensaje;
    }

    public function getCodEmisor()
    {
        return $this->CodEmisor;
    }

    public function setCodEmisor($CodEmisor)
    {
        $this->CodEmisor = $CodEmisor;
    }

    public function getCodReceptor()
    {
        return $this->CodReceptor;
    }

    public function setCodReceptor($CodReceptor)
    {
        $this->CodReceptor = $CodReceptor;
    }

    public function getAsunto()
    {
        return $this->Asunto;
    }

    public function setAsunto($Asunto)
    {
        $this->Asunto = $Asunto;
    }

    public function getMensaje()
    {
        return $this->Mensaje;
    }

    public function setMensaje($Mensaje)
    {
        $this->Mensaje = $Mensaje;
    }

    public function getEstado()
    {
        return $this->Estado;
    }

    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    public function getFecha()
    {
        return $this->Fecha;
    }

    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }
}
?>