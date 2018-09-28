<?php

require_once '../repository/UserRepository.php';
require_once '../repository/PlaceRepository.php';


/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public $err = array();
    /**
     * @return mixed
     */
    public function checkLogin(){
        if ($_POST['send']){
            $email = htmlspecialchars($_POST['email']);
            $pw = htmlspecialchars($_POST['password']);
            $userRepo = new UserRepository();
            $id = $userRepo->getID($email,$pw);
            if($id != null && !empty($id)){
                session_start();
                $_SESSION['uid'] = 1;
                if(isset($_SESSION['uid'])) {
                    $this->doError("Herzlich Wilkommen!");
                    header('Location: /cp');
                    exit();
                }
            }
            else{
                $this->doError("Ihre Anmeldedaten sind Falsch!");
                header('Location: /');
            }
        }
    }
    public function logout(){
        $_SESSION['uid'];
        session_destroy();
        unset($_SESSION['uid']);
        header('Location: /');
    }
    public function doError($error){
        $this->err = array_fill(0,1,$error);
        session_start();
        $_SESSION['err'] = $this->err;
    }

}
