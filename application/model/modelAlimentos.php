<?php
class modelAlimentos
{
	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}
	public $id_alimento;
	public $descripcion;
	public $id_tamaño_porcion;
	public $id_unidad_medida;
	public $id_clasificacion;
	public $peso;
	public $carbohidratos;
	public $proteinas;
	public $grasas;
	public $indice_Glucemico;
	
		//get
	public function getId_Alimento()
	{
		return $this->id_alimento;
	}
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	public function getId_tamano_Porcion()
	{
		return $this->id_tamaño_porcion;
	}

	public function get_Peso()
	{
		return $this->peso;
	}

	public function getId_Unidad_Medida()
	{
		return $this ->id_unidad_medida; 
	} 
	
	public function getid_clasificacion()
	{
		return $this ->id_clasificacion; 
	}

	public function get_Carbohidratos()
	{
		return $this ->carbohidratos; 
	}

	public function getProteinas()
	{
		return $this ->proteinas; 
	}

	public function getGrasas()
	{
		return $this ->grasas; 
	}

	public function getindice_Glucemico()
	{
		return $this ->indice_Glucemico; 
	}
		//set

	public function setId_Alimento($id_alimento)
	{
		$this->id_alimento = $id_alimento;
	}
	public function setdescripcion($descripcion)
	{
		 $this->descripcion = $descripcion;
	}

	public function setId_tamano_Porcion($id_tamaño_porcion)
	{
		$this->id_tamaño_porcion = $id_tamaño_porcion;
	}

	public function set_Peso($peso)
	{
		 $this->peso = $peso;
	}

	public function setId_Unidad_Medida($id_unidad_medida)
	{
		 $this ->id_unidad_medida = $id_unidad_medida; 
	} 
	
	public function setid_clasificacion($id_clasificacion)
	{
		$this->id_clasificacion = $id_clasificacion;
	}

	public function set_Carbohidratos($carbohidratos)
	{
		$this ->carbohidratos = $carbohidratos; 
	}

	public function getProteinas($proteinas)
	{
		$this ->proteinas = $proteinas; 
	}

	public function setGrasas($grasas)
	{
		$this ->grasas = $grasas; 
	}

	public function getindice_Glucemico($indice_Glucemico)
	{
		$this ->indice_Glucemico = $indice_Glucemico; 
	}
	

	public function RegistrarAlimentos($id_tamaño_porcion, $descripcion, $peso, $id_unidad_medida, $clasificacion, $carbohidratos, $proteinas, $grasas, $indice_Glucemico)
	{
		
			$sql = "CALL SP_Registrar_Alimento  (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $id_tamaño_porcion, PDO::PARAM_STR);
			$query->bindValue(2, $descripcion, PDO::PARAM_STR);
			$query->bindValue(3, $peso, PDO::PARAM_STR);
			$query->bindValue(4, $id_unidad_medida, PDO::PARAM_STR);
			$query->bindValue(5, $clasificacion, PDO::PARAM_STR);
			$query->bindValue(6, $carbohidratos, PDO::PARAM_STR);
			$query->bindValue(7, $proteinas, PDO::PARAM_STR);
			$query->bindValue(8, $grasas, PDO::PARAM_STR);
			$query->bindValue(9, $indice_Glucemico, PDO::PARAM_STR);
			$query->execute();
			echo "Registro";

}

}

public function ListarClasificacion()
{
	$sql = "SELECT * FROM tbl_clasificacion";
	$query = $this->db->prepare($sql);
	$query->execute();
	return $query->fetchAll();		
}
}

?>
