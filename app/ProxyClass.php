<?php

namespace App;

use Core\Container;

abstract class ProxyClass {
    
    public static function cryptySenha($senha) {
	$custo = '08';
	$salt = 'Cf1f11ePArKlBJomM0F6aJ';
	$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');
	return $hash;
    }
    
    public static function verificaExisteUsuarioSenha($email, $senha) {
        $array = array('erroSemCadastro'=>'', 'erroSenha'=>'');
        $modelUsuario = Container::getModel("Usuario");
        if ($modelUsuario->existeEmail($email) == false) {
            $array['erroSemCadastro'] = "<span class='erro_validacao'>E-mail não Cadastrado no Sistema. Faça o seu cadastro!</span>";
        } else if ($modelUsuario->existeEmailSenha($email)) {
            $senhaCadastrada = $modelUsuario->existeEmailSenha($email);
            foreach($senhaCadastrada as $value) {
                $pass = $value;
            }
            if (ProxyClass::consultaSenhaCrypty($senha, $pass) != true) {
                $array['erroSenha'] = "<span class='erro_validacao'>A senha digitada não confere com a senha Cadastrada!!</span>";
            } 
        }
        return $array;
    }
    
    public static function consultaSenhaCrypty($senha, $hash) {
	if (crypt($senha, $hash) === $hash) {
            return true;
	} else {
            return false;
	}
    }
    
    public static function criarSessaoUsuario($email) {
        $_SESSION['ccUser'] = array('idUser' => '', 'nome' => '', 'email' => '');
        $modelUsuario = Container::getModel("Usuario");
        $usuario = $modelUsuario->getUsuarioById($email);
        $_SESSION['ccUser']['idUser'] = $usuario->id_user;
        $_SESSION['ccUser']['nome'] = $usuario->nome;
        $_SESSION['ccUser']['email'] = $usuario->email;
        if ($_SESSION['ccUser'] == true) {
            return true;
        } else {
            return false;
        }
    }
    
}
