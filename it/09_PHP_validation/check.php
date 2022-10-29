<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="box" class="mt-5 px-sm-4 pb-4">
        <h1>Вся информация</h1>
    
    <?php
        // header('Location: /');
        // exit();

        // Функции проверки валидности введенных данных
        // Очистка данных от пробелов по краям
        function clean($value) {
            return trim($value);
        };

        // -----Проверка ФИО (символ латиницы идет за два символа)
        function val_fio($fio) {
            if(preg_match('/^[a-zA-Zа-яёА-ЯЁ]+$/u', $fio)) {
                if(preg_match('/^[a-zA-Z]+$/u', $fio) && strlen($fio) > 2) {
                    return true;
                }
                if(preg_match('/^[а-яёА-ЯЁ]+$/u', $fio) && strlen($fio) > 4) {
                    return true;
                }
            }
            else return false;
        };
        function val_email($email) {
            return (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) > 5);};
        // -----Проверка телефона
        function val_tel($tel) {
            return preg_match('/^[0-9]{11}+$/', $tel);};
        // -----Проверка количества любимых фильмов
        function val_film($film) {
            return (count(explode(",", $film)) != 1);
        };


        // Вывод данных 
        if(!val_fio(clean($_POST['fio']))) die("<p class='text-danger mx-3'>Введены некорректные данные в поле ФИО!<br>Поле должно быть длиной не менее 3 символов и содержать только буквы!</p>");
        else echo '<strong class="h5 mx-3">Имя:</strong>'."\t".$_POST['fio'].'<br>';

        if(!val_email(clean($_POST['email']))) die("<p class='text-danger mx-3'>Введен некорректный email! Длина не менее 5 символов</p>");
        else echo '<strong class="h5 mx-3">Email:</strong>'."\t".$_POST['email'].'<br>';

        if(!val_tel(clean($_POST['tel']))) die("<p class='text-danger mx-3'>Введен некорректный Телефон!<br>Минимум 11 цифр! Например 89997776655</p>");
        echo '<strong class="h5 mx-3">Телефон:</strong>'."\t".$_POST['tel'].'<br>';

        if (!isset($_POST['cars'])) die("<p class='text-danger mx-3'>Нужно выбрать хотя бы один автомобиль!</p>");
        else
            echo '<strong class="h5 mx-3">Любимые автомобили:</strong><br>';
            echo '<ul class="mx-3 mb-0">';
            foreach ($_POST['cars'] as $value) 
                echo '<li>'.$value."</li>";        
            echo '</ul>';

        if(!val_film(clean($_POST['film']))) die("<p class='text-danger mx-3'>Введите не менее двух фильмов через запятую!</p>");
        else
            echo '<strong class="h5 mx-3">Любимые фильмы:</strong><br>';
            echo '<ul class="mx-3 mb-0">';
            foreach (explode(",", $_POST['film']) as $value) 
                echo '<li>'.clean($value)."</li>";        
            echo '</ul>';

    ?>
    <a href="javascript:history.go(-1)"><button type="submit" class="btn btn-danger px-3 py-2 mt-3">Назад</button></a>
    </div>
</body>
</html>
