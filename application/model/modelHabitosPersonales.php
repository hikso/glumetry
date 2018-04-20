<?php

class modelHabitosPersonales 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id_habitos_personales;
	public $descripcion;

	//get
	public function getid_habitos_personales()
	{
		return $this ->id_habitos_personales;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid_habitos_personales($id_habitos_personales)
	{
		$this->id_habitos_personales = $id_habitos_personales;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function RegistrarHabitosPersonales ($descripcion){
		$sql = "CALL SP_Registrar_HabitosPersonales (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}
}
?>
