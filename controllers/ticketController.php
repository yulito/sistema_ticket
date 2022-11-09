<?php
require_once 'models/ticket.php';
//require_once 'helper/utils.php'; //luego hay que sacarlo ya que no va aca

class ticketController{

    public function index() {    
        if(isset($_SESSION['user'])){
            require_once 'views/ticket/add.php';
        }else{
            require_once 'views/session/login.php';
        } 
        //$deptos = Utils::showDeptos();
        //$tipos = Utils::showTipos();
        //require_once 'views/users/add.php'; //solo para agregar los primeros usuarios y hacer pruebas
    }
    //------------------

    
}