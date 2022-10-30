<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
    $website_title = "Статьи с сайта";
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
    <div class='post_flex'>
        <h1>Статьи с сайта</h1>
        <a href="/add-article.php"><button style="background-color: #74B62C;">Добавить статью</button></a>
    </div>
    <br>

        <?php
            require_once "lib/mysql.php";
            $sql = 'SELECT * FROM articles ORDER BY `date` DESC';
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