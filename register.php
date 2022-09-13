<?php
require_once 'inc/function.php';
session_start();
?>

<?php
if(!empty($_POST)){

    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $pseudo=htmlspecialchars($_POST['pseudo']);
    $email1=htmlspecialchars($_POST['email1']);
    $email2=htmlspecialchars($_POST['email2']);

    $msg=array();
    require_once'inc/Connexion.php';
    if(empty($nom) || !preg_match('/^[a-zA-Z0-9_]+$/', $nom)){
        $msg['nom']= "Le nom n'est pas valide, il doit contenir que des caractères alpha numeriques !";
    }

    if(empty($prenom) || !preg_match('/^[a-zA-Z0-9_]+$/', $prenom)){
        $msg['prenom']= "Le prenom n'est pas valide, il doit contenir que des caractères alpha numeriques !";
    }
    if(empty($pseudo) || !preg_match('/^[a-zA-Z0-9_]+$/', $pseudo)){
        $msg['pseudo']= "Le pseudo n'est pas valide, il doit contenir que des caractères alpha numeriques !";
    }
    else{
        $req = $pdo->prepare('SELECT id FROM annonceur WHERE pseudo=?');
        $req->execute([$pseudo]);
        $user = $req->fetch();
        if($user){
            $msg['$pseudo']= 'Ce pseudo existe déjà';
        }
    }

    if(empty($email1) || !filter_var($email1,FILTER_VALIDATE_EMAIL)) {
        $msg['$email1'] = "L'email n'est pas valide, Veillez saisir un email du type :(exempl@contact.com) !";

    }
    else{
            $req = $pdo->prepare('SELECT id FROM annonceur WHERE email=?');
            $req->execute([$email1]);
            $user = $req->fetch();
            if($user){
                $msg['$email1']= 'Ce mail est déjà utilisé';
            }
    }

    if(empty($email2) || !filter_var($email2,FILTER_VALIDATE_EMAIL)){
        $msg['email2']= "L'email n'est pas valide, Veillez saisir un email du type :(exempl@contact.com) !";
    }

    if(empty($_POST['mdp1']) || $_POST['mdp1']!=$_POST['mdp2']){
        $msg['mdp1']= "Vos mots de passe sont différents!";
    }

    if(empty($msg)){
        $req = $pdo->prepare("INSERT INTO annonceur SET nom=?, prenom=?, pseudo=?, email=?, mpasse=?, confirmation_cle=?" );
        $mdp1=password_hash($_POST['mdp1'],PASSWORD_BCRYPT);

        $cle = str_random(60);
        $req->execute([$nom,$prenom,$pseudo,$email1,$mdp1,$cle]);
        //die('Votre a été bien créé');

        $user_id = $pdo->lastInsertId();

        mail($email1, 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp:127.0.0.1/membres/confirm.php?id=$user_id&cle=$cle");

        $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte';
        header('Location: login.php');
        exit();
    }
    //debug($msg);


}
?>
<?php
    require 'inc/header.php';
?>
    <h2 class="form-signin-heading">Inscirivez vous</h2>
    <?php if(!empty($msg)):?>
    <div class="alert alert-danger">
    <p> Votre formulaire contient des des champs incorrects!: </p>
        <ul>
            <?php foreach($msg as $erreur): ?>
            <li><?= $erreur; ?></li>
        <?php endforeach ?>
        </ul>
    </div>
    <?php endif; ?>
    <form action="" method="POST" class="form-signin">

        <div class="form-group">
            <label for="" >Nom</label>
            <input type="text" id="inputNom" class="form-control" placeholder="Nom" name="nom" >
        </div>

        <div class="form-group">
            <label for="" >Prenom</label>
            <input type="text" id="inputPrenom" class="form-control" placeholder="Prenom" name="prenom" >
        </div>

        <div class="form-group">
            <label for="" >Pseudo</label>
            <input type="text" id="inputPseudo" class="form-control" placeholder="Pseudo" name="pseudo" >
        </div>

        <div class="form-group">
            <label for="" >Email</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email1" >
        </div>
        <div class="form-group">
            <label for="" >Confirmez votre email</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email de confirmation" name="email2" >
        </div>

        <div class="form-group">
            <label for="" >Mot de passe</label>
            <input type="password" id="inputPassword" class="form-control"  name="mdp1" >
        </div>

        <div class="form-group">
            <label for="" >Confirmez le mot de passe</label>
            <input type="password" id="inputPassword" class="form-control"  name="mdp2" >
        </div>

        <button class="btn btn-lg btn-primary " type="submit">M'inscrire</button>
    </form>

<?php require_once 'inc/footer.php'; ?>