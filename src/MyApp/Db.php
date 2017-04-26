<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 26.04.17
 * Time: 21:43
 */
namespace MyApp;

class Db {

    public $pdo = null;

    public function __construct()
    {
        $this->pdo  = new \PDO('mysql:host=localhost;dbname=sidimvprobke', 'root', 123);
        $this->pdo->exec("set names utf8");
    }

    public function getLastRecords()
    {
        $query = $this->pdo->query('select * from history ORDER BY id DESC limit 15');
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertMessageToHistory($msg)
    {
        $query = $this->pdo->prepare('insert into history(message) VALUES (?)');
        return $query->execute(array(
            $msg
        ));
    }
}