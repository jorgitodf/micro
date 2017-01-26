<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Container;
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
        $this->renderView('home/index', 'layout');
    }
}
