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
        $this->name = $this->db->real_escape_string(strtoupper($name));
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

    //----------------------------------------------------

    public function insertUser() {
        $sql = "INSERT INTO usuario VALUES(NULL,'{$this->getName()}','{$this->getMail()}','{$this->getPass()}','{$this->getIdDepto()}','{$this->getIdTipo()}')";
        $tipos = $this->db->query($sql);
		return $tipos;
    }

    //---------------------------------------------------------

    public function sesion($id,$acceso){

        $sql = "INSERT INTO sesion VALUES(NULL, NOW(),'$acceso','$id')";
        $query = $this->db->query($sql);
        if($query){
            $result = true;
        }
        return $result;
    }
    
    //---------------------------------------------------------
    public function login($password) {        

        $correo = $this->getMail();
		
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuario WHERE correo = '$correo'";
		$login = $this->db->query($sql);		
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password); 
			$result = false;
			if($verify){
                //Guardamos la sesion
                $this->sesion($usuario->id_usuario,1);
				$result = $usuario;
			}
		}

        return $result;
    }

    //-----------------------------------------------------------------------

    public function getAll($id=null){
        $sql = "SELECT id_usuario,nombre,correo,depto,tipo FROM usuario LEFT JOIN departamento USING(id_depto) 
                INNER JOIN tipo_usuario USING(id_tipo)";
        if($id){
            $sql .= " WHERE id_usuario != '$id'";
        }
        $sql .= " ORDER BY id_usuario DESC;";
        $query = $this->db->query($sql);
        return $query;
    }
    //-----------------------------------------------------------------------
    public function getOne() {
        $sql = "SELECT id_usuario,nombre,correo,id_depto,depto,id_tipo,tipo 
                FROM usuario LEFT JOIN departamento USING(id_depto) 
                INNER JOIN tipo_usuario USING(id_tipo)
                WHERE id_usuario = '{$this->getIdUser()}'";
        $query = $this->db->query($sql);
        return $query->fetch_object();
    }

    //----------------------------------------------------------------------
    public function delete(){
        $sql = "DELETE FROM sesion WHERE id_usuario = '{$this->getIdUser()}'";
        $sql1 = "DELETE FROM ticket WHERE id_usuario = '{$this->getIdUser()}'";
        $sql2 = "DELETE FROM usuario WHERE id_usuario = '{$this->getIdUser()}'";
        $sesion = $this->db->query($sql);
        $ticket = $this->db->query($sql1);
        $query = $this->db->query($sql2);
        return $query;
    }
    //----------------------------------------------------------------------
    public function modify(){
        $sql = "UPDATE usuario 
                SET id_tipo = '{$this->getIdTipo()}',
                id_depto = '{$this->getIdDepto()}'
                WHERE id_usuario = '{$this->getIdUser()}';";

        $query = $this->db->query($sql);
        return $query;
    }

}