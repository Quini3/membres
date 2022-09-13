<?php

    if(!empty($_POST) && !empty($_POST['inputValue']) && !empty($_POST['inputPassword'])){
        require_once 'inc/Connexion.php';
        //require_once 'inc/function.php';

        $nameUser=htmlspecialchars($_POST['inputValue']);

        $req = $pdo->prepare('SELECT * FROM users WHERE (pseudo = :username OR email = :username) AND  confirmation_date IS NOT NULL ');
        $req->execute(['username' => $nameUser]);
        $user = $req->fetch();

        /*if (password_verify($_POST['inputPassword'], $user->mpasse)){
            session_start();
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
            header('Location: profil.php');
            exit();
        }else{
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
        }*/

        if($user == null){
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
        }elseif(password_verify($_POST['inputPassword'], $user->mpasse)){
            session_start();
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
            header('Location: profilEdit.php');
            exit();
        }else{
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
        }
    }
?>

<?php
    require 'inc/header.php';
?>
<h2 class="form-signin-heading">Se connecter</h2>
    <form action="" method="POST">

        <div class="form-label-group">
            <label for="inputValue">Pseudo ou email address</label>
            <input type="text" id="inputValue" class="form-control" placeholder="Pseudo ou email address" name="inputValue">
        </div>

        <div class="form-label-group">
            <label for="inputPassword">Mot de passe <a href="#">(Mot de passe oublié)</a> </label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="inputPassword">
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Se rappeler de moi
            </label>
        </div>
        <button class="btn btn-lg btn-primary" type="submit">se connecter</button>

    </form>
<?php require_once 'inc/footer.php'; ?>