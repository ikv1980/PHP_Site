<aside>
    <div class="info">
        <h2>Интересные факты</h2>
        <p>Персональные данные россиян на сайте, сайт на хосте, хост на сервере, сервер в серверной, серверная в Сорбонне.</p>
    </div>
    <img src="https://itproger.com/img/intensivs/back-end.svg">
    <div>
        <div id="chat_block">
            <!-- Тут будут сообщения -->
            <?php 
                date_default_timezone_set('Europe/Moscow');
                echo '<div class="chat">';
                require_once "lib/mysql.php";
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
        </div>
        <form>
            <input type="text" name="chat" id="chat" placeholder="Сообщение" autocomplete="off">
            <div class="error-mess" id="error-chat"></div>
            <button type="button" id="add_chat" style="background-color: #74B62C;">Отправить</button>
        </form>
    </div>
</aside>


