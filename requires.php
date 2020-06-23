<?php
require __DIR__ . '/data.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: http://192.168.64.2/PHP/BANK_Application/locked.php'); // GET
    die();
}
if (!empty($_GET) && isset($_GET['bills'])) {
    header("Location: http://192.168.64.2/PHP/BANK_Application/bills.php");
    die();
}
if (!empty($_GET) && isset($_GET['new'])) {
    header("Location: http://192.168.64.2/PHP/BANK_Application/newbill.php");
    die();
}
if (!empty($_GET) && isset($_GET['add'])) {
    header("Location: http://192.168.64.2/PHP/BANK_Application/add.php");
    die();
}
if (!empty($_GET) && isset($_GET['result'])) {
    header("Location: http://192.168.64.2/PHP/BANK_Application/result.php");
    die();
}
