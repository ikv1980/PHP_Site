<?php
session_start();
    if($_SESSION['server'] == 'localhost') {
        // Параметры подключения на локальный сервер
        $host = 'localhost';
        $user = 'root';
        $password = 'root';
        $dbname = $_GET['dbname'];
        // Подключение к БД
        $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
        $conn->exec("set names utf8mb4"); //Чтобы не было кракозябр (знаков вопроса)

    } else {    
        // Подключение на удаленный сервер.
        // Параметры подключения на удаленный сервер к существующей БД bhx20124_itproger
        // Предварительно нужно создать БД, пользователя и дать ему необходимые права
        // Добавить узелл доступа в Удаленный MySQL
        $host="91.219.194.11";
        $user="bhx20124_itproger";
        $password="iTproger2022";
        //Существующая БД на remotehost
        $dbname="bhx20124_itproger";
        // Подключение к БД
        $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
        $conn->exec("set names utf8mb4"); //Чтобы не было кракозябр (знаков вопроса)
    }
?>