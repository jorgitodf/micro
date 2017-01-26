<?php

namespace Core;

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
}
