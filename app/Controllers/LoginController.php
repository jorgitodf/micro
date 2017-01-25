<?php

namespace App\Controllers;

use Core\BaseController;

class LoginController extends BaseController {
    
    public function index() {
        $this->renderView('login/login', 'layout');
    }
    
}
