<?php

namespace app\controller;

use app\model\Conection;

require_once("../../vendor/autoload.php");

session_start();

class ControllerCadastroNoticia{
    private $conection;
    private $titulo;
    private $categoria;
    private $conteudo;
    private $nome_img;


    public function __construct()
    {
        $this->conection = new Conection();
        $this->titulo = filter_input(INPUT_POST,'tituloNoticia');
        $this->categoria = filter_input(INPUT_POST,'categoriaNoticia');
        $this->conteudo = filter_input(INPUT_POST,'conteudoNoticia');
        $this->nome_img = $this->upload_img();

        $this->persistindo();

        
    }

    private function upload_img(): ?string
    {
        // pegar o nome do arquivo enviado
        $file = $_FILES['foto_noticia']['name'];
        // identificar a extensão e coloca em minusculo
        $extensao = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        // expecifica as extenções aceitas
        $extensao_aceitas = ['jpg','png', 'jpeg','PNG'];
        // verifica se a extensão do arquivo é igual a alguma no array de aceitas
        foreach ($extensao_aceitas as $value)
        {
            if(in_array($extensao,$extensao_aceitas)){
                // caso sim gera um nome aleatória com a mesma extensão passada
                $novo_nome = md5(uniqid('')) . "." . $extensao;
                // definição de um caminho
                $diretorio = "../img/upload/";
                // movemos o arquivo para o nosso diretorio com o novo nome
                move_uploaded_file($_FILES['foto_noticia']['tmp_name'], $diretorio . $novo_nome);
                return $novo_nome;    
            }
            else{
                return false;
            }
        }
    }

    private function persistindo()
    {
        if(!$this->nome_img == false){
            $resut = $this->conection->cadastroNoticia($this->titulo,$this->categoria,$this->conteudo,$this->nome_img);
            if($resut){
                $_SESSION['msg'] = "Cadastrado com Sucesso!";
                header("Location: ../view/index.php");
            }
            else{
                $_SESSION['msg'] = "ERRO no cadastro!";
                header("Location: ../view/index.php");
            }
        }
        else{
            $_SESSION['msg'] = "ERRO na extensão!";
            header("Location: ../view/index.php");
        }
    }
};

new ControllerCadastroNoticia();