<?php



$error = '';
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
        $error = '<div class="good">Sąskaita sekmingai sukurta!</div>';
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
    <title>BANK Application | New Bill</title>
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

        <div class="title">Sukurti sąskaitą</div>

            
                <div class="keeper">   
                <!-- <h1>Form</h1> -->
                <?= $error ?>
                <form name="form1" method="post" action="newbill.php">
                    <p>
                        
                        <input type="tel" name="id" id="cell">
                        <label for="id">ID: </label>
                    </p>
                    <p>
                        
                        <input type="text" name="vardas" id="name">
                        <label for="vardas">Vardas: </label>
                    </p>
                    <p>
                        
                        <input type="text" name="pavarde" id="name">
                        <label for="pavarde">Pavarde: </label>
                    </p>
                    <p>
                        
                        <input type="tel" name="key" id="cell">
                        <label for="key">KEY: </label>
                    </p>
                    
                        <div class="plus">
                        <input type="submit" name="submit" id="submit" value="Sukurti">
                        </div>
                    
                </form>
            </div>

        </div>
     </div>

</body>

</html>