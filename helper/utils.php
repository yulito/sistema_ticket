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
}