//Модальное окно для создания заметки в note/index
$(function(){
    $('#note-button').click(function(){
        $('#modal-note')
            .modal('show')
            .find('#createNote')
            .load($(this).attr('value'));
    });
});


// Флеш сообщение и отправка главной формы аяксом
$('#main-note-form').on('submit', function() {
    var form = $('#main-note-form');
    $.ajax({
        url: '/site/index',
        type: 'POST',
        dataType: 'json',
        data: form.serialize(),//Собираем данные формы и сериализуем их для передачи в контроллер
        complete: function(){//Исполнится в конце запроса аякса(неважно: удачен он или нет)
            var name = 'Alex';
            //var name = $('#evaluation-fio').val();
            var divAlert = $('#alert-div');
            divAlert.css({"display" : "block"}).html(name + ', you have successfully created the note! Just click on "My notes" for preview notes list');
            var explode = function () {
                divAlert.css({"display" : "none"}).val('');
            };
            setTimeout(explode, 5000);//блок с флеш сообщением висит 5 секунд и пропадает
            form.trigger('reset');//очищаем поля формы после отправки
        }
    });
    return false;//отменяем стандартное действие кнопки формы "Отправить"
});