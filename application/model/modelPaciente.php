<?php 
/**
* 
*/
class ModelPaciente
{
	function __construct($db)
	{
		if (null == $db) {
		}else{ 
			try {
				$this->db = $db;
			} catch (PDOException $e) {
				exit('Database connection could not be established.');
			}
		}
	}
	private $id_Paciente;
	private $nombre;
	private $apellido;
	private $tipo_Documento;
	private $documento;
	private $genero;
	private $celular;
	private $telefono;
	private $fecha_Nacimiento;
	private $domicilio;
	private $escolaridad;
	private $estado;
	private $id_historia_clinica;
	private $url  = '/pacientes';
		//get	
	public function getUrl()
	{
		return $this->url;
	}
	public function getHistoria()
	{
		return $this->id_historia_clinica;
	} 
	public function getId_Paciente()
	{
		return $this->id_Paciente;
	}
	public function getNombre()
	{
		return $this->nombre;
	}
	public function getApellido()
	{
		return $this->apellido;
	}
	public function getTipo_Documento()
	{
		return $this->tipo_Documento;
	}
	public function getDocumento()
	{
		return $this ->documento;
	}
	public function getGenero()
	{
		return $this->genero;
	}
	public function getCelular()
	{
		return $this->celular;
	}
	public function getTelefono()
	{
		return $this->telefono;
	}
	public function getFecha_Nacimiento()
	{
		return$this->fecha_Nacimiento;	
	}
	public function getDomicilio()
	{
		return $this->domicilio;
	}
	public function getEscolaridad()
	{
		return $this->escolaridad;
	}
	public function getEstado()
	{
		return $this->estado;
	}
		//set
	public function setId_Paciente($Paciente)
	{
		$this->id_Paciente = $Paciente;
	}
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}
	public function setTipo_Documento($tipo_Documento)
	{
		$this->tipo_Documento = $tipo_Documento;
	}
	public function setDocumento($documento)
	{
		$this ->documento = $documento;
	}
	public function setGenero($genero)
	{
		$this->genero = $genero;
	}
	public function setCelular($celular)
	{
		return $this->celular = $celular;
	}
	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
	}
	public function setFecha_Nacimiento($fecha_Nacimiento)
	{
		$this->fecha_Nacimiento = $fecha_Nacimiento;	
	}
	public function setHistoria($id_historia_clinica)
	{
		$this->id_historia_clinica = $id_historia_clinica;	
	}
	public function setDomicilio($domicilio)
	{
		$this->domicilio = $domicilio;
	}
	public function setEscolaridad($escolaridad)
	{
		$this->escolaridad = $escolaridad;
	}
	public function setEstado($estado)
	{
		$this->estado = $estado;
	}
	public function cargarPaciente($id_usuario, $rol)
	{
		$sql = "CALL sp_CargarUser(:id_usuario,:rol)";
		$query = $this->db->prepare($sql);
		$parameters = arraY(':id_usuario' => $id_usuario, ':rol' =>$rol);

		$query->execute($parameters);

		return $query->fetchAll();
	}	

	public function consultarPaciente($id_Paciente)
	{
		$sql = "CALL SP_CargarPacienteSeleccionado(:id_paciente)";
	    $query = $this->db->prepare($sql);
	    $parameters = array(':id_paciente'=>$id_Paciente);
	    $query->execute($parameters);
	    	
	    return $query->fetchAll();
	}


}
?>