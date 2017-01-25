<?php

namespace App;

use Core\Container;

abstract class ProxyClass {
    
    public static function verificaEmail() {
        return $msg = "<span class='erro_validacao'>Preencha o Campo do E-mail</span>";
    }
    public static function verificaSenha() {
        return $msg = "<span class='erro_validacao'>Preencha o Campo da Senha</span>";
    }
    
    public static function verificaNomeCadastro($nome) {
        if (empty($nome) || $nome = "") {
            return $msg = "<span class='erro_validacao'>Preencha o seu Nome Completo</span>";
        } elseif (is_numeric($nome)) {
            return $msg = "<span class='erro_validacao'>O Campo Nome não aceita Números</span>";
        } else {
            return false;
        }
    }
    
    public static function verificaSenhaCadastro($senha) {
        if (empty($senha) || $senha = "") {
            return $msg = "<span class='erro_validacao'>Preencha a sua Senha</span>";
        } else {
            return false;
        }
    }
    
    public static function verificaEmailCadastro($email) {
        if (empty($email) || $email = "") {
            return $msg = "<span class='erro_validacao'>Preencha o seu E-mail</span>";
        } elseif (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
            return $msg = "<span class='erro_validacao'>O E-mail informado não é Válido</span>";
        } else {
            return false;
        }
    }
    
    public static function cryptySenha($senha) {
	$custo = '08';
	$salt = 'Cf1f11ePArKlBJomM0F6aJ';
	$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');
	return $hash;
    }
    
    public static function verificaExisteUsuarioSenha($email, $senha) {
        $modelUsuario = Container::getModel("Usuario");
        if (!empty($modelUsuario->existeEmail($email))) {
            $senhaCadastrada = $modelUsuario->existeEmailSenha($email);
            foreach($senhaCadastrada as $value) {
                $pass = $value;
            }
            if (ProxyClass::consultaSenhaCrypty($senha, $pass) != true) {
                return $msg = "<span class='erro_validacao'>A senha digitada não confere com a senha Cadastrada!!</span>";
            }    
        } else {
            return $msg = "<span class='erro_validacao'>E-mail não Cadastrado(s) no Sistema. Faça o seu cadastro!</span>";
        }    
    }
    
    public static function consultaSenhaCrypty($senha, $hash) {
	if (crypt($senha, $hash) === $hash) {
            return true;
	} else {
            return false;
	}
    }
    
}
