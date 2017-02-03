<?php

namespace Core;

use Core\BaseModel;

abstract class Helpers {
    
    public static function validaEmailSenha($email, $senha) {
        $array = array('erroEmail'=>'', 'erroSenha'=>'', 'email'=>$email, 'senha'=>$senha);
        if (empty($email) || $email = "") {
            $array['erroEmail'] = "<div class='alert alert-danger msg_erro_validacao' role='alert' id='msg_erro_email'>Preencha o Campo do E-mail!</div>";
        } elseif (!empty($email)) {
            $array['email'] = $email;
        }
        if (empty($senha) || $senha = "") {
            $array['erroSenha'] = "<div class='alert alert-danger msg_erro_validacao' role='alert' id='msg_erro_senha'>Preencha a sua Senha!</div>";
        } elseif (!empty($senha)) {
            $array['senha'] = $senha;
        }
        return $array;
    }
    
    public static function validaCadastroUsuario($nome, $email, $senha, $senha_confirm, $tel_celular, $cpf) {
        $array = array();
        if (empty($nome)) {
            $array['erroNome'] = "<span class='alert alert-danger msg_erro_validacao' role='alert' id='msg_erro_nome_cliente'>Preencha o seu Nome Completo!</span><br/>";
        } elseif (ctype_alpha($nome) && !empty($nome)) {
            $array['erroNome'] = "<span class='alert alert-danger msg_erro_validacao' role='alert' id='msg_erro_nome_cliente_sem_numeros'>O Campo Nome não aceita Números!</span><br/>";
        } else {
            $array['nome'] = $nome;
        }
        if (empty($email)) {
            $array['erroEmail'] = "<span class='alert alert-danger msg_erro_validacao' role='alert' id='msg_erro_email_cad_cliente'>Preencha o seu E-mail!</span><br/>";
        } elseif (!empty ($email) && !filter_var($email, FILTER_SANITIZE_EMAIL)) {
            $array['erroEmail'] = "<div class='alert alert-danger msg_erro_validacao' role='alert' id='msg_erro_email_cad_cliente_n_val'>O E-mail informado não é Válido!</div>";
        } else {
            $array['email'] = $email;
        }
        if (empty($senha)) {
            $array['erroSenha'] = "<span class='alert alert-danger msg_erro_validacao' role='alert' id='msg_erro_senha_cad_cliente'>Preencha a sua Senha!</span><br/>";
        } else {
            $array['senha'] = $senha;
        }
        if (empty($senha_confirm)) {
            $array['erroSenha2'] = "<span class='alert alert-danger msg_erro_validacao' role='alert' id='msg_erro_senha2_cad_cliente'>Digite a Confirmação da sua Senha!</span><br/>";
        }
        if (empty($tel_celular)) {
            $array['erroTelefone'] = "<span class='alert alert-danger msg_erro_validacao' role='alert' id='msg_erro_telef_cad_cliente'>Digite o seu Número de Telefone!</span><br/>";
        }
        if (empty($cpf)) {
            $array['erroCpf'] = "<span class='alert alert-danger msg_erro_validacao' role='alert' id='msg_erro_cpf_cad_cliente'>Digite o seu CPF!</span><br/>";
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
    
    public static function limparTelefone($numero) {
        $num = str_replace("-", "", $numero);
        $num1 = str_replace("(", "", $num);
        $num2 = str_replace(")", "", $num1);
        $num3 = str_replace(" ", "", $num2);
        return $num3;
    }
    
    public static function limparCpf($cpf) {
        $cpf1 = str_replace("-", "", $cpf);
        $cpf2 = str_replace(".", "", $cpf1);
        return $cpf2;
    }

}
