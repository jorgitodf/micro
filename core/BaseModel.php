<?php

namespace Core;

use PDO;
use Core\InterfaceDataBase;
use App\ProxyClass;

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

    public function salvar(array $data) {
        $dados = $this->prepareDataInsert($data);
        try {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $this->pdo->beginTransaction();
            $query = "INSERT INTO {$this->table} ({$dados[0]}) VALUE ({$dados[1]})";
            $stmt = $this->pdo->prepare($query);
                for ($index = 0; $index < count($dados[2]); $index++) {
                    $stmt->bindValue("{$dados[2][$index]}", $dados[3][$index]);
                }
            $stmt->execute();
            $stmt->closeCursor();
            $this->pdo->commit();
            return "<span class='msg_dados_salvos_sucesso'>Dados Salvos com sucesso!</span>";
        } catch (\PDOException $exc) {
            $this->pdo->rollback();
            return "<span class='erro_validacao'>Erro ao Salvar os Dados! {$exc->getMessage()}</span>";
        }
    }

    public function existeEmail($email) {
        $stmt = $this->pdo->prepare("SELECT email FROM {$this->table} WHERE email = ?");
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        if ($stmt->rowCount() > 0) {
            return "<span class='erro_validacao'>O E-mail informado já está cadastrado!</span>";
        } else {
            return false;
        }
        
    } 
    public function existeEmailSenha($email) {
        $stmt = $this->pdo->prepare("SELECT senha FROM {$this->table} WHERE email = ?");
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result;
    } 
    
    private function prepareDataInsert(array $data) {
        $strKeys = "";
        $strBinds = "";
        $binds = [];
        $values = [];
        foreach ($data as $key => $value) {
            $strKeys = "{$strKeys},{$key}";
            $strBinds = "{$strBinds},:{$key}";
            $binds[] = ":{$key}";
            $values[] = $value;
        }
        $strKeys = substr($strKeys, 1);
        $strBinds = substr($strBinds, 1);
        return [$strKeys, $strBinds, $binds, $values];
    }
    
    public function isLogged() {
        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
            return true;
        } else {
            return false;
        }
    }


}