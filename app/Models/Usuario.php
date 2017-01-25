<?php

namespace App\Models;

use Core\BaseModel;

class Usuario extends BaseModel {
    protected $table = "tb_user";
    private $nome;
    private $email;
    private $senha;
    
    function getNomeCompleto() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNomeCompleto($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }


}
