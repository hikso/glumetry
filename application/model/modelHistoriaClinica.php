<?php 

class modelHistoriaClinica
{
	/**
     * @param object $db A PDO database connection
    */
	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public function sp_mostrar_heredo(){

		$sql = "CALL sp_mostrar_heredo()";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function sp_MostrarTipoAnte(){

		$sql = "CALL sp_MostrarTipoAnte()";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}	

	public function sp_mostrar_habitosp(){

		$sql = "CALL sp_mostrar_habitosp()";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function sp_mostrar_nopato() {

		$sql = " CALL sp_mostrar_nopato()";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll(); 
	}

	public function sp_mostrar_sintomas_g(){

		$sql = "CALL sp_mostrar_sintomas_g()";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function sp_mostrar_aparatosistema(){

		$sql = "CALL sp_mostrar_aparatosistema()";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function sp_mostrar_partescuerpo(){
		$sql = "CALL sp_mostrar_partescuerpo()";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function sp_mostrar_clase_pc(){
		$sql = "CALL sp_mostrar_clase_pc()";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function sp_mostrar_estado_clasePc(){
		$sql = "CALL sp_mostrar_estado_clasePc()";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function sp_mostrar_parentesco(){
		$sql = "CALL sp_mostrar_parentesco()";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function hora(){
		$sql = "CALL sp_hora()";
		$query = $this->db->prepare($sql);
		$query-> execute();

		return $query->fetchAll();
	}

	

	public function sp_cargar_datosgineco($historia){
		$sql = "CALL sp_cargar_datosgineco(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);
		$query->execute();

		return $query->fetchAll();
	}

	public function sp_guardar_gineco($historia,$nparejas,$menarca,$ritmo,$dismi,$ivsa,$climaterio,$g,$a,$p,$c,$fum,$fpp,$fup,$plani,$cit,$exmamas){

		$sql = "CALL sp_guardar_gineco(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);
		$query->bindValue(2, $nparejas, PDO::PARAM_STR);
		$query->bindValue(3, $menarca, PDO::PARAM_STR);
		$query->bindValue(4, $ritmo, PDO::PARAM_STR);
		$query->bindValue(5, $dismi, PDO::PARAM_STR);
		$query->bindValue(6, $ivsa, PDO::PARAM_STR);
		$query->bindValue(7, $climaterio, PDO::PARAM_STR);
		$query->bindValue(8, $g, PDO::PARAM_STR);
		$query->bindValue(9, $a, PDO::PARAM_STR);
		$query->bindValue(10, $p, PDO::PARAM_STR);
		$query->bindValue(11, $c, PDO::PARAM_STR);
		$query->bindValue(12, $fum, PDO::PARAM_STR);
		$query->bindValue(13, $fpp, PDO::PARAM_STR);
		$query->bindValue(14, $fum, PDO::PARAM_STR);
		$query->bindValue(15, $plani, PDO::PARAM_STR);
		$query->bindValue(16, $cit, PDO::PARAM_STR);
		$query->bindValue(17, $exmamas, PDO::PARAM_STR);
		$query->execute();

	}
	
	public function sp_cargar_vista_aparato($historia){
		$sql = "CALL sp_cargar_vista_aparato(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);
		$query->execute();

		return $query->fetchAll();
	}

	public function SP_Mostrar_gineco($idpaciente){

		$sql = "CALL SP_Mostrar_gineco (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $idpaciente, PDO::PARAM_INT);
		$query->execute();

		return $query->fetchAll();
	}


	public function sp_guardar_hc($impresion,$tramaiento,$padecimiento,$id_paciente,$historia){

		$sql = "CALL sp_guardar_hc(?,?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $impresion, PDO::PARAM_STR);
		$query->bindValue(2, $tramaiento, PDO::PARAM_STR);
		$query->bindValue(3, $padecimiento, PDO::PARAM_STR);
		$query->bindValue(4, $id_paciente, PDO::PARAM_INT);
		$query->bindValue(5, $historia, PDO::PARAM_INT);

		$query->execute();
		return $query->fetchAll();
	}


	public function sp_guardar_antecedentes($AJclasi,$historia){
		
		foreach ($AJclasi as $key => $value) {

		$id_clasificacion_antecedente = $value['id_clasi'];
		$id_parentesco = $value['id_parentesco'];
		$descripcion_clasi = $value ['descripcion_clasi'];


		$sql = "CALL sp_guardar_antecedentes(?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id_clasificacion_antecedente, PDO::PARAM_INT);
		if ($value['id_parentesco'] == ""){
			$query->bindValue(2, 4, PDO::PARAM_INT);
		}else{
			$query->bindValue(2, $id_parentesco, PDO::PARAM_INT);
		}
		$query->bindValue(3, $descripcion_clasi, PDO::PARAM_STR);
		$query->bindValue(4, $historia, PDO::PARAM_INT);

		$query->execute();

		}
		

	}
	public function sp_cargar_vista_antecedentes_historia($historia)
	{
		$sql = "CALL sp_cargar_vista_antecedentes_historia(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);

		$query->execute();
		return $query->fetchAll();
	}
	public function sp_cargar_vista_nopato($historia)
	{
		$sql = "CALL sp_cargar_vista_nopato(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);

		$query->execute();
		return $query->fetchAll();
	}
	public function sp_cargar_vista_sintomas($historia)
	{
		$sql = "CALL sp_cargar_vista_sintomas(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);

		$query->execute();
		return $query->fetchAll();
	}
	public function sp_cargar_vista_partedelcuerpo($historia)
	{

		$sql = "CALL sp_cargar_vista_partedelcuerpo(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);

		$query->execute();
		return $query->fetchAll();
	}
	public function sp_guardar_no_patologicos($jsonfrecu,$historia){


		$sql = "CALL Sp_borrar_no_patologico(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);
		$query->execute();

		foreach ($jsonfrecu as $key => $value) {

		$id_frecuencia = $value['id_frecuencia'];

		$sql = "CALL sp_guardar_no_patologicos(?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id_frecuencia, PDO::PARAM_INT);
		$query->bindValue(2, $historia, PDO::PARAM_INT);

		$query->execute();

		}

	}


	public function sp_actualizar_txt($p1,$p2,$p3,$p4){
		$sql = "CALL sp_actualizar_txt(?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $p1, PDO::PARAM_STR);
		$query->bindValue(2, $p2, PDO::PARAM_STR);
		$query->bindValue(3, $p3, PDO::PARAM_STR);
		$query->bindValue(4, $p4, PDO::PARAM_INT);
		$query->execute();

	}


	public function sp_guardar_sintomas($parametro,$historia){

		$sql = "CALL Sp_borrar_Sintomas_g(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);
		$query->execute();
		if (!is_null($parametro)) {
			foreach ($parametro as $key => $value) {
				$id_sintomas = trim($value['id_sintomas']);
				$sql = "CALL sp_guardar_sintomas(?,?)";
				$query = $this->db->prepare($sql);
				$query->bindValue(1, $id_sintomas, PDO::PARAM_INT);
				$query->bindValue(2, $historia, PDO::PARAM_INT);

				$query->execute();
			}
		}

	}

	public function sp_guardar_aparato_sistema($aparato,$historia){


		
		$sql = "CALL Sp_borrar_aparato(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);

		$query->execute();

		foreach ($aparato as $key => $value) {

		$id_aparato = $value['id_aparato'];
		$descrip = $value['descripcion_aparato'];
		
		$sql = "CALL sp_guardar_aparato_sistema(?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descrip, PDO::PARAM_STR);
		$query->bindValue(2, $id_aparato, PDO::PARAM_INT);
		$query->bindValue(3, $historia, PDO::PARAM_INT);

		$query->execute();
		}

	}

	public function sp_guardar_parte_cuerpo($jsonaparato,$historia){


		$sql = "CALL Sp_borrar_partesdelcuerpo(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);

		$query->execute();

		foreach ($jsonaparato as $key => $value) {
		
		$id_estadopc = $value['id_estadopc'];
		$sql = "CALL sp_guardar_parte_cuerpo(?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id_estadopc, PDO::PARAM_INT);
		$query->bindValue(2, $historia, PDO::PARAM_INT);

		$query->execute();
		}
	}

	public function sp_guardar_visita($observacion,$idmedico,$historia){

		$sql = "CALL sp_guardar_visita(?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, date("Y/m/d H:i:s"), PDO::PARAM_STR);
		$query->bindValue(2, $observacion, PDO::PARAM_STR);
		$query->bindValue(3, $idmedico, PDO::PARAM_INT);
		$query->bindValue(4, $historia, PDO::PARAM_INT);

		$query->execute();
		return $query->fetchAll();


	}


	public function cargartextareashc($historia){

		$sql = "CALL sp_cargartxtshc(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);
		$query->execute();
		return $query->fetchAll();


	}

	public function sp_actualizar_url($url,$idvisita){
		$sql = "CALL sp_actualizar_url(?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $idvisita, PDO::PARAM_INT);
		$query->bindValue(2, $url, PDO::PARAM_STR);
		$query->execute();
		return $query;

	}
	public function sp_cargar_visitas_paciente($historia){
		$sql = "CALL sp_cargar_visitas_paciente(?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $historia, PDO::PARAM_INT);
		$query->execute();
		return $query->fetchAll();

	}

	
}
 ?>