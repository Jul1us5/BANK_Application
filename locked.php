<?php

$error = '';
$good = '';
$space = "&nbsp;&nbsp;&nbsp;";
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);

if (!empty($_POST)) {


    if(!empty($_POST['id']) && !empty($_POST['vardas']) && !empty($_POST['pavarde']) && !empty($_POST['key'])) {
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
    <title>BANK Application</title>
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

        <div class="title">Proflis</div>

            
                <div class="keeper">   
                <div class="text">
                    Sveiki!
                    </div>
                
            

        </div>
     </div>

</body>

</html>