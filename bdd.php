<?php

function getBdd() {
    try {
        $mysqlClient = new PDO('mysql:host=localhost;dbname=dbartbox;charset=utf8','root','##Perubo1602##',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    return $mysqlClient;
}