<!-- Настройки удаленного сервера -->
<?php
$user = "bhx20124_itproger";
$password = "iTproger2022";
$db = "bhx20124_itproger";
$host = "91.219.194.11";
$port = 3306;
// Подключение к БД
$pdo = new PDO('mysql:host=' . $host . ';dbname='. $db . ';port=' . $port, $user, $password);
$pdo->exec("set names utf8mb4"); //Чтобы не было кракозябр (знаков вопроса)
