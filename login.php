<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/font-awesome.min.css">
    <link rel="stylesheet" href="./style/reset.css">
    <link rel="stylesheet" href="./style/main.css">
    <title>BANK Application</title>
</head>

<body>
    <div class="main">
        <div class="wrap">
            <img src="./img/password.svg" alt="">
            <?php

            require __DIR__ . '/data.php';

            if (!empty($_POST)) {

                foreach ($data as $user) {

                    if (
                        $user['name'] === $_POST['user'] &&
                        $user['pass'] === md5($_POST['password'])
                    ) {
                        $_SESSION['login'] = 1;
                        header('Location: http://192.168.64.2/PHP/BANK_Application/locked.php'); // GET
                        die();
                    }
                }
            }

            if (isset($_GET['logout'])) {
                session_destroy();
                header('Location: http://192.168.64.2/PHP/BANK_Application/login.php'); // GET
                die();
            }
            


            echo '<form action="http://192.168.64.2/PHP/BANK_Application/login.php" method="post">';
            echo '<input type="text" name="user"> Vardas<br>';
            echo '<input type="password" name="password"> Slaptažodis<br>';
            echo '<button type="submit">Prisijungti</button>';

            echo '</form>';

            ?>
        </div>
    </div>

</body>

</html>