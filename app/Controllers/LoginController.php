<?php

namespace App\Controllers;

use Core\BaseController;
use App\ProxyClass;
use Core\Helpers;
use Core\Container;
use Core\Redirect;


class LoginController extends BaseController {
    
    private $modelUsuario;
    
    public function __construct() {
        parent::__construct();
        $this->modelUsuario = Container::getModel("Usuario");
    }
    
    public function index() {
        $this->setPageTitle('Login');
        if (isset($_POST['email']) &&  isset($_POST['senha'])) {
            $email = trim(addslashes(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
            $senha = trim(addslashes(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)));
            if (Helpers::validaEmailSenha($email, $senha)) {
                $this->view->retorno = Helpers::validaEmailSenha($email, $senha);
            } 
            if (ProxyClass::verificaExisteUsuarioSenha($email, $senha) == true && 
                (Helpers::validaEmailSenha($email, $senha) && Helpers::validaEmailSenha($email, $senha)['email'] == true && 
                Helpers::validaEmailSenha($email, $senha)['senha'] == true)) {
                $this->view->erro = ProxyClass::verificaExisteUsuarioSenha($email, $senha);
            } 
            if (Helpers::validaEmailSenha($email, $senha)['erroEmail'] == false && Helpers::validaEmailSenha($email, $senha)['erroSenha'] == false &&
                ProxyClass::verificaExisteUsuarioSenha($email, $senha)['erroSemCadastro'] == false && ProxyClass::verificaExisteUsuarioSenha($email, $senha)['erroSenha'] == false &&
                ProxyClass::logarUsuario($email) == true) {
                Redirect::route('/home');
                exit;
            }
        }
        $this->renderView('login/login', 'layout');
    }
    
    public function logout() {
        unset($_SESSION['ccUser']);
        Redirect::route('/home');
    }
    
}
