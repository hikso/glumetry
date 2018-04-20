<?php 
	

class ModelMedico
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
	private $id_medico;
    private $nombre;
    private $apellido;
    private $tipo_documento;
    private $documento;
    private $genero;
    private $telefono;
    private $celular;
    private $centro_de_trabjo;
    private $id_especializacion;
    private $url = '/medicos';
	
	// Getters clase médico
	public function getUrl()
	{
		return $this->url;
	}
	public function getId_Medico()
	{
		return $this->id_medico;
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
		return $this->tipo_documento;
	}
	public function getDocumento()
	{
		return $this->documento;
	}
	public function getGenero()
	{
		return $this->genero;
	}
	public function getTelefono()
	{
		return $this->telefono;
	}
	public function getCelular()
	{
		return $this->celular;
	}
	public function getCentro_De_Trabjo()
	{
		return $this->centro_de_trabjo;
	}
	public function getId_Especializacion()
	{
		return $this->id_especializacion;
	}

	// Setters clase medico

	public function setId_Medico($id_medico)
	{
    	$this->id_medico = $id_medico;
	}
	public function setNombre($nombre)
	{
    	$this->nombre = $nombre;
	}
	public function setApellido($apellido)
	{
    	$this->apellido = $apellido;
	}
	public function setTipo_Documento($tipo_documento)
	{
    	$this->tipo_documento = $tipo_documento;
	}
	public function setDocumento($documento)
	{
    	$this->documento = $documento;
	}
	public function setGenero($genero)
	{
    	$this->genero = $genero;
	}
	public function setTelefono($telefono)
	{
    	$this->telefono = $telefono;
	}
	public function setCelular($celular)
	{
    	$this->celular = $celular;
	}
	public function setCentro_De_Trabjo($centro_de_trabjo)
	{
    	$this->centro_de_trabjo = $centro_de_trabjo;
	}
	public function setId_Especializacion($id_especializacion)
	{
    	$this->id_especializacion = $id_especializacion;
	}

		public function cargarPacientes()
	    {
	        $sql = "CALL sp_CargarPaciente()";
	        $query = $this->db->prepare($sql);
	        $query->execute();

	        return $query->fetchAll();
	    }
	    public function cargarMedico($id_usuario, $rol)
	    {
			$sql = "CALL sp_CargarUser(:id_usuario,:rol)";
	        $query = $this->db->prepare($sql);
	        $parameters = arraY(':id_usuario' => $id_usuario, ':rol' =>$rol);

	        $query->execute($parameters);

	        return $query->fetchAll();


	    }
	    public function consultarGlucometria($historia)
	    {
	    	$sql = "CALL sp_ConsultarGlucometrias (?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $historia, PDO::PARAM_INT);
	    	$query->execute();
 
	    	return $query->fetchAll();
	    }
	    public function consultarDosificacion($historia)
	    {
	    	$sql = "CALL sp_consultarDosificacion(?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $historia, PDO::PARAM_INT);
	    	$query->execute();
 
	    	return $query->fetchAll();
	    }
	    public function sp_cargar_rangos_Paciente_Medico($id_rangos)
	    {
	    	$sql = "CALL sp_cargar_rangos_Paciente_Medico(:id_rangos)";
	    	$query = $this->db->prepare($sql);
	    	$parameters = array(':id_rangos'=>$id_rangos);
	    	$query->execute($parameters);
	    	
	    	return $query->fetchAll();
	    }
	    public function cargarPacienteSeleccionado($id_Paciente)
	    {

	    	$sql = "CALL SP_CargarPacienteSeleccionado(:id_paciente)";
	    	$query = $this->db->prepare($sql);
	    	$parameters = array(':id_paciente'=>$id_Paciente);
	    	$query->execute($parameters);
	    	
	    	return $query->fetchAll();
	    }
}


 ?>