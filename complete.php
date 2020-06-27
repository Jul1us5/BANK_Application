<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Done!</title>
</head>
<body>
<?php


    if (!empty($_GET['subject'])) {
        echo $_GET['subject'];
    }

    echo '<a href="http://192.168.64.2/PHP/BANK_Application/locked.php?bills">Sąskaitų sąrašas</a>';



    ?>
</body>
</html>