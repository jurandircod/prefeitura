<?php
namespace App\Model\Usuario;


class Usuario {

    private $id;
    private $nome;
    private $senha;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getSenha(){
        return $this->senha;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }


}