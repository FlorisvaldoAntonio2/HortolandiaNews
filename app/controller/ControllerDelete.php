<?php

namespace app\controller;

use app\model\Conection;

require_once("../../vendor/autoload.php");

session_start();


class ControllerDelete{
    private $conection;
    private $id;

    public function __construct()
    {
        $this->conection = new Conection();
        $this->id = filter_input(INPUT_GET,'id');

        $this->delete();
    }

    private function delete()
    {
        $this->deletando_arquivo();
        if($this->conection->delete($this->id)){
            $_SESSION['msg'] = 'Deletado com sucesso!';
            header("Location: ../view/index.php");
        }
        else{
            $_SESSION['msg'] = 'ERRO ao deletar!';
            header("Location: ../view/index.php");
        }
    }

    private function deletando_arquivo():void
    {
        $nome_img_delete = $this->conection->nome_img_noticia($this->id);
        unlink("../img/upload/" . $nome_img_delete[0]['nome_img']);
    }
}

new ControllerDelete();