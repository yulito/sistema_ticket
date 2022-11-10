<?php
require_once 'models/ticket.php';
//require_once 'helper/utils.php'; 

class ticketController{

    public function index() {    
        if(isset($_SESSION['user'])){
            require_once 'views/ticket/add.php';
        }else{
            require_once 'views/session/login.php';
        }         
    }
    //------------------

    public function add() {
        if(isset($_SESSION['user'])){
            if(isset($_POST)){
                $asunto = isset($_POST['asunto']) ? $_POST['asunto'] : NULL;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : NULL;

                if(empty($asunto) || empty($descripcion)){
                    $_SESSION['error']['empty-fields'] = 'Se están enviando campos vacíos';
                }

                if(empty($_SESSION['error'])){
                    $obj = new Ticket();
                    $obj->setAsunto($asunto);
                    $obj->setDescripcion($descripcion);
                    $obj->setIdUsuario($_SESSION['user']['regular']->id_usuario);
                    
                    $resp = $obj->insertTicket();

                    if($resp){
                        $_SESSION['msn']['success'] = 'Operación realizada con exito!!';
                    }else{
                        $_SESSION['msn']['error'] = 'No se ha podido realizar la operación.';
                    }
                }
            }
                      
        }
        header('Location: '.base_url);
    }
    //------------------------------------------------------------------------

    public function standby() {
        $obj = new Ticket();
        $obj->setIdEstado(1);        
        $list = $obj->getAll(true);
        
        $nomEstado = 'Pendientes';
        require_once 'views/ticket/list.php';
    }    
    //----------
    
    public function inprocess() {
        $obj = new Ticket();
        $obj->setIdEstado(3);
        $list = $obj->getAll(true);
        
        $nomEstado = 'Procesando';        
        require_once 'views/ticket/list.php';
    }

    //----------------
    
    public function resolved() {
        $obj = new Ticket();
        $obj->setIdEstado(2);
        $list = $obj->getAll(true);
       
        $nomEstado = 'Resueltos';
        require_once 'views/ticket/list.php';
    }

    //-----------------------------------------------

    public function watch(){
        if(isset($_GET['id'])){
            $obj = new Ticket();
            $obj->setIdTicket($_GET['id']);

            $one = $obj->getOne();
            require_once 'views/ticket/ticket.php';
            
        }else{
            require_once 'views/ticket/add.php';
        }
    }

}