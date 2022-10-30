<?php

// Получение сообщения из поля ввода
$message = trim(filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS));

// Проверка сообщения. Не менее 1 символа
$error = '';
if (strlen($message) < 1)
    $error = 'Введите сообщение. ';
if ($error != '') {
    echo $error;
    exit();
}

// Проверка написавшего. Либо логин, либо Bastard
if (isset($_COOKIE['login'])) $name = $_COOKIE['login'];
else $name = 'Unknown';

// Подключение к БД
require_once "../lib/mysql.php";

// Создание SQL-запроса на добавление данных в БД
$sql = 'INSERT INTO chat(name, message, date) VALUES(?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$name, $message, time()]);

echo "chat_yes";
