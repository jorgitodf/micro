<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Container;
use App\ProxyClass;
use Core\Redirect;

class HomeController extends BaseController {
    
    private $modelUsuario;
    
    public function __construct() {
        parent::__construct();
        $this->modelUsuario = Container::getModel("Usuario");
        if ($this->modelUsuario->isLogged() == false) {
            Redirect::route('/login');
            exit;
        }
    }
    
    public function index() {
        $this->setPageTitle('Home');
        if (isset($_POST['email']) && isset($_POST['senha'])) {
            $email = trim(addslashes(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
            $senha = trim(addslashes(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)));
            if (ProxyClass::verificaEmail($email)) {
                ProxyClass::verificaEmail($email);
            }
            if (ProxyClass::verificaSenha($senha)) {
                ProxyClass::verificaSenha($senha);
            }
 
        }
        $this->renderView('login/login', 'layout');
    
    }
}
