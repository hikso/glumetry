<?php

class modelMetodosPlanificacion 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id_metodo_planificacion;
	public $descripcion;

	//get
	public function getid_metodo_planificacion()
	{
		return $this ->id_metodo_planificacion;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid_metodo_planificacion($id_metodo_planificacion)
	{
		$this->id_metodo_planificacion = $id_metodo_planificacion;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function RegistrarMetodoPlanificacion ($descripcion){
		$sql = "CALL SP_Registrar_MetodoPlanificacion (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}
}
?>
