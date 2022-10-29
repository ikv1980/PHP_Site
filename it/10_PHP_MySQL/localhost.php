<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge charset=utf-8">
    <title>DB LocalHost</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="box" class="mt-5 px-sm-4 p-2 text-center">
        <?php
        session_start();
                // Параметры подключения на локальный сервер
                $host = 'localhost';
                $user = 'root';
                $password = 'root';
                //Созданная БД на localhost
                // Получение данных. Способ №1 (GET)
                // $dbname = $_GET['get'];
                // Передача данных. Способ №2 (SESSION)
                $dbname = $_SESSION['db'];

                // Кнопки [Назад] и [Запросы]
                echo '<div class="btnbox justify-content-between">';
                echo '<a href="/"><button type="submit" class="btn btn-primary mt-2 px-2 py-1">Назад</button></a>';
                if($dbname != '') {
                        echo '<a href="select.php'
                        .'?dbname='.$dbname.
                        '"><button type="submit" class="btn btn-primary mt-2 px-2 py-1">Запросы</button></a>';
                        echo '</div><hr class="mt-3">';
                }

                // Подключение к БД
                try {
                        $conn = new PDO('mysql:host='.$host.';dbname=', $user, $password);
                        $conn->exec("set names utf8mb4"); //Чтобы не было кракозябр (знаков вопроса)
                        $sql = "CREATE DATABASE IF NOT EXISTS ".$dbname;
                        $conn->exec($sql);
                        echo "<span class='text-success mb-0'>Создание базы данных <b>$dbname</b> и подключение к ней <br> на <b>$host</b> выполнено успешно.</span>";
                }
                catch (PDOException $pe) {
                        die("<span class='text-danger mb-0'>Не удалось подключиться к <b>$host</b>:</span>" . $pe->getMessage());
                }

                $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
                require 'createdb.php';
        ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>
