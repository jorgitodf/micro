<?php

namespace App\Controllers;

use Core\BaseController;
use App\ProxyClass;
use Core\Container;

class CadastroController extends BaseController {
    
    private $modelUsuario;
    
    public function __construct() {
        parent::__construct();
        $this->modelUsuario = Container::getModel("Usuario");
    }
    
    public function index() {
        $this->setPageTitle('Cadastro');
        if (isset($_POST['nome']) && isset($_POST['email']) &&  isset($_POST['senha'])) {
            if (empty($_POST['nome'])) {
                $msgErroNome = ProxyClass::verificaNomeCadastro($_POST['nome']);
                $this->view->erroNome = $msgErroNome;
            } else {
                $nome = trim(addslashes(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING)));
                $this->view->nome = $nome;
            }
            
            if (empty($_POST['email'])) {
                $msgErroEmail = ProxyClass::verificaEmailCadastro($_POST['email']);
                $this->view->erroEmail = $msgErroEmail;
            } else {
                $email = trim(addslashes(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
                $this->view->email = $email;
            }
            
            if (empty($_POST['senha'])) {
                $msgErroSenha = ProxyClass::verificaSenhaCadastro($_POST['senha']);
                $this->view->erroSenha = $msgErroSenha;
            } else {
                $senha = trim(addslashes(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)));
                $this->view->senha = $senha;
            }
            
            if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
                $senhaHash = ProxyClass::cryptySenha($senha);
                $data = ['nome'=>$nome, 'email'=>$email, 'senha'=>$senhaHash];
                $emailExiste = $this->modelUsuario->existeEmail($data['email']);
                if ($emailExiste == true) {
                    $this->view->cadastro = $emailExiste;
                } else {
                    $retorno = $this->modelUsuario->salvar($data);
                    $this->view->cadastro = $retorno;
                }
            }
        }
        $this->renderView('cadastro/index', 'layout');        
    }
    
}
