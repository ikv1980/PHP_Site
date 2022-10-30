<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    require_once "lib/mysql.php";
    $sql = 'SELECT * FROM articles WHERE `id` = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$_GET['id']]);

    $article = $query->fetch(PDO::FETCH_OBJ);

    $website_title = $article->title;
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
        <?php

        echo "<div class='post' style='width:100%'>
                <h1>" . $article->title . "</h1>
                <img src=". $article->anons ." alt=". $row->anons . " style='width=100%'>
                <p>" . $article->full_text . "</p>
                <div class='post_flex'>
                    <p class='avtor'><i>Автор: <span>" . $article->avtor . "</span></i></p>
                    <p><b>Дата публикации:</b> " . date('Y-m-d (H:i)', $article->date) . "</p>
                </div>
            </div>";
        ?>

        <h3>Комментарии</h3>
        <form>
            <label for="username">Ваше имя</label>
            <?php if (isset($_COOKIE['login'])) : ?>
                <input type="text" name="username" id="username" value="<?= $_COOKIE['login'] ?>">
            <?php else : ?>
                <input type="text" name="username" id="username">
            <?php endif; ?>

            <label for="mess">Сообщения</label>
            <textarea name="mess" id="mess"></textarea>

            <div class="error-mess" id="error-block"></div>

            <button type="button" id="mess_send">Добавить комментарий</button>
        </form>

        <div class="comments">
            <?php
            $sql = 'SELECT * FROM comments WHERE `article_id` = ? ORDER BY id DESC';
            $query = $pdo->prepare($sql);
            $query->execute([$_GET['id']]);

            $comments = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($comments as $el) {
                echo "<div class='comment'>
                    <h2>" . $el->name . "</h2>
                    <p>" . $el->mess . "</p>
                </div>";
            }
            ?>
        </div>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    <script>
        $('#mess_send').click(function() {
            let name = $('#username').val();
            let mess = $('#mess').val();

            $.ajax({
                url: 'ajax/comment_add.php',
                type: 'POST',
                cache: false,
                data: {
                    'username': name,
                    'mess': mess,
                    'id': '<?= $_GET['id'] ?>'
                },
                dataType: 'html',
                success: function(data) {
                    if (data === "Done") {
                        $(".comments").prepend(`<div class='comment'>
                            <h2>${name}</h2>
                            <p>${mess}</p>
                        </div>`);
                        $("#mess_send").css("background","#74B62C");
                        $("#mess_send").text("Все готово");
                        $("#error-block").hide();
                        $('#mess').val("");
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