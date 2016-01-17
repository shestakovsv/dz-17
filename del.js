
$(document).ready(function () {
    $('button.btn').on('click', function () {
        var tr = $(this).closest('tr');
        var id = tr.children('td:first').html();
//        $.get('index.php?id_del=' + id, function () {
        $.getJSON('index.php?id_del=' + id, function () {
//            alert('success');
            tr.fadeOut('slow', function () {
                tr.remove();
                if (!$('td.id').length) {
                    alert("Активных объявлений нет!");
                }
                ;
            });
        });
    });
    $('input.btn').on('click', function () {
        var idt = $('input.idt:hidden').attr('value');
        var params = $('form.form-horizontal').serialize();
        console.log(idt);
        if (idt === undefined) {
            $.post('index.php', params, function (data) {
                $('tbody').append(data);
            });
        } else {
            $.post('index.php', params, function (data) {
                var tr = $('[href*=' + idt + ']').closest('tr');
                tr.replaceWith(data);
            });
        }
        ;
        $('form.form-horizontal').trigger('reset');
    });
});
