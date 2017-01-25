<?php

namespace Core;

use PDO;
use Core\InterfaceDataBase;

abstract class BaseModel implements InterfaceDataBase {
    
    private $pdo;
    protected $table;
    
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    
    public function getAll() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    }
    
    public function atualizar() {
        
    }

    public function salvar() {
        
    }

    public function existeEmail($email) {
        $stmt = $this->pdo->prepare("SELECT email FROM {$this->table} WHERE email = ?");
        $stmt->bindValue(1, $email, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    } 
    public function existeEmailSenha($email, $senha) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = ? AND senha = ?");
        $stmt->bindValue(1, $email, PDO::PARAM_INT);
        $stmt->bindValue(2, $senha, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    } 
    
    public function isLogged() {
        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
            return true;
        } else {
            return false;
        }
    }


}