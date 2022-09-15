<?php
session_start();
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = 'Vous avez été bien deconnecté';
header("Location:login.php");
?>