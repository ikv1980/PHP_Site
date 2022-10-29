<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    $website_title = "Регистрация";
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <!-- Тело страницы -->
    <main>
        <h1>Регистрация</h1>
        <!-- Если мы пользуемся технологией ajax, то 
        нам не нужно:
        -form: action & method
        - b utton: submit 
        -->
        <form>
            <label for="username">Ваше имя</label>
            <input type="text" name="username" id="username" autocomplete="off">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" autocomplete="off">

            <label for="login">Логин</label>
            <input type="text" name="login" id="login" autocomplete="off">

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" autocomplete="off">
            <!-- !!!ikv1980: повторный ввод для пароля -->

            <div class="error-mess" id="error-block"></div>
            <button type="button" id="reg_user">Зарегистрироваться</button>
        </form>
    </main>

    <!-- Подключаемые блоки -->
    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    
    <script>
        // Обработчик события нажатия на кнопку #reg_user
        $('#reg_user').click(function() {
            let name = $('#username').val();
            let email = $('#email').val();
            let login = $('#login').val();
            let pass = $('#password').val();

            $.ajax({
                // передаем объект
                url: 'ajax/reg.php',        // куда передаем данные
                type: 'POST',               // метод передаи данных 
                cache: false,               // использование кэша
                data: {                     // передаем данные по ключам (такие же что и в файле reg.php)
                    'username': name,
                    'email': email,
                    'login': login,
                    'password': pass
                },
                dataType: 'html',           // указываем что принимаем обратно из reg.php
                success: function(data) {   // функция, которая срабатывает повле обработки всего файла reg.php
                    if (data === "Done") {
                        $("#reg_user").text("Все готово");
                        // Очищаем все поля
                        $('#username').val('');
                        $('#email').val('');
                        $('#login').val('');
                        $('#password').val('');
                        // Делаем кнопку зеленой
                        $("#reg_user").css("background","#74B62C");
                        $("#error-block").hide();
                    } else {
                        $("#error-block").show();
                        $("#error-block").text(data);
                    }
                }
            });
        });
    </script>
</body>

</html>