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
    <!-- Фрма -->
    <div>
        <form action="check.php" method="post" class="text-center mt-5 px-sm-4 pb-4">
        <h1>Форма регистрации</h1>
        <p class='text-danger mx-3'>Все поля обязательные</p>
        <hr>
            <div class="box p-2 row">
                <input class="form-control px-2 py-1 my-2" type="text" name="fio" placeholder="Имя" autocomplete="off">
                <input class="form-control px-2 py-1 my-2" type="email" name="email" placeholder="Email" autocomplete="off">
                <input class="form-control px-2 py-1 my-2" type="tel" name="tel" placeholder="Телефон вида 89997776655" autocomplete="off">
                <!-- <input class="form-control px-2 py-1 my-2" type="text" name="film" placeholder="Укажите названия фильмов" autocomplete="off"> -->
            </div>
            <hr class="mx-5">
            <div>Выберите любимые автомобили</div>
            <div>
                <select name="cars[]" multiple="multiple" size="6">
                    <option value="BMW">BMW</option>
                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                    <option value="Audi">Audi</option>
                    <option value="Volvo">Volvo</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Nissan">Nissan</option>
                </select>
            </div>
            <hr class="mx-5">
            <div>Введите любимые фильмы. Не менее двух.<br>Вводить через запятую.</div>
            <div class="box p-2 row">
                <input class="form-control px-2 py-1 my-2" type="text" name="film" placeholder="Названия фильмов" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-danger px-3 py-2">Отправить</button>
        </form>
    </div>
</body>
</html>
