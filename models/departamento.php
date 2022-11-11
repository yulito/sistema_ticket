<?php

class Departamento{

    private $idDepto;
    private $depto;

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getIdDepto() {
        return $this->idDepto;
    }
    function getDepto() {
        return $this->depto;
    }

    function setIdDepto($idDepto) {
        $this->idDepto = $idDepto;
    }
    function setDepto($depto) {
        $this->depto = $this->db->real_escape_string($depto);
    }

    //-------------------------------

    public function getAll() {
        $deptos = $this->db->query("SELECT * FROM departamento ORDER BY id_depto DESC;");
		return $deptos;
    }
    //-------------------------------
    public function insert(){
        $sql = "INSERT INTO departamento VALUES(NULL,'{$this->getDepto()}')";
        $query = $this->db->query($sql);
        return $query;
    }
    //-------------------------------
    public function delete(){
        //seleccionar id_usuario todos los usuarios que tienen el id_depto solicitado en un arreglo
        $sql = "SELECT id_usuario FROM USUARIO WHERE id_depto = '{$this->getIdDepto()}'";
        $cursor = $this->db->query($sql);        
        //con un ciclo for o while recorrer cada id_usuario para actualizar el id_depto = null de tabla usuario
        while($lista = $cursor->fetch_object()){
			$sql1 = "UPDATE usuario SET id_depto = NULL WHERE id_usuario = '$lista->id_usuario'";
			$ciclo = $this->db->query($sql1);
		}
        //finalmente eliminar el depto
        $sql2 = "DELETE FROM departamento WHERE id_depto = '{$this->getIdDepto()}'";
        $query = $this->db->query($sql2);
        return $query;
    }
}