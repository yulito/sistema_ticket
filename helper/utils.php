<?php

class Utils{

    public static function showDeptos(){        
        require_once 'models/departamento.php';
		$depto = new Departamento();
		$deptos = $depto->getAll();
		return $deptos;
    }

    public static function showTipos(){    
        require_once 'config/connection.php'; 
        $db = Database::connect();   
        $tipos = $db->query("SELECT * FROM tipo_usuario ORDER BY id_tipo DESC;");
		return $tipos;
    }

    public static function deleteSession($data){
        if(isset($data)){
            $_SESSION[$data] = null;
            unset($_SESSION[$data]);
        }
        return $data;
    }

    public static function showStatus(){
        require_once 'config/connection.php';
        $db = Database::connect();   
        $estado = $db->query("SELECT * FROM estado ORDER BY id_estado DESC;");
		return $estado;
    }
    public static function change($id){
        require_once 'config/connection.php';
        $db = Database::connect();   
        $db->query("UPDATE ticket SET id_estado = 3 WHERE id_ticket = '$id'");
    }
}