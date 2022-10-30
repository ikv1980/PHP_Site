<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';
if (strlen($login) < 3)
    $error = 'Введите логин';
else if (strlen($pass) < 5)
    $error = 'Введите пароль';

if ($error != '') {
    echo $error;
    exit();
}

require_once "../lib/mysql.php";

$salt = 'sdfh^)#4390f79sdfg3';
$pass = md5($salt . $pass);

$sql = 'SELECT id FROM users WHERE `login` = ? AND `password` = ?';
$query = $pdo->prepare($sql);
$query->execute([$login, $pass]);

// подсчет количества записей (rowCount) в $query
if ($query->rowCount() == 0)
    echo "Такого пользователя нет";
else {
    //устанавливаем в cookie переменную $login (имя переменной, значение, время хранения, относительно какой страницы храняться)
    setcookie('login', $login, time() + 3600 * 24 * 30, "/");
    echo "Done";
}
