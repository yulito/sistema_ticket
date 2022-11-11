<?php
require_once 'models/departamento.php';
require_once 'helper/utils.php';

class deptoController{

    public function check(){
        if(isset($_SESSION['user']['admin'])){
            $deptos = Utils::showDeptos();
            require_once 'views/depto/depto.php';
        }else{
            header("Location: ".base_url);
        }
    }
     //-------------------------------
    public function add(){
        if(isset($_POST['depto'])){
            $depto = isset($_POST['depto']) ? $_POST['depto'] : NULL;

            if(empty($depto)){
                $_SESSION['error']['empty-field'] = 'Se esta enviando un campo vacío.';
            }else{
                $obj = new Departamento();
                $obj->setDepto($depto);
                $resp = $obj->insert();
                if($resp){
                    $_SESSION['msg']['success'] = 'Operación realizada con exito!!.';
                }else{
                    $_SESSION['msg']['error'] = 'No se ha podido completar la operación :( .';
                }
            }            
        }
        
        header("Location: ".base_url."depto/check");
    }
    //-------------------------------
    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $obj = new Departamento();
            $obj->setIdDepto($id);
            $resp = $obj->delete();
            if($resp){
                $_SESSION['msg']['success'] = 'Operación realizada con exito!!.';
            }else{
                $_SESSION['msg']['error'] = 'No se ha podido completar la operación :( .';
            }
        }
        header("Location: ".base_url."depto/check");
    } 
}