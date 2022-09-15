<?php
    $user_id = $_GET['id'];
    $cle = $_GET['cle'];
    require 'inc/Connexion.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute([$user_id]);
    $user = $req->fetch();
    session_start();

    if($user && $user->confirmation_cle == $cle ){
        $pdo->prepare('UPDATE users SET confirmation_cle = NULL, confirmation_date = NOW() WHERE id = ?')->execute([$user_id]);
        $_SESSION['flash']['success'] = 'Votre compte a bien été validé';
        $_SESSION['auth'] = $user;
        header('Location: profil.php');
    }else{
        $_SESSION['flash']['danger'] = "Ce clé n'est plus valide";
        header('Location: login.php');
    }
