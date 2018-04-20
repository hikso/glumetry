<?php

class ModelLogin
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    /**
     * 
     */
    //Cargar menu dinamico
    public function SP_CargarMenu($rol)
    {
        $sql = "CALL SP_CargarMenu(?)";
        $query = $this->db->prepare($sql);
        $query->bindValue(1, $rol, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
    public function SP_CargarSubMenus($rol)
    {
        $sql = "CALL SP_CargarSubMenus(?)";
        $query = $this->db->prepare($sql);
        $query->bindValue(1, $rol, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
    public function validarLogin($correo)
    {
        $sql = "CALL sp_ValidarLogin (:correo, '',0,'',0,0);";
        $query = $this->db->prepare($sql);
        $parameters = arraY(':correo' => $correo);

        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function cargarUsuario($id_usuario, $rol)
    {
        $sql = "CALL sp_CargarUser(:id_usuario,:rol)";
        $query = $this->db->prepare($sql);
        $parameters = arraY(':id_usuario' => $id_usuario, ':rol' =>$rol);

        $query->execute($parameters);

        return $query->fetchAll();

    }
    public function SP_ValidarDocumentoRecuperar($doc)
    {
        $sql = "CALL SP_ValidarDocumentoRecuperar(:doc)";
        $query = $this ->db->prepare($sql);
        $parameters = arraY(':doc' => $doc);

        $query->execute($parameters);

        return $query->fetchAll();
    }
    public function SP_UpdateContra($nuevaPass, $id_usuario)
    {
        $sql = "CALL SP_UpdateContra(:nueva, :id_user)";
        $query = $this->db->prepare($sql);

        $parameters = arraY(':nueva' => $nuevaPass, 'id_user'=> $id_usuario);

        $query->execute($parameters);
        
        return $query->execute();

    }
    public function SP_GetCorreo($id_user)
    {
        $sql = "CALL SP_GetCorreo(:id_user)";
        $query = $this->db->prepare($sql);
        $parameters = arraY(':id_user' => $id_user);
        $query->execute($parameters);

        return $query->fetchAll();
    }
    public function tipodoc()
    {
        $sql = "SELECT id_tipo_documento, descripcion FROM tbl_tipo_documento;";
        
        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetchAll();
    }
}
