<?php

class User{

    private $idUser;
    private $name;
    private $mail;
    private $pass;
    private $idDepto;
    private $idTipo;

    private $db;

    public function __construct() {
		$this->db = Database::connect();
	}

    function getIdUser() {
        return $this->idUser;
    }
    function getName() {
        return $this->name;
    }
    function getMail() {
        return $this->mail;
    }
    function getPass() {
        return $this->pass;
    }
    function getIdDepto() {
        return $this->idDepto;
    }
    function getIdTipo() {
        return $this->idTipo;
    }
    //-----------------------------
    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }
    function setName($name) {
        $this->name = $this->db->real_escape_string($name);
    }
    function setMail($mail) {
        $this->mail = $this->db->real_escape_string($mail);
    }
    function setPass($pass) {
        $this->pass = password_hash($this->db->real_escape_string($pass), PASSWORD_BCRYPT, ['cost' => 4]);
    }
    function setIdDepto($idDepto) {
        $this->idDepto = $idDepto;
    }
    function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    
}