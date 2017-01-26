<?php

namespace Core;

use PDO;
use PDOException;
use App\IDataBaseInfo;
use Core\Container;

class DataBase implements IDataBaseInfo {
    
    private static $driver = IDataBaseInfo::DRIVER;
    private static $host = IDataBaseInfo::HOST;
    private static $db = IDataBaseInfo::DBNAME;
    private static $user = IDataBaseInfo::UNAME;
    private static $pass1 = IDataBaseInfo::PASSW1;
    private static $pass2 = IDataBaseInfo::PASSW2;
    private static $charset = IDataBaseInfo::CHARSET;
    private static $collation = IDataBaseInfo::COLLATION;

    public static function getDataBase() {
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        if ($host == 'IOSN0006.ios.com.br') {
            $pass = self::$pass1;
        }
        
        if (self::$driver == 'mysql') {
            try {
                $pdo = new PDO('mysql:dbname='.self::$db.';host='.self::$host.';charset='.self::$charset.'', self::$user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES '.self::$charset.' COLLATE '.self::$collation.'');
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);       
                return $pdo;
            } catch (PDOException $exc) {
                echo Container::verificaErroDataBaseConnection($exc->getCode(), self::$db);
                exit;
                //echo $exc->getMessage();    
            }
        }
    }


}