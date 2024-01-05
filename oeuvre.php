<?php
    require_once 'header.php';
    require_once 'bdd.php';

    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($_GET['id'])) {
        header('Location: index.php');
    }

    $bdd=getBdd();
    $sqlQuery = 'SELECT * FROM oeuvres WHERE id = :id';
    $oeuvreStatement = $bdd->prepare($sqlQuery);
    $oeuvreStatement->execute(['id' => $_GET['id']]);
    $oeuvre = $oeuvreStatement->fetch();

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(!$oeuvre) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require_once 'footer.php'; ?>
