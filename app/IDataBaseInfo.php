<?php

namespace App;

interface IDataBaseInfo {
    const DRIVER = "mysql";
    const HOST = "localhost";
    const DBNAME = "micro";
    const UNAME = "root";
    const PASSW1 = "root";
    const PASSW2 = "camelo69";
    const CHARSET = "utf8";
    const COLLATION = "utf8_unicode_ci";
    public static function getDataBase();
    
}
