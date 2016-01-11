
$(document).ready(function () {
    $('button.btn').on('click', function () {
        var tr = $(this).closest('tr');
        var id = tr.children('td:first').html();
//        $.get('index.php?id_del=' + id, function () {
        $.getJSON('index.php?id_del=' + id, function () {
//            alert('success');
            tr.fadeOut('slow', function () {
                tr.remove();
//                alert('success');
            });
        });
    });


    $('input.btn').on('click', function () {
        var params = $('form.form-horizontal').serialize();
//        console.log(params);
        $.post('index.php', params, function (data) {
//            alert('Ваше объявление успешно добавлено' + data);
//            console.log(data);
            $('tbody').append(data);
        });
        $('form.form-horizontal').trigger('reset');
    });


    if (!$('tr').length) {
        alert("Активных объявлений нет!");
    }
    ;



});

