<header>
    <span class="logo"><a href="/">Blog Master</a></span>
    <nav>
        <a href="/">📌Главная</a>
        <a href="/posts.php" >📌Статьи</a>
        <a href="/contacts.php">📌Контакты</a>
        <!-- // Проверка наличия в coockie перменной log. Если она есть, значит пользователь авторизован -->
        <?php if (isset($_COOKIE['login'])) : ?>
            <a href="/users.php" >🎃Пользователи</a>
            <a href="/login.php" class="btn"><?php echo strtoupper($_COOKIE['login']) ?> - кабинет</a>
        <?php else : ?>
            <a href="/login.php" class="btn" style="background-color: #43a047;">Войти</a>
            <a href="/register.php" class="btn">Регистрация</a>
        <?php endif; ?>
    </nav>
</header>