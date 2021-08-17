<?php

namespace app\model;

require_once '../config.php';

class Conection{
    private $conn = null;
    private $erro;

    public function __construct()
    {
        
        if($this->conn == null || empty($this->conn)){

            try{
                $this->conn = new \PDO("mysql:host=localhost;dbname=" . DB, USER , PASS);
            }
            catch(\PDOException $e){
                $this->erro = $e->getMessage();
            }
            
        }

    }

    public function login(STRING $l,STRING $p):array
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE login = ? AND pass = ?");
        $stmt->bindParam(1,$l);
        $stmt->bindParam(2,$p);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        else{
            return [];
        }
    }

    public function select(STRING $nameSearch):array
    {
        $search = '%' . $nameSearch ."%";
        $stmt = $this->conn->prepare("SELECT n.id as id, n.titulo as titulo, n.conteudo as conteudo, n.nome_img as nome_img, c.nome as categoria FROM noticia as n
                                      INNER JOIN categoria as c 
                                      ON n.cod_categoria = c.id 
                                      WHERE titulo LIKE :value ");
        $stmt->bindValue(':value',$search);
        $stmt->execute();
        $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $user;
    }

    public function selectId(STRING $id):array
    {
        $stmt = $this->conn->prepare("SELECT n.id as id, n.titulo as titulo, n.conteudo as conteudo, n.nome_img as nome_img, c.nome as categoria FROM noticia as n
                                      INNER JOIN categoria as c 
                                      ON n.cod_categoria = c.id 
                                      WHERE n.id = :ID ");
        $stmt->bindValue(':ID',$id);
        $stmt->execute();
        $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $user;
    }

    public function selectCategoria():array
    {
        $stmt = $this->conn->prepare("SELECT * FROM categoria");
        $stmt->execute();
        $categotias = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return  $categotias;
    }

    public function cadastroNoticia(STRING $titulo,INT $categotia, STRING $conteudo, STRING $nome_img):bool
    {
        $stmt = $this->conn->prepare("INSERT INTO noticia (id,titulo,cod_categoria,conteudo,nome_img) VALUES (null, :T , :COD ,:C , :I)");
        $stmt->bindValue(':T',$titulo);
        $stmt->bindValue(':COD',$categotia);
        $stmt->bindValue(':C',$conteudo);
        $stmt->bindValue(':I',$nome_img);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function cadastroCategoria(STRING $nome):bool
    {
        $stmt = $this->conn->prepare("INSERT INTO categoria (id, nome) VALUES (null, :N)");
        $stmt->bindValue(':N',$nome);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function nome_img_noticia(INT $id)
    {
        $stmt = $this->conn->prepare("SELECT nome_img FROM noticia WHERE id = ?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete(INT $id):bool
    {
        $stmt = $this->conn->prepare("DELETE FROM noticia WHERE id = :ID");
        $stmt->bindValue(':ID',$id);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function update(STRING $titulo, INT $categoria ,STRING $conteudo,INT $id):bool
    {
        $stmt = $this->conn->prepare("UPDATE noticia SET titulo = :T, cod_categoria = :COD, conteudo = :C WHERE id = :ID");
        $stmt->bindValue(':T',$titulo);
        $stmt->bindValue(':COD',$categoria);
        $stmt->bindValue(':C',$conteudo);
        $stmt->bindValue(':ID',$id);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return true;
        }
        else{
            return false;
        }
        
    }

    


}