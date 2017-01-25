<?php

namespace App\Controllers;

use Core\BaseController;
use App\ProxyClass;

class LoginController extends BaseController {
    
    public function index() {
        $this->setPageTitle('Login');
        if (isset($_POST['email']) &&  isset($_POST['senha'])) {
            if (empty($_POST['email'])) {
                $msgErroEmail = ProxyClass::verificaEmail();
                $this->view->erroEmail = $msgErroEmail;
            } else {
                $email = trim(addslashes(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
                $this->view->email = $email;
            }
            
            if (empty($_POST['senha'])) {    
                $msgErroSenha = ProxyClass::verificaSenha();
                $this->view->erroSenha = $msgErroSenha;
            } else {
                $senha = trim(addslashes(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)));
                $this->view->senha = $senha;
            }

            if (!empty($email) && !empty($senha)) {
                $erro = ProxyClass::verificaExisteUsuarioSenha($email, $senha);
                if (ProxyClass::verificaExisteUsuarioSenha($email, $senha) == true) {
                    $this->view->erro = $erro;
                } else {
                    echo "Usuário validado e autenticado -> Criar uma Variável de Sessão para esse Usuário e redirecionar para a Home";
                    exit;
                }
            } 
            
        }
        
        
        $this->renderView('login/login', 'layout');
    }
    
}
