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
        <h1>Тут покажем только 4 последних статьи</h1><br>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta tempora cum odio obcaecati sint nisi aliquid inventore accusantium accusamus officiis distinctio deserunt error dolore consequuntur pariatur, earum neque ipsum deleniti?</p><br>
        <?php
        require_once "lib/mysql.php";
        // Тут выводим только 4 последние статью.
        $sql = 'SELECT * FROM articles ORDER BY `date` DESC LIMIT 4';
        $query = $pdo->query($sql);
        echo "<div class='post_flex'>";
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo "<div class='post'>
                <h3>" . $row->title . "</h3>
                <img src=". $row->anons ." alt=". $row->anons . " style='width=100%'>
                <div class='post_flex'>
                    <p class='avtor'><i>Автор: <span>" . $row->avtor . "</span></i></p>
                    <a href='/post.php?id=" . $row->id . "' title='" . $row->title . "'>Прочитать</a>
                </div>
            </div>";
        }
        echo "</div>";
        ?>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
</body>

</html>