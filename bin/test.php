<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 26.04.17
 * Time: 21:53
 */
require_once 'src/MyApp/Db.php';
use MyApp\Db;
use MyApp\Chat;

$db = new Db();

$db->insertMessageToHistory('testing huesting это просто тест');
$result = $db->getLastRecords();
var_dump($result);