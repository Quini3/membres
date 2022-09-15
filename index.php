<?php
require 'inc/header.php';
?>

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Tuto pour un espace membre.</h1>
        <p class="lead"> Dans ce tutoriel je vous propose de découvrir comment créer un système de compte utilisateur en PHP. Nous allons donc apprendre à créer :</p>
        <ul>
            <li>Une partie inscription, avec confirmation par email des comptes utilisateurs.</li>
            <li>Une partie connexion / déconnexion, avec une option "Se souvenir de moi" basée sur l'utilisation des cookies.</li>
            <li>Une option "rappel du mot de passe" pour les utilisateurs un petit peu tête en l'air.</li>
            <li>Une partie réservé aux membres avec la possibilités de changer son mot de passe.</li>
        </ul>
        <p class="lead">
            <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
        </p>
    </main>


</div>

<?php require_once 'inc/footer.php'; ?>