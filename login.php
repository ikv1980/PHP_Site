<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    $website_title = "Авторизация";
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
        <!-- // Проверка наличия в coockie перменной login. Если она есть, значит пользователь авторизован -->
        <?php if (!isset($_COOKIE['login'])) : ?>
            <h1>Авторизация</h1>
            <form>
                <label for="login">Логин</label>
                <input type="text" name="login" id="login">

                <label for="password">Пароль</label>
                <input type="password" name="password" id="password">

                <div class="error-mess" id="error-block"></div>

                <button type="button" id="login_user">Войти</button>
            </form>
        
        <?php else : ?>
            <!-- ikv1980: Можно тут создать форму для того, чтобы пользователь мог описать о себе поподробнее -->
            <h2>Пользователь <?= $_COOKIE['login'] ?> - авторизован</h2>
            <form>
                <button type="button" id="exit_user" style="background-color: #FC4632;">Выйти</button>
            </form>
        <?php endif; ?>
    </main>

    <!-- Подключаемые блоки -->
    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>

        
    <script>
    // Обработчик события нажатия на кнопку #reg_user
        $('#login_user').click(function() {
            let login = $('#login').val();
            let pass = $('#password').val();

            $.ajax({
                url: 'ajax/login.php',
                type: 'POST',
                cache: false,
                data: {
                    'login': login,
                    'password': pass
                },
                dataType: 'html',
                success: function(data) {
                    if (data === "Done") {
                        // $("#login_user").text("Все готово");
                        // $("#error-block").hide();
                        document.location.reload(true); // перезагрузка страницы
                    } else {
                        $("#error-block").show();
                        $("#error-block").text(data);
                    }
                }
            });
        });

    // Обработчик события нажатия на кнопку #exit_user
        $('#exit_user').click(function() {
            $.ajax({
                url: 'ajax/exit.php',
                type: 'POST',
                cache: false,
                data: {},
                dataType: 'html',
                success: function(data) {
                    document.location.reload(true);
                }
            });
        });
    </script>
</body>

</html>