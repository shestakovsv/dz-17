
$(document).ready(function () {
    $('button.btn').on('click', function () {
        var tr = $(this).closest('tr');
        var id = tr.children('td:first').html();
        $.getJSON('index.php?id_del=' + id, function () {
            tr.fadeOut('slow', function () {
                tr.remove();
            });
        });
    });
    $('input.btn').on('click', function () {
        alert("@@@@@@@@@@@@@@@@@@@@@@@@@@@");
    });
});

