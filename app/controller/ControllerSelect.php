<?php

namespace app\controller;

use app\model\Conection;

class ControllerSelect{
    private $conection;
    private $retorn;
    private $search;

    public function __construct()
    {
        $this->conection = new Conection();
        $this->search = filter_input(INPUT_GET,'noticia');

        $this->select($this->search);
    }

    private function select($valueSearch){
        if($valueSearch){
            $this->retorn = $this->conection->select($valueSearch);
        }
        else{
            $this->retorn = $this->conection->select('%');
        }
    } 
    
    public function list(){
        return $this->retorn;
    }

    public function listCategoria()
    {
        return $this->conection->selectCategoria();
    }
}