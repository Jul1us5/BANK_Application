<?php
// session_start();

$error = '';
$good = '';
$space = "&nbsp;&nbsp;&nbsp;";
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);

if (!empty($_POST)) {


    if (!empty($_POST['id']) && !empty($_POST['vardas']) && !empty($_POST['pavarde']) && !empty($_POST['key'])) {
        $data[] = [
            'id' => $_POST['id'],
            'vardas' => $_POST['vardas'],
            'pavarde' => $_POST['pavarde'],
            'key' => $_POST['key'],
            'bill' => 0
        ];
        $error = '<div class="good">Sąskata sekmingai sukurta!</div>';


        $id = $_POST['id'];
        $vardas = $_POST['vardas'];
        $pavarde = $_POST['pavarde'];
        $key = $_POST['key'];
        $bill = 0;



        $good = "<div class='right'>
                    <b>ID:</b> $id<br/>
                    <b>Vardas:</b> $vardas<br/>
                    <b>Pavardė:</b> $pavarde<br/>
                    <b>Asmens Kodas:</b> $key<br/>
                    <b>Sąskaita:</b> $bill Eur.<br/>
                </div>";
        unset($_POST);
    } else {

        $error = '<div class="error">Blodai užpildyta forma</div>';
    }



    file_put_contents(__DIR__ . '/data.json', json_encode($data));
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/font-awesome.min.css">
    <link rel="stylesheet" href="./style/reset.css">
    <link rel="stylesheet" href="./style/main.css">
    <title>BANK Application | Pidėti lėšas</title>
</head>

<body>
    <?php
    include './requires.php';
    ?>

    <div class="menu">
        <div class="navigation">

            <?php
            include './navigation.php';
            ?>

        </div>
        <div class="profile">

            <div class="title">Pidėti lėšas</div>


            <div class="keeper">
                <?php

                if (!empty($_POST)) {
                    file_put_contents(__DIR__ . '/data.json', json_encode($data));
                }

                //get all your data on file
                $data = file_get_contents('data.json');

                ?>

                <form action="http://192.168.64.2/PHP/BANK_Application/add.php?type=add" method="GET">
                    <select name="user">
                        <option selected="selected">Choose one</option>
                        <?php
                        $user = json_decode($data, true);
                        // A sample product array


                        // Iterating through the product array
                        foreach ($user as $item) {
                        ?>
                            <option value="<?php echo strtolower($item['id']); ?>"><?php echo $item['id']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="submit">
                </form>

                <?php

                if (isset($_GET['user'])) {



                    foreach ($user as $item) {

                        if ($_GET['user'] == $item['id']) {
                            echo "<div class='right'>";
                            echo "<b>ID:</b> " . $_GET['user'] .  "<br/>";
                            echo "<b>Vardas:</b> " . $item['vardas'] .  "<br/>";
                            echo "<b>Pavardė:</b> " . $item['pavarde'] .  "<br/>";
                            echo "<b>Asmens Kodas:</b> " . $item['key'] .  "<br/>";
                            echo "<b>Sąskaita:</b> " . $item['bill'] .  "<br/>";
                            echo "</div>";
                            echo "<br>";

                            $id = $_GET['user'];
                            $_SESSION['id'] = $id;

                            echo '<form name="form" action="?type=plus" method="get">';
                            echo '<input type="text" name="plus" id="plus">';
                            echo '<input type="submit" value="+">';
                            echo '</form>';
                        }
                    }
                }
                // $data = file_get_contents('data.json');
                // $array = json_decode($data, true);
                $data = file_get_contents('data.json');
                $array = json_decode($data, true);

                $arr_bill = array();

                if (isset($_GET['plus'])) {
                    echo "<div class='right'>";

                    foreach($array as $key => $value) {
                        // if($_SESSION['id'] == $value['id']) {
                        //     $value['bill'] += $_GET['plus'];
                        // } 

                            if ($_SESSION['id'] == $value['id']) {
                                $array[$key]['bill'] += $_GET['plus'];
                            }
                    
                    }
                    echo "Prideda: " . $_GET['plus'] . "Eur";
                    echo "</div>";
                }

                file_put_contents('data.json', json_encode($array));


                ?>
            </div>
        </div>

</body>

</html>