
$(document).ready(function () {

    $('input.btn').on('click', function () {
        var idt = $('input.idt:hidden').attr('value'), params = $('form.form-horizontal').serialize();
        console.log(idt);
        $.post('index.php', params, function (data) {
            if (idt === undefined) {
                $('tbody').append(data);
            } else {
                var tr = $('[href*=' + idt + ']').closest('tr');
                tr.replaceWith(data);
            }
        });
        $('form.form-horizontal').trigger('reset');
        return false;
//        });
    });
//    $('button.btn').on('click', function () {
    $('#myTable').on('click', 'button.btn', function () {
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
//    
    $('#myTable').on('click', 'a', function () {
        var tr = $(this).closest('tr');
        var id = tr.children('td:first').html();
        $.getJSON("index.php?id=" + id, function (date) {
            if (date["private"] === 0) {
                $('input#ltd').attr("checked", "");
            } else {
                $('input#private_person').attr("checked", "");
            }
            ;
            $('[name = manager]').val(date["manager"]);
            $('[name = email]').val(date["email"]);
            if (date["allow_mails"] === "1") {
                $('input#allow_mails').attr("checked", "");
            } else {
                $('input#allow_mails').removeAttr("checked")
            }
            ;
            $('[name = seller_name]').val(date["seller_name"]);
            $('[name = phone]').val(date["phone"]);
            $('[name = location_id]').val(date["location_id"]);
            $('[name = category_id]').val(date["category_id"]);
            $('[name = description]').val(date["description"]);
            $('[name = title]').val(date["title"]);
            $('[name = price]').val(date["price"]);
            $('[name = price]').append("<input type='hidden' class='idt' value=" + date["id"] + " name='id'>");
            $('[name = main_form_submit]').val("Сохранить изменения");
        });
        return false;
    });
});



//$('#myTable').on('click', 'a', function () {
//    var tr = $(this).closest('tr');
//    var id = tr.children('td:first').html();
////        console.log(id);
//    $.getJSON("index.php?id=" + id, function (date) {
//        if (date["private"] === 0) {
//            $('input#ltd').attr("checked", "");
//        }
//        ;
//        $('[name = manager]').val(date["manager"]);
//        $('[name = email]').val(date["email"]);
//        if (date["allow_mails"] === "1") {
//            $('input#allow_mails').attr("checked", "");
//        }
//        ;
//        $('[name = seller_name]').val(date["seller_name"]);
//        $('[name = phone]').val(date["phone"]);
//        $('[name = location_id]').val(date["location_id"]);
//        $('[name = category_id]').val(date["category_id"]);
//        $('[name = description]').val(date["description"]);
//        $('[name = title]').val(date["title"]);
//        $('[name = price]').val(date["price"]);
//
//        $('[name = price]').append("<input type='hidden' class='idt' value=" + date["id"] + " name='id'>");
//
//        $('[name = main_form_submit]').val("Сохранить изменения");
//
//    });
//    return false;
//});


          