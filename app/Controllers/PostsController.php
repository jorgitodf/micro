<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Container;
use Core\Redirect;

class PostsController extends BaseController {
    
    private $modelPost;
    
    public function __construct() {
        parent::__construct();
        $this->modelPost = Container::getModel("Post");
        $this->modelUsuario = Container::getModel("Usuario");
        if ($this->modelUsuario->isLogged() == false) {
            Redirect::route('/login');
            exit;
        }
    }
        
    public function index() {
        $this->setPageTitle('Post');
        $this->view->posts = $this->modelPost->getAll();
        $this->renderView('post/index', 'layout');
    }

    public function show($id) {
        if (is_numeric($id)) {
            echo $id;
        } else {
            Container::pageNotFound();
        }
    }
    
    
    /* public function show($id, $request) {
        echo $id . '<br>';
        echo $request->get->nome.'<br>';
        echo $request->get->sexo.'<br>';
    } */
    
}
