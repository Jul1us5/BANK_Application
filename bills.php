<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/font-awesome.min.css">
    <link rel="stylesheet" href="./style/reset.css">
    <link rel="stylesheet" href="./style/main.css">
    <title>BANK Application | Sąskaitų sąrašas</title>
</head>

<body>
    <?php
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
    include './requires.php';
    ?>

    <div class="menu">
        <div class="navigation">

            <?php
            include './navigation.php';
            ?>

        </div>
        <div class="profile">

            <div class="title">Sąskaitų sąrašas</div>

            <div class="title">
                <span>Nr.</span><span>ID</span><span>VARDAS</span><span>PAVARDE</span><span>ASMENS KODAS</span><span>SUMA</span>
            </div>
            <div class="keeper min">

                <?php

                $data = json_decode(file_get_contents(__DIR__ . '/data.json'), 1);

                if (empty($data)) {
                    echo '<div class="mess">';
                    echo '<img src="./img/poster.svg" alt="">';
                    echo '<div class="text">Tuščias sąrašas!</div>';
                    echo '</div>';
                } else {
                    foreach ($data as $key => $value) {

                        if (!empty($_POST)) {
                            unset($data[$key]);
                        } else {
                            echo "<div class='result'>";
                            echo "<span>" . $key . "</span><span>" . $value['id'] . "</span><span>" . $value['vardas'] . "</span><span>" . $value['pavarde'] . "</span><span>" . $value['key'] . "</span><span>" . $value['bill'] . " € </span>";
                            echo '<span>';
                            echo '<form action="delete" method="get">';
                            echo '<a href="http://192.168.64.2/PHP/BANK_Application/bills.php?delete=' . $key . ' "  " type="submit" name=' . $key . ' id="x"><i class="fa fa-times"></i></a>';
                            echo '</form>';
                            echo '</span>';
                            echo "</div>";
                        }
                    }
                }

                if (!empty($_POST)) {
                    file_put_contents(__DIR__ . '/data.json', json_encode($data));
                }

                //get all your data on file
                $data = file_get_contents('data.json');

                // decode json to associative array
                $json_arr = json_decode($data, true);

                // get array index to delete
                $arr_index = array();
                if (isset($_GET['delete']) && isset($_GET['delete'])) {
                    $remove = $_GET['delete'];
                    foreach ($json_arr as $key => $value) {
                        $delete = $key;
                        if ($key == $delete) {
                            $arr_index[] = $remove;
                            header("Location: http://192.168.64.2/PHP/BANK_Application/bills.php");
                            sleep(0.5);
                        }
                    }
                }
                // delete data
                foreach ($arr_index as $i) {
                    unset($json_arr[$i]);
                }

                // rebase array
                $json_arr = array_values($json_arr);

                // encode array to json and save to file
                file_put_contents('data.json', json_encode($json_arr));


                ?>
            </div>
        </div>

</body>

</html>