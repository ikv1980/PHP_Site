<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge charset=utf-8">
    <title>DB Localhost query</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="box" class="mt-5 px-sm-4 p-2 text-start">

    <a href="localhost.php"><button type="submit" class="btn btn-primary mt-2 px-2 py-1">Назад</button></a><hr>

    <!-- 1. Из таблицы users выберите лишь пользователя, у которого поле login равен "john". -->
    <span><b>1. Выбор пользователя из таблицы users.</b></span>
    <form action="" method="post" class="justify-content-between text-center m-1">
        <input class="form-control px-2 py-1 me-2" type="text" name="login" placeholder="Имя пользователя (john или alex)" autocomplete="off">
        <button type="submit" class="btn btn-danger px-3">Выбрать</button>
    </form>

    <!-- 2. Из таблицы items выберите лишь те товары, которые принадлежат к категории hats. -->
    <span><b>1. Выбор категории из таблицы items.</b></span>
    <form action="" method="post" class="justify-content-between text-center m-1">
        <input class="form-control px-2 py-1 me-2" type="text" name="category" placeholder="Категория (cups, hats или shirts)" autocomplete="off">
        <button type="submit" class="btn btn-danger px-3">Выбрать</button>
    </form>

    <!-- 3. В таблицу orders поместите новые заказы. В качестве user_id указываейте id пользователя что вы выбрали из таблицы users, а в качестве item_id указывайте id товаров, что вы выбрали из таблицы items. -->
    <span><b>1. Добавление заказа.</b></span>
    <form action="" method="post" class="justify-content-between text-center mb-2">
        <input class="form-control px-2 py-1 me-2" type="text" name="user_id" placeholder="ID пользователя (1 или 2)" autocomplete="off">
        <input class="form-control px-2 py-1 me-2" type="text" name="item_id" placeholder="Категория (1 - 6)" autocomplete="off">
        <button type="submit" class="btn btn-danger px-3">Добавить</button>
    </form>

<!---------------------------------------------- Обработка форм ---------------------------------------------->
    <?php
    session_start();
        // Полученные данные для последующей обработки
        // echo $_SESSION['server'];
        // echo $_SESSION['db'];    

        // Подключения файла запросов
        require 'connect.php';

        // Подключения файла запросов
        require 'query.php';
    ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>