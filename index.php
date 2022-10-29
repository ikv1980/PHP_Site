<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
    // Создание переменной - имя страницы. Переменная никуда не перадается. Остается на этой же страницы
    $website_title = "Blog Master";
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
        <p>Main text</p>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
</body>

</html>