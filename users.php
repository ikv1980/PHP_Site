<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    $website_title = "Список всех пользователей на сайте";
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <!-- Тело страницы -->
    <main>
        <h1>Список пользователей</h1>
        <!-- Получаем и выводим список всех пользователей из БД -->
        <?php if (isset($_COOKIE['login'])) : ?>
        <?php 
            require "lib/mysql.php";
            $sql = 'SELECT * FROM users';   //sql-запрос
            $query = $pdo->query($sql); //Отправка запроса
            // var_dump($query);
            $users = $query->fetchAll(PDO::FETCH_OBJ); 
            foreach($users as $user) {
                $login = "'".$user->login."'";
                echo 
                '<div class="user" id=user'.$user->id.'>
                    <p><b>Имя: </b>'.$user->name.', <b>логин: </b>'.$user->login.'</p>
                    <button onclick="deleteUser('.$user->id.','.$login.')" style="background-color: #FC4632;">Удалить</button>
                </div>';
            };
        ?>
        <div class="error-mess" id="error-block"></div>
        <?php else : ?>
                <p class="error">Список пользователей будет доступен после авторизации</p>
                <form>
                <a href="/login.php"><button type="button" id="exit_user" style="background-color: #74B62C;">Авторизоваться</button></a>
                    
                </form>
        <?php endif; ?>
    </main>

<!-- Подключаемые блоки -->
<?php require "blocks/aside.php" ?>
<?php require "blocks/footer.php" ?>
    
    <script>
        // Обработчик события нажатия на кнопку #reg_user
        function deleteUser(u_id, u_login) {
            let id = u_id;
            let login = u_login;
            $.ajax({
                // передаем объект
                url: 'ajax/del_user.php',   // куда передаем данные
                type: 'POST',               // метод передаи данных 
                cache: false,               // использование кэша
                data: {                     // передаем данные по ключам (такие же что и в файле reg.php)
                    'id': id,
                    'login': login
                },
                dataType: 'html',           // указываем что принимаем обратно из reg.php
                success: function(data) {   // функция, которая срабатывает повле обработки всего файла reg.php
                    if (data === "Done") {
                        $("#user" + id).remove();
                        $("#error-block").hide();
                    } else {
                        $("#user" + id + " button").css('background-color', '#8d8d8d');
                        $("#error-block").show();
                        $("#error-block").text(data);
                    }
                }
            });
        };
    </script> 
</body>

</html>