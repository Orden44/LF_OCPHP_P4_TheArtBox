<?php

function getBdd() {
    try {
        // Il est important d'avoir un fichier de configuration pour ne pas sauvegarder les paramètres confidentiels.
        $ini_array = parse_ini_file("config.ini"); // Analyse un fichier de configuration à créer
        $host = $ini_array['host'];
        $port = $ini_array['port'];
        $database = $ini_array['database'];
        $user =$ini_array['user'];
        $password = $ini_array['password'];

        $mysqlClient = new PDO("mysql:host=$host:$port;dbname=$database;charset=utf8",$user,$password);
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    return $mysqlClient;
}