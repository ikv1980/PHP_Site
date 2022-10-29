<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge charset=utf-8">
    <title>DB RemoteHost</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="box" class="mt-5 px-sm-4 p-2 text-center">
        <?php
        session_start();
                // Подключение на удаленный сервер.
                // Параметры подключения на удаленный сервер к существующей БД bhx20124_itproger
                // Предварительно нужно создать БД, пользователя и дать ему необходимые права
                // Добавить узелл доступа в Удаленный MySQL
                $host="91.219.194.11";
                $user="bhx20124_itproger";
                $password="iTproger2022";
                //Существующая БД на remotehost
                $dbname="bhx20124_itproger";

                // Кнопки [Назад] и [Запросы]
                echo '<div class="btnbox justify-content-between">';
                echo '<a href="javascript:history.go(-1)"><button type="submit" class="btn btn-primary mt-2 px-2 py-1">Назад</button></a>';
                if($dbname != '') {
                        echo '<a href="select.php"><button type="submit" class="btn btn-primary mt-2 px-2 py-1">Запросы</button></a>';
                        echo '</div><hr class="mt-3">';
                }

                // Подключение к БД
                try {
                        $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
                        $conn->exec("set names utf8mb4"); //Чтобы не было кракозябр (знаков вопроса)
                        echo "<span class='text-success mb-0'>Подключение к существующей базе данных <b>$dbname</b><br> на <b>$host</b> выполненно успешно.</span>";

                } 
                catch (PDOException $pe) {
                        die("<span class='text-danger mb-0'>Не удалось подключиться к <b>$host</b>:</span>" . $pe->getMessage());
                }

                // Внесение данных в существующую БД
                require 'createdb.php';
        ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>