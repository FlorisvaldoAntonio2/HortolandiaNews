<?php

namespace app\controller;

use app\model\Conection;

require_once("../../vendor/autoload.php");

session_start();

class ControllerCadastroCategoria{
    private $conection;
    private $nome;


    public function __construct()
    {
        $this->conection = new Conection();
        $this->nome = filter_input(INPUT_POST,'nomeCategoria');

        $this->persistindo();

        
    }

    private function persistindo()
    {
        $resut = $this->conection->cadastroCategoria($this->nome);
        if($resut){
            $_SESSION['msg'] = "Categoria cadastrado com Sucesso!";
            header("Location: ../view/index.php");
        }
        else{
            $_SESSION['msg'] = "ERRO no cadastro da categoria!";
            header("Location: ../view/index.php");
        }
    }
};

new ControllerCadastroCategoria();