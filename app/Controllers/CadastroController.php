<?php

namespace App\Controllers;

use Core\BaseController;
use App\ProxyClass;
use Core\Container;
use Core\Helpers;
use Core\Redirect;

class CadastroController extends BaseController {
    
    private $modelUsuario;
    
    public function __construct() {
        parent::__construct();
        $this->modelUsuario = Container::getModel("Usuario");
    }
    
    public function index() {
        $this->setPageTitle('Cadastro');
        if (isset($_POST['nome']) && isset($_POST['email']) &&  isset($_POST['senha'])) {
            $nome = trim(addslashes(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING)));
            $email = trim(addslashes(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
            $senha = trim(addslashes(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)));
            $retVal = Helpers::validaCadastroUsuario($nome, $email, $senha);
            if ($retVal) {
                $this->view->retorno = Helpers::validaCadastroUsuario($nome, $email, $senha);
            } 
            if (($retVal['nome'] == true && $retVal['email'] == true && $retVal['senha'] == true)) {
                $senhaHash = ProxyClass::cryptySenha($senha);
                $data = ['nome'=>$retVal['nome'], 'email'=>$retVal['email'], 'senha'=>$senhaHash];
                $existeEmail = Helpers::verificaEmailExiste($data['email']);
                if ($existeEmail == false) {
                    $this->view->cadastro = $this->modelUsuario->salvar($data);
                } else {
                    $this->view->cadastro = $existeEmail;
                }
            }
        }
        $this->renderView('cadastro/index', 'layout');        
    }
    
}
