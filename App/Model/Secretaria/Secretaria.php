<?php

namespace App\Model\Secretaria;
 
class Secretaria {
    
    private $id;
    private $nome;

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
}