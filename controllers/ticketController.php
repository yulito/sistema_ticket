<?php
require_once 'models/ticket.php';

class ticketController{

    public function index() {    
        if(isset($SESSION['user'])){
            //require_once 'views/ticket/list.php';
        }else{
            //require_once 'views/session/login.php';
        } 
        require_once 'views/users/add.php'; //solo para agregar los primeros usuarios y hacer pruebas
    }
    //------------------

    
}