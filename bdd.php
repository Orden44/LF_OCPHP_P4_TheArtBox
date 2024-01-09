<?php

function getBdd() {
    try {
        $mysqlClient = new PDO('mysql:host=localhost:3306;dbname=artbox;charset=utf8','root','');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    return $mysqlClient;
}