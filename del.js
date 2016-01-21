
$(document).ready(function () {
    $('input.btn').on('click', function () {
        var idt = $('input.idt:hidden').attr('value'), params = $('form.form-horizontal').serialize();
        $.post('index.php', params, function (data) {
            if (idt === undefined) {
                $('tbody').append(data);
            } else {
                var tr = $('[href*=' + idt + ']').closest('tr');
                tr.replaceWith(data);
            }
        });
        $.get("index.php?id", function (date) {
            $('form.form-horizontal').replaceWith(date);
            return false;
        });
    });
    $('button.btn').on('click', function () {
        var tr = $(this).closest('tr');
        var id = tr.children('td:first').html();
        $.getJSON('index.php?id_del=' + id, function () {
            tr.fadeOut('slow', function () {
                tr.remove();
                if (!$('td.id').length) {
                    alert("Активных объявлений нет!");
                }
                ;
            });
        });
    });
    $('a').click(function () {
        var tr = $(this).closest('tr');
        var id = tr.children('td:first').html();
//        console.log(id);
        $.get("index.php?id=" + id, function (date) {
            $('form.form-horizontal').replaceWith(date);
        });
        return false;
    });
});
