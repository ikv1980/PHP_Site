<header>
    <span class="logo"><a href="/">Blog Master</a></span>
    <nav>
        <a href="/">Главная</a>
        <!-- // Проверка наличия в coockie перменной log. Если она есть, значит пользователь авторизован -->
        <?php if (isset($_COOKIE['log'])) : ?>
            <a href="/users.php" >Список пользователей</a>
            <a href="/login.php" class="btn">💀 <?php echo $_COOKIE['log'] ?> - кабинет</a>
        <?php else : ?>
            <a href="/login.php" class="btn">Войти</a>
            <a href="/register.php" class="btn">Регистрация</a>
        <?php endif; ?>
    </nav>
</header>