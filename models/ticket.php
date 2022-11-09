<?php

class Ticket{

    private $idTicket;
    private $asunto;
    private $descripcion;
    private $idUsuario;
    private $idEstado;
    private $solucion;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    //GETTERS
    function getIdTicket() {
        return $this->idTicket;
    }
    function getAsunto() {
        return $this->asunto;
    }
    function getDescripcion() {
        return $this->descripcion;
    }
    function getIdUsuario() {
        return $this->idUsuario;
    }
    function getIdEstado() {
        return $this->idEstado;
    }
    function getSolucion() {
        return $this->solucion;
    }
    //SETTERS
    function setIdTicket($idTicket) {
        $this->idTicket = $idTicket;
    }
    function setAsunto($asunto) {
        $this->asunto = $this->db->real_escape_string($asunto);
    }
    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }
    function setIdUsuario($idUsuario) { 
        $this->idUsuario = $idUsuario;
    }
    function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
    }
    function setSolucion($solucion) {
        $this->solucion = $this->db->real_escape_string($solucion);
    }

    //--------------------------------------------

    

}