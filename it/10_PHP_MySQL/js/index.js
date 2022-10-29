// Скрытие поля ввода
$(document).ready(function() {
    $(".radio").change(function() {
        if ($("#localhost").prop("checked")) {
            $('#db').fadeIn(300);
            return;
        } else {
            $('#db').fadeOut(300);
        }
  })
})

// Запрет ввода кирилицы
$("#db").on('input', function(e) {
    this.value = this.value.replace(/[а-яё]/gi,'')
  });

// Запрет обновления страницы по F5 (а то переменные не обнуляются и заказы вносятся :)
function disableF5(e) {
    if ((e.which || e.keyCode) == 116) e.preventDefault();
};

$(document).ready(function(){
    $(document).on("keydown", disableF5);
});
