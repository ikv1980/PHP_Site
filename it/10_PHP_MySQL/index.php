<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge charset=utf-8">
    <title>База данных MySQL</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Фрма -->
    <div>
        <!-- <form action="createdb.php" method="post" class="text-center mt-5 px-sm-4 pb-4"> -->
        <form action="/" method="post" class="form text-center mt-5 px-sm-4 pb-4">
        <h1>Выбор сервера</h1>

        <hr>
            <div class="box p-2 text-start">
                <input class="radio" type="radio" name="server" id="localhost" value="localhost" checked/><label class="ms-2 p-1" for="localhost">Локальный сервер</label><br>
                <input class="form-control px-2 py-1 my-2" id="db" type="text" name="db" placeholder="Введите имя БД на латинице" autocomplete="off">
                <input class="radio" type="radio" name="server" id="remotehost" value="remotehost"/><label class="ms-2 p-1" for="remotehost">Удаленный сервер</label>
            </div>
            <br class="mx-2">
            <button type="submit" class="btn btn-danger px-3 py-2">Выбрать</button>
        </form>
    </div>

    <?php
    session_start();
        if(isset($_POST['server']))
        {
            $server = $_POST['server'];
            // Подключаемся к удаленному серверу
            if ($server == 'remotehost') {
                $_SESSION['server'] = 'remotehost';
                header('Location:remotehost.php');
            }
            else {
            // Созданние базы данных
                if(!preg_match('/^[a-zA-Z]+$/u', $_POST['db'])) echo "<div class='pt-2 text-center'>
                <p class='text-danger mb-0'><i>Введены некорректные данные!<br>Имя базы данных должно быть на латинице!</i></p></div>";
                else {
                    echo "<div class='pt-2 text-center'><p class='text-danger mb-0'><i> </i></p></div>";
                    // Подключаемся к локальному серверу
                    // Передача данных. Способ №1 (GET) ---------------------
                    // header('Location:localhost.php?get='.$_POST['db'].'?status='.$status);
                    // Передача данных. Способ №2 (SESSION)------------------
                    $_SESSION['db'] = $_POST['db'];
                    $_SESSION['server'] = 'localhost';
                    header('Location:localhost.php');
                }
            }
        }
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>
