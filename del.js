$(document).ready(function () {
    $('button.btn').on('click', function () {
        var tr = $(this).closest('tr');
        var id = tr.children('td:first').html();
        tr.fadeOut('slow', function () {
            $(this).remove();
        });
        $.get('index.php?id_del=' + id);
        console.log(id);
    });
});