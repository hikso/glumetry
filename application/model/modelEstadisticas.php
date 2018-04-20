<?php
	class modelEstadisticas
	{
		function __construct($db)
	    {
	        try {
	            $this->db = $db;
	        } catch (PDOException $e) {
	            exit('Database connection could not be established.');
	        }
		} 


		public function sp_Estadisticas_glucometrias_Paciente($historia)
		{
			$sql = "CALL sp_Estadisticas_glucometrias_Paciente(?)";
	        $query = $this->db->prepare($sql);
	        $query->bindValue(1, $historia, PDO::PARAM_INT);
	        $query->execute();
	        return $query->fetchAll();
		}
		public function sp_estadisticas_barras_paciente($historia, $fecha_inicio, $fecha_fin)
		{
			$sql = "CALL sp_estadisticas_barras_paciente(?,?,?)";
	        $query = $this->db->prepare($sql);
	        $query->bindValue(1, $historia, PDO::PARAM_INT);
	        $query->bindValue(2, $fecha_inicio, PDO::PARAM_STR);
	        $query->bindValue(3, $fecha_fin, PDO::PARAM_STR);
	        $query->execute();
	        return $query->fetchAll();	
		}
		public function sp_cargar_rangos_Paciente($historia)
		{
			$sql = "CALL sp_cargar_rangos_Paciente(?)";
	        $query = $this->db->prepare($sql);
	        $query->bindValue(1, $historia, PDO::PARAM_INT);
	        $query->execute();
	        return $query->fetchAll();
		}

	}
