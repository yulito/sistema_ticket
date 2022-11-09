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
}