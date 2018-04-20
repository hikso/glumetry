<?php

class modelTipoDocumento 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id_tipo_documento;
	public $descripcion;

	//get
	public function getid_tipo_documento()
	{
		return $this ->id_tipo_documento;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid_tipo_documento($id_tipo_documento)
	{
		$this->id_tipo_documento = $id_tipo_documento;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function RegistrarTipoDocumento ($descripcion){
		$sql = "CALL SP_Registrar_TipoDocumento (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}
}
?>
