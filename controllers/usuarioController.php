<?php
require_once 'models/user.php';
require_once 'helper/utils.php'; 

class usuarioController{

    public function add() {

    if(isset($_SESSION['user'])){
        if(isset($_POST)){
            
            $usuario = isset($_POST['user']) ? $_POST['user'] : NULL;
            $depto = isset($_POST['depto']) ? (int)$_POST['depto'] : NULL;
            $tipo = isset($_POST['tipo']) ? (int)$_POST['tipo'] : NULL;
            $email = isset($_POST['email']) ? $_POST['email'] : NULL;
            $password = isset($_POST['password']) ? $_POST['password'] : NULL;
            
            if(empty($usuario) || empty($depto) || empty($email) || empty($password)){
                $_SESSION['error']['empty-fields'] = 'Se estan enviando campos vacios';
            }
            if(!is_numeric($depto) || !is_numeric($tipo)){
                $_SESSION['error']['is_string'] = 'Se estan enviando datos incorrectos';
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION['error']['email'] = 'El formato del correo no es correcto';
            }
            if(strlen($password) > 10){
                $_SESSION['error']['max'] = 'Excede el máximo de caracteres solicitados en el password';
            }
            if(strlen($password) < 4){
                $_SESSION['error']['min'] = 'El mínimo de caracteres solicitados para el password es 4';
            }
            if(!isset($_SESSION['error'])){
                //realizamos la operacion
                $obj = new User();
                $obj->setName($usuario);
                $obj->setMail($email);
                $obj->setPass($password);
                $obj->setIdDepto($depto);
                $obj->setIdTipo($tipo);
                
                $obj->insertUser();

                if($obj){
                    $_SESSION['msn']['success'] = 'Operación realizada con exito!!';
                }else{
                    $_SESSION['msn']['error'] = 'No se ha podido realizar la operación.';
                }
                //no necesitamos poner un else, ya que si existe error enviara de todos modos a la pagina con el require_once.
            }            
        }
        else{
            //error, no se ha enviado ningun post
            $_SESSION['msn']['error-post'] = 'No se ha enviado ningún post.';
        }

    }
    header("Location:".base_url."usuario/check");
    }
    //----------------------------------------------------------------------------------

    public function login() {
        if(isset($_POST)){
            $email = isset($_POST['email']) ? $_POST['email'] : NULL;
            $password = isset($_POST['password']) ? $_POST['password'] : NULL;
            
            if(empty($email) || empty($password)){
                $_SESSION['error']['empty-fields'] = 'Se están enviando campos vacíos';
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION['error']['email'] = 'El formato del correo no es correcto';
            }
            
            if(empty($_SESSION['error'])){
                
                $usuario = new User();
                $usuario->setMail($email);

                $login = $usuario->login($password); 
                
                if($login) {
                    Utils::deleteSession('error');
                    $_SESSION['user']['regular'] = $login;
                    if($login->id_tipo == 1) {
                        $_SESSION['user']['admin'] = true;
                    }

                }else{
                    $_SESSION['error']['identification'] = 'Identificación fallida !!';            
                }
            }                         
        }
        header('Location: '.base_url);
    }

    //-------------------------------------

    public function logout(){

        $usuario = new User();
        $usuario->sesion($_SESSION['user']['regular']->id_usuario,2);

        unset($_SESSION['user']);
        
        header("Location:".base_url);
    }
    //---------------------------------------
    public function check() {
        $deptos = Utils::showDeptos();
        $tipos = Utils::showTipos();
        $obj = new User();
        $list = $obj->getAll($_SESSION['user']['regular']->id_usuario);

        if(!$list){
            $_SESSION['error-list'] = 'No hay usuarios agregados';
        }
        require_once 'views/users/add.php';
    } 
    //---------------------------------------

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $obj = new User();
            $obj->setIdUser($id);
            $obj->delete();            
        }
        header("Location: ".base_url);
    }
    //-------------------------------------------
    public function update(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $obj = new User();
            $obj->setIdUser($id);

            $one = $obj->getOne();
            $deptos = Utils::showDeptos();
            $tipos = Utils::showTipos();
        }
        require_once 'views/users/edit.php';
    }
    //-------------------------------------------
    public function modify(){
        if(isset($_POST)){
            $id = isset($_POST['idUsuario']) ? (int)$_POST['idUsuario'] : NULL;
            $depto = isset($_POST['depto']) ? (int)$_POST['depto'] : NULL;
            $tipo = isset($_POST['tipo']) ? (int)$_POST['tipo'] : NULL;            
                $obj = new User();
                $obj->setIdUser($id);
                $obj->setIdDepto($depto);
                $obj->setIdTipo($tipo);
                $obj->modify();                                                   
        }
        header("Location: ".base_url);
    }


}