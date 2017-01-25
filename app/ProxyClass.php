<?php

namespace App;

use Core\Container;

abstract class ProxyClass {
    
    public static function verificaEmail($email) {
        if (empty($email) || $email = "") {
            echo "Preencha o Campo do E-mail";
        }
    }
    public static function verificaSenha($senha) {
        if (empty($senha) || $senha = "") {
            echo "Preencha o Campo da Senha";
        }
    }
    public static function verificaExisteUsuarioSenha($email, $senha) {
        $modelUsuario = Container::getModel("Usuario");
        if (!empty($modelUsuario->existeEmail($email))) {
            if (empty($modelUsuario->existeEmailSenha($email, $senha))) {
                echo "A senha digitada não confere com a senha Cadastrada!!";
            } else {
                return true;
            }
        } else {
            echo "E-mail não Cadastrado(s) no Sistema. Faça o seu cadastro!";
        }    
    }
    
}
