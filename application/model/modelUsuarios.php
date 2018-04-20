<?php 
/**
* 
*/
	class modelUsuarios
	{

		function __construct($db)
		{
			try {
				$this->db = $db;
			} catch (PDOException $e) {
				exit('Database connection could not be established.');
			}
		}
		public function sp_cargarMunicipio($id_departamento)
		{
			$sql = "CALL sp_cargarMunicipio (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $id_departamento, PDO::PARAM_INT);
			$query->execute();
			return $query->fetchAll();
		}
		public function SP_CargarNumCuentas()
		{
			$sql = "CALL SP_CargarNumCuentas ()";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}		
		public function SP_RegistrarUsuario($correo, $contra)
		{

			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
		    $sql = "CALL SP_RegistrarUsuario(?,?)"; 
		    $query = $this->db->prepare($sql);	
	        $query->bindValue(1, $correo, PDO::PARAM_STR);
			$query->bindValue(2, $contra, PDO::PARAM_STR);
	        $query->execute();
	        $rst = $query->fetchAll();
	        
	        return $LastId = $rst[0]->id_usuario;
		        
		}
		public function SP_AsociarCuentasPaciente($id_usuario, $id_paciente)
		{
		    $sql = "CALL SP_AsociarCuentasPaciente(?,?)";
		    $query = $this->db->prepare($sql);
	        $query->bindValue(1, $id_usuario, PDO::PARAM_INT);
			$query->bindValue(2, $id_paciente, PDO::PARAM_INT);
			return $query->execute();

		}
		public function SP_AsociarCuentasMedico($id_usuario, $id_medico)
		{
			$sql = "CALL SP_AsociarCuentasMedico(?,?)";
		    $query = $this->db->prepare($sql);
	        $query->bindValue(1, $id_usuario, PDO::PARAM_INT);
			$query->bindValue(2, $id_medico, PDO::PARAM_INT);
			return $query->execute();
		}
		public function SP_RegistrarPaciente($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $idTipoDocumento, $idEstadoCivil, $idGenero, $idEscolaridad, $ocupacion, $telefono, $documento, $idMunicipio, $celular, $fecha_nacimiento)
		{
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
		    $sql = "CALL SP_RegistrarPaciente(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
		    $query = $this->db->prepare($sql);	
	        $query->bindValue(1, $primerNombre, PDO::PARAM_STR);
			$query->bindValue(2, $segundoNombre, PDO::PARAM_STR);
			$query->bindValue(3, $primerApellido, PDO::PARAM_STR);
			$query->bindValue(4, $segundoApellido, PDO::PARAM_STR);
			$query->bindValue(5, $idTipoDocumento, PDO::PARAM_INT);
			$query->bindValue(6, $idEstadoCivil, PDO::PARAM_INT);
			$query->bindValue(7, $idGenero, PDO::PARAM_INT);
			$query->bindValue(8, $idEscolaridad, PDO::PARAM_INT);
			$query->bindValue(9, $ocupacion, PDO::PARAM_STR);
			$query->bindValue(10, $telefono, PDO::PARAM_STR);
			$query->bindValue(11, $documento, PDO::PARAM_STR);
			$query->bindValue(12, $idMunicipio, PDO::PARAM_INT);
			$query->bindValue(13, $celular, PDO::PARAM_STR);
			$query->bindValue(14, $fecha_nacimiento, PDO::PARAM_STR);
	        $query->execute();
	        $rst = $query->fetchAll();
	        
	        return $LastId = $rst[0]->id_paciente;
		}
		public function SP_ValidarRegistroUsuario($correo, $docum, $tipoUser )
		{
			$sql = "CALL SP_ValidarRegistroUsuario(?,?,?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1,$correo, PDO::PARAM_STR);
			$query->bindValue(2,$docum, PDO::PARAM_STR);
			$query->bindValue(3,$tipoUser, PDO::PARAM_INT);
			$query->execute();
			$rst = $query->fetchAll();
			 
			return $rst[0]->respuesta;
		}
		public function SP_RegistrarMedico($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $idGenero, $telefono, $celular, $centro_trabajo, $idEspecializacion, $documento,  $idTipoDocumento)
		{
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
		    $sql = "CALL SP_RegistrarMedico(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
		    $query = $this->db->prepare($sql);	
	        $query->bindValue(1, $primerNombre, PDO::PARAM_STR);
			$query->bindValue(2, $segundoNombre, PDO::PARAM_STR);
			$query->bindValue(3, $primerApellido, PDO::PARAM_STR);
			$query->bindValue(4, $segundoApellido, PDO::PARAM_STR);
			$query->bindValue(5, $idGenero, PDO::PARAM_INT);
			$query->bindValue(6, $telefono, PDO::PARAM_STR);
			$query->bindValue(7, $celular, PDO::PARAM_STR);
			$query->bindValue(8, $centro_trabajo, PDO::PARAM_STR);
			$query->bindValue(9, $idEspecializacion, PDO::PARAM_INT);
			$query->bindValue(10, $documento, PDO::PARAM_STR);
			$query->bindValue(11, $idTipoDocumento, PDO::PARAM_INT);
	        $query->execute();
	        $rst = $query->fetchAll();
	        
	        return $LastId = $rst[0]->id_medico;
		}
		public function SP_CargarUsuarios()
		{
			$sql = "CALL SP_CargarUsuarios ()";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}
		public function SP_UpdateEstado($id_usuario)
		{
			$sql = "CALL SP_UpdateEstado (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $id_usuario, PDO::PARAM_INT);
			$query->execute();
		}
		public function GetMultiSelectArrays()
		{
			$sql = "SELECT id_tipo_documento, descripcion FROM tbl_tipo_documento;";
			$sql .= "SELECT id_departamento, descripcion FROM tbl_departamento;";
			$sql .= "SELECT id_estado_civil, descripcion FROM tbl_estado_civil;";
			$sql .= "SELECT id_genero, descripcion FROM tbl_genero;";
			$sql .= "SELECT id_escolaridad, descripcion FROM tbl_escolaridad;";
			$sql .= "SELECT id_especializacion, descripcion FROM tbl_especializacion;";

			$this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

			$query = $this->db->prepare($sql);

			$query->execute();

			$rst = array();

			do {
			    $rowset = $query->fetchAll();
			    if($rowset) {               
			        array_push($rst, $rowset);
			    }       
			} while($query->nextRowset	());

			return $rst;
			
		}
	}
 ?>