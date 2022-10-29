<?php
    // -------------------------------------------------------------------вывод инфо
    // echo 'Полученная dbname через GET: '.$dbname.'<br>'; 
    // // 
    // echo 'Полученный login через POST: '.$_POST['login'].'<br>';
    // // 
    // echo 'Полученный category через POST: '.$_POST['category'].'<br>';
    // // 
    // echo 'Полученный login через POST: '.$_POST['user_id'].'<br>';
    // echo 'Полученный category через POST: '.$_POST['item_id'].'<br>';
    // -------------------------------------------------------------------вывод инфо

    if (isset($_POST['login'])) {
        // 1. Выбор пользователя из таблицы items.
        $login = $_POST['login'];
        $sql = 'SELECT * FROM `users` WHERE `login` = ?'; //sql-запрос
        $query = $conn->prepare($sql); //Подготовка запроса к отправке
        $query->execute([$login]); //выполняем запрос
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        echo '<hr><table class="table table-bordered border-primary">';
        echo '<thead class="table-primary"><tr><th >№</th><th>Пользователь</th></tr></thead>';
        foreach($users as $user) {
            echo '<tr class="table-secondary"><td>'.$user->id.'</td>';
            echo '<td>'.$user->login.'</td></tr>';}
        echo '</table>';

    } else if (isset($_POST['category'])) {
        // 1. Выбор категории из таблицы users.
        $category = $_POST['category'];
        $sql = 'SELECT * FROM `items` WHERE `category` = ?'; //sql-запрос
        $query = $conn->prepare($sql); //Подготовка запроса к отправке
        $query->execute([$category]); //выполняем запрос
        $items = $query->fetchAll(PDO::FETCH_OBJ);
        echo '<hr><table class="table table-bordered border-primary">';
        echo '<thead class="table-primary"><tr><th >№</th><th>Наименование</th><th>Цена</th><th>Категория</th></tr></thead>';
        foreach($items as $item) {
            echo '<tr class="table-secondary"><td>'.$item->id.'</td>';
            echo '<td>'.$item->title.'</td>';
            echo '<td>'.$item->price.'</td>';
            echo '<td>'.$item->category.'</td></tr>';}
        echo '</table>';

    } else if (isset($_POST['user_id']) && isset($_POST['item_id'])) {
        // 1. Оформление заказа.
        $user_id = intval($_POST['user_id']);
        $item_id = intval($_POST['item_id']);
        $sql = 'INSERT INTO orders (user_id, item_id) VALUES (:user_id, :item_id)';
        $query = $conn->prepare($sql);
        $query->execute(['user_id' => $user_id, 'item_id' => $item_id]);
        // 1. Вывод всех заказов, включая добавленный
        $sql = 'SELECT orders.id, users.login, items.title FROM orders JOIN users ON users.id = orders.user_id JOIN items ON items.id = orders.item_id';
        $query = $conn->query($sql); //Отправка запроса
        $orders = $query->fetchAll(PDO::FETCH_OBJ);
        // var_dump($orders);
        echo '<hr><table class="table table-bordered border-primary">';
        echo '<thead class="table-primary"><tr><th >№ заказа</th><th s>Пользователь</th><th >Наименование</th></tr></thead>';
        foreach($orders as $order) {
            echo '<tr class="table-secondary"><td>'.$order->id.'</td>';
            echo '<td>'.$order->login.'</td>';
            echo '<td>'.$order->title.'</td></tr>';}
        echo '</table>';
        }
?>