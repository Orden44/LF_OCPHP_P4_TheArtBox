<?php

require_once 'bdd.php';

if(empty($_POST['titre'])
    || empty($_POST['artiste'])
    || empty($_POST['image'])
    || strlen($_POST['description']) < 3
    || !filter_var($_POST['image'], FILTER_VALIDATE_URL)) {
    header('Location: ajouter.php?erreur=true');
} else {
    $titre = htmlspecialchars($_POST['titre']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);
    $description = htmlspecialchars($_POST['description']);

    $bdd=getBdd();
    $sqlQuery = 'INSERT INTO oeuvres (titre, artiste, image, description) 
    VALUES (:titre, :artiste, :image, :description)';
    $insertOeuvre = $bdd->prepare($sqlQuery);
    $insertOeuvre->execute([
        'titre' => $titre,
        'artiste' => $artiste,
        'image' => $image,
        'description' => $description
    ]);
    header('Location: oeuvre.php?id=' . $bdd->lastInsertId());
}
