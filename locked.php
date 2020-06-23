<?php
require __DIR__ . '/data.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: http://192.168.64.2/PHP/BANK_Application/locked.php'); // GET
    die();
}
?>

<!-- <a href="http://192.168.64.2/PHP/PHP_JAVASCRIPT/login/login.php?logout">Atsikabinti</a><br>
<a href="http://192.168.64.2/PHP/PHP_JAVASCRIPT/login/add-user.php">Naujas</a><br> -->
<?php
echo 'slaptas<br>';