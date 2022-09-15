<?php
    session_start();
    require 'inc/function.php';
    logged_only();
?>
<?php
    require 'inc/header.php';
?>
<?php
    debug($_SESSION);
?>

<?php
require 'inc/footer.php';
?>




