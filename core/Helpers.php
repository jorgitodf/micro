<?php

namespace Core;

use Core\BaseModel;

abstract class Helpers {
    
    public static function validaEmailSenha($email, $senha) {
        $array = array('erroEmail'=>'', 'erroSenha'=>'', 'email'=>$email, 'senha'=>$senha);
        if (empty($email) || $email = "") {
            $array['erroEmail'] = "<span class='erro_validacao'>Preencha o Campo do E-mail!</span>";
        } elseif (!empty($email)) {
            $array['email'] = $email;
        }
        if (empty($senha) || $senha = "") {
            $array['erroSenha'] = "<span class='erro_validacao'>Preencha a sua Senha!</span>";
        } elseif (!empty($senha)) {
            $array['senha'] = $senha;
        }
        return $array;
    }
    
    public static function validaCadastroUsuario($nome, $email, $senha) {
        $array = array();
        if (empty($nome)) {
            $array['erroNome'] = "<span class='erro_validacao'>Preencha o seu Nome Completo</span>";
        } elseif (ctype_alpha($nome) && !empty($nome)) {
            $array['erroNome'] = "<span class='erro_validacao'>O Campo Nome não aceita Números</span>";
        } else {
            $array['nome'] = $nome;
        }
        if (empty($email)) {
            $array['erroEmail'] = "<span class='erro_validacao'>Preencha o seu E-mail!</span>";
        } elseif (!empty ($email) && !filter_var($email, FILTER_SANITIZE_EMAIL)) {
            $array['erroEmail'] = "<span class='erro_validacao'>O E-mail informado não é Válido!</span>";
        } else {
            $array['email'] = $email;
        }
        if (empty($senha)) {
            $array['erroSenha'] = "<span class='erro_validacao'>Preencha a sua Senha!</span>";
        } else {
            $array['senha'] = $senha;
        }
        return $array;
    }
    
    public static function verificaEmailExiste($mail) {
        $modelUsuario = Container::getModel("Usuario");
        $emailExiste = $modelUsuario->existeEmail($mail);
        if ($emailExiste == true) {
            return $emailExiste;
        }
    }
}
