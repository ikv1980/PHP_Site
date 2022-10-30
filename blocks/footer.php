<footer>Все права защищены</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

    // Функция отправки сообщения
    function send_message(){
        let message = $('#chat').val();

        $.ajax({
            url: 'ajax/add_mess_chat.php',
            type: 'POST',
            cache: false,
            data: {
                'message': message
            },
            dataType: 'html',
            success: function(data) {
                if (data === "chat_yes") {
                    $("#error-chat").hide();
                    $('#chat').val("");
                } else {
                    $("#error-chat").show();
                    $("#error-chat").text(data);
                }
            }
        });
    };

    //Функция загрузки сообщений
    function load_message()  {
        $.ajax({
        type: "POST",
        url: 'ajax/show_chat.php',
        data: "req=ok",
        success: function(html) {
            // //Очищаем блок с сообщениями
            $("#chat_block").empty();
            // //Выводим последние 10 сообщений из БД
            $("#chat_block").append(html);
        }
        });
    }

    // Обработчик события нажатия на кнопку
    $('#add_chat').click(function() {
        send_message()
    });


    // Обработчик события нажатия Ентер в поле инпут чата
    $('#chat').on('keypress',function(e) {
        if(e.which == 13) {
            send_message()
        }
    });

        // Обновление чата каждые 3 секунды
    setInterval(function() {
	    console.log('Какие-то действия здесь');
        load_message();
    }, 3000);

</script>