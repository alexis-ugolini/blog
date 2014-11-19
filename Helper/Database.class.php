<?php

class Helper_Database
{
    private $pdo;
    public function __construct()
    {
        $config = new Helper_Config('config.ini');
        $this->pdo = new PDO("mysql:host=localhost;dbname={$config->get('dbname', 'database')}", "{$config->get('user', 'database')}", "{$config->get('password', 'database')}", array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
    }
    function query($query, $args=array())
    {
        $request = $this->pdo->prepare($query);
        $request->execute($args);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
    function queryOne($query, $args=array())
    {
        $request = $this->pdo->prepare($query);
        $request->execute($args);
        return $request->fetch(PDO::FETCH_ASSOC);
    }
    function execute($query, $args=array())
    {
        $request = $this->pdo->prepare($query);
        $request->execute($args);
        return $request->lastInsertId();
    }
}
