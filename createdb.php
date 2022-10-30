<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $website_title ?></title>
    <link rel="icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <header></header>
    <main>
        <!-- Форма для ввода данных по БД -->
        <form action="#" method="get" style="margin: 20px; padding: 10px;">
            <div><input type="text" name="dbname" id="dbname" placeholder="Имя БД"></div>
            <div style="display: flex;"><input type="checkbox" name="fulldb" id="fulldb"><label for="fulldb">Заполнить БД данными</label></div>
            <button type="submit">Создать БД</button>
        </form>

        <?php
        // Отдельный файл для создания БД на локальном сервере.
        // Параметры подключения на локальный сервер
        $host = 'localhost';
        $port = '3306';
        $user = 'root';
        $password = 'root';

        // Получение и прверка введенных данных
        if (isset($_GET['dbname'])) {
            $dbname = $_GET['dbname']; //получаем имя БД (можно и с дефисом)
            $pdo = new PDO('mysql:host='.$host.';port='.$port, $user, $password);
            $pdo->exec('set names utf8mb4'); //Чтобы не было кракозябр (знаков вопроса)
            $sql = 'CREATE DATABASE IF NOT EXISTS `'.$dbname.'`';
            $pdo->exec($sql);
            echo 'База данных с именем <b><a href="http://localhost:81/phpMyAdmin" target="_blank">'.$dbname.'</a></b> успешно создана!<br>';
            if(isset($_GET['fulldb'])) {
                $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
                // Запрсы SQL для существующей БД
                $sql = "
                    SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
                    SET time_zone = '+00:00';
                    SET NAMES 'utf8';
                    SET CHARACTER SET 'utf8';
                    SET SESSION collation_connection = 'utf8_general_ci';

                    CREATE TABLE IF NOT EXISTS `users` (
                        `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `name` varchar(50) NOT NULL,
                        `email` varchar(70) NOT NULL,
                        `login` varchar(20) UNIQUE NOT NULL,
                        `password` varchar(100) NOT NULL,
                        PRIMARY KEY (`id`)
                        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

                    CREATE TABLE IF NOT EXISTS `articles` (
                        `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `title` varchar(100) NOT NULL,
                        `anons` varchar(250) NOT NULL,
                        `full_text` text NOT NULL,
                        `date` varchar(50) NOT NULL,
                        `avtor` varchar(20) NOT NULL,
                        PRIMARY KEY (`id`)
                        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

                    CREATE TABLE IF NOT EXISTS `comments` (
                        `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `name` varchar(50) NOT NULL,
                        `mess` text NOT NULL,
                        `article_id` int(11) UNSIGNED NOT NULL,
                        PRIMARY KEY (`id`)
                        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

                    CREATE TABLE IF NOT EXISTS `chat` (
                        `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `name` varchar(20) NOT NULL,
                        `message` varchar(500) NOT NULL,
                        `date` varchar(50) NOT NULL,
                        PRIMARY KEY (`id`)
                        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;
                ";     

                $pdo->exec($sql);
                echo "<br><span class='text-primary'>Данные успешно добавлены в базу данных <b>".$dbname."</b>!</span>";
            };
        };
        ?>
    </main>
    <footer></footer>
</body>
</html>