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

    public function insertTicket() {
        $sql = "INSERT INTO ticket VALUES(NULL,'{$this->getAsunto()}','{$this->getDescripcion()}',NOW(),NULL,'{$this->getIdUsuario()}',1,NULL)";
        $query = $this->db->query($sql);
        return $query;
    }

    //--------------------------------------------

    public function getAll($bool = null){
        $sql = "SELECT id_ticket,asunto,fecemision,fecsolucion,nombre,estado,depto 
                FROM ticket INNER JOIN usuario USING(id_usuario) 
                INNER JOIN estado USING(id_estado)  
                INNER JOIN departamento USING(id_depto) ";
        if($bool){
            $sql .= "WHERE id_estado = '{$this->getIdEstado()}' ";
        }
        if(!isset($_SESSION['user']['admin'])){
            $id = $_SESSION['user']['regular']->id_usuario;
            $sql .= "AND id_usuario = '$id' ";
        }
        $sql .= "ORDER BY id_ticket DESC;";

        $query = $this->db->query($sql);
        return $query;        
    }
    //--------------------------------------------

    public function getOne(){
        $sql = "SELECT id_ticket,asunto,descripcion,fecemision,fecsolucion,nombre,correo,id_estado,estado,solucion,depto 
                FROM ticket INNER JOIN usuario USING(id_usuario) 
                INNER JOIN estado USING(id_estado)
                INNER JOIN departamento USING(id_depto)
                WHERE id_ticket = '{$this->getIdTicket()}'";

        $query = $this->db->query($sql);
        return $query->fetch_object();
    }
    //---------------------------------------------
    public function update(){    
        $sql = "UPDATE ticket 
                SET id_estado = '{$this->getIdEstado()}',
                    solucion = '{$this->getSolucion()}'";
        if($this->getIdEstado() == 2){
            $sql .= ",fecsolucion = NOW()";
        }
        $sql .= " WHERE id_ticket = '{$this->getIdTicket()}'";
        $query = $this->db->query($sql);
        return $query;
    }
    //---------------------------------------------
    public function delete(){
        $sql = "DELETE FROM ticket WHERE id_ticket= '{$this->getIdTicket()}'";
        $query = $this->db->query($sql);
        return $query;
    }

}