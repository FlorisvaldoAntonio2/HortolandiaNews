<?php

namespace app\controller;

use app\model\Conection;

require_once("../../vendor/autoload.php");

session_start();

class ControllerLogin 
{
    private $login;
    private $password;
    private $conection;

    public function __construct()
    {
        $this->conection = new Conection();

        if(isset($_GET['sair'])){
            $this->delogar();
        }

        $this->login = filter_input(INPUT_POST,'login');
        $this->password = filter_input(INPUT_POST,'password');

        $this->checkUser();


    }

    private function delogar()
    {
        unset($_SESSION['user']);
        unset($_SESSION['adm']);
        header("Location: ../view/login.php");
    }

    private function checkUser()
    {
        $user = $this->conection->login($this->login,$this->password);
       
        if($user){
            $_SESSION['user'] = $user[0]['login'];
            $_SESSION['adm'] = $user[0]['adm'];
            header("Location: ../view/index.php");
        }
        else{
            $_SESSION['msg'] = 'Login ou Senha invalida!';
            header("Location: ../view/login.php");
        }
        
    }



}

new ControllerLogin();