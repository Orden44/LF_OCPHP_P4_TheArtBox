<?php
    require_once 'header.php';
    require_once 'bdd.php';

    $bdd=getBdd();
     // On récupère tout le contenu de la table oeuvres
    $sqlQuery = 'SELECT * FROM oeuvres';
    $oeuvresStatement = $bdd->prepare($sqlQuery);
    $oeuvresStatement->execute();
    $oeuvres = $oeuvresStatement->fetchAll();
?>

<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require_once 'footer.php'; ?>
