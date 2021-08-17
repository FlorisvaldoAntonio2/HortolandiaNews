<?php

namespace app\controller;

use app\model\Conection;

require_once("../../vendor/autoload.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}


class ControllerUpdate{
    private $conection;
    private $id;
    private $dadosNoticia;
    private $newTitulo;
    private $categoria;
    private $newConteudo;

    public function __construct($id)
    {
        $this->conection = new Conection();
        $this->newTitulo = filter_input(INPUT_POST,'tituloNoticia');
        $this->categoria = filter_input(INPUT_POST,'categoriaNoticia');
        $this->newConteudo = filter_input(INPUT_POST,'conteudoNoticia');
        $this->id = $id;

        if(isset($_POST['id'])){
            $this->alteraDados();
        }
        else{
            $this->recuperaDados();
        }

    }

    private function recuperaDados():void
    {
        $this->dadosNoticia = $this->conection->selectId($this->id);
    }

    private function alteraDados()
    {
        $result = $this->conection->update($this->newTitulo,$this->categoria,$this->newConteudo,$this->id);

        if($result){
            $_SESSION['msg'] = 'Atualizado com sucesso!';
            header("Location: ../view/index.php");
        }
        else{
            $_SESSION['msg'] = 'ERRO ao atualizar!';
            header("Location: ../view/index.php");
        }
    }

    public function retorno()
    {
        return $this->dadosNoticia;
    }
}


new ControllerUpdate($_GET['id']);

