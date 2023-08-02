<?php
session_start() ;
date_default_timezone_set('Asia/Tehran') ;

require 'constants.php' ;
require 'config.php' ;
require BASE_PATH . 'libs/helpers.php' ;
require BASE_PATH . 'libs/validate_libs.php' ;
require BASE_PATH . 'libs/user_libs.php' ;
require BASE_PATH . 'libs/file_libs.php' ;


#connect to database
try {
    $pdo = new PDO( "mysql: host=$database_config->host;dbname=$database_config->dbname;charset=$database_config->charset",$database_config->user, $database_config->pass) ;
} catch (PDOException $e) {
    echo 'Faid to connect :' . $e->getMessage() ;
    die();
}