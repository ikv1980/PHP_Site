<?php 
    date_default_timezone_set('Europe/Moscow');
    echo '<div class="chat">';
    require_once "../lib/mysql.php";
    $sql = 'SELECT * FROM chat ORDER BY date DESC LIMIT 10';   //sql-запрос
    $query = $pdo->query($sql); //Отправка запроса
    $chats = $query->fetchAll(PDO::FETCH_OBJ); 
    foreach($chats as $chat) {
        if ($chat->name == $_COOKIE['login'])
        {
            echo 
            '<div class="owner">
                <p>'. $chat->message .'</p>
                <p><span>'. date('H:i', $chat->date) .'</span></p>
            </div>';
        }
        else 
        {
            echo 
            '<div class="other">
                <p><b>'. $chat->name .'</b><br>'
                        . $chat->message . 
                '</p>
                <p><span>'. date('H:i', $chat->date) .'</span></p>
            </div>';
        }
    }
    echo '</div>'
?>