<?php
$id = $_POST['id'];
$login = $_POST['login'];

$error = '';
if ($login == $_COOKIE['login']) {
    $error = 'Нельзя удалить самого себя!';
}
if ($error != '') {
    echo $error;
    exit();
}

require_once "../lib/mysql.php";

$sql = 'DELETE FROM `users` WHERE `id` = ?';
$query = $pdo->prepare($sql);
$query->execute([$id]);

echo "Done";
