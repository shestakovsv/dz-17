


$(document).ready(function () {

    function showResponse(response) {
//        console.log(response);
        var idt = $('input.idt:hidden').attr('value'); //, params = $('form.form-horizontal').serialize();
//        console.log(idt);
        if (idt === undefined) {
            $('tbody').append(response);
        } else if (idt === '') {
            $('tbody').append(response);
        } else {
            var tr = $('td.' + idt + '').closest('tr');

            tr.replaceWith(response);
//            $('input.idt:hidden').attr('value','');
            $('input.idt:hidden').remove();
        }
        $('form.form-horizontal').trigger('reset'); //сброс формы

        return false;
    }
    ;
    var options = {
//        target: '#output1', // target element(s) to be updated with server response 
//        beforeSubmit: showRequest, // pre-submit callback 
        success: showResponse, // post-submit callback 

        // other available options: 
        url: 'index.php', // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
//        dataType: 'json', // 'xml', 'script', or 'json' (expected server response type) 
//        clearForm: true, // clear all form fields after successful submit 
//        resetForm: true      // reset the form after successful submit 

        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    };
    // bind form using 'ajaxForm' 
    $('#myForm').ajaxForm(options);
    //отправка данных с формы на сервер и сброс формы
//    $('input.btn').on('click', function () {
//        var idt = $('input.idt:hidden').attr('value');//, params = $('form.form-horizontal').serialize();
//        console.log(idt);
////        $.post('index.php', params, function (data) {
//            $('#myForm').ajaxForm(options);
//            if (idt === undefined) {
//                $('tbody').append(data);
//            } else {
//                var tr = $('[href*=' + idt + ']').closest('tr');
//                tr.replaceWith(data);
//            }
////        });
//        $('form.form-horizontal').trigger('reset');//сброс формы
//        return false;
//    });

    //удаление объявления и проверка на наличие объявлений
    $('#myTable').on('click', 'button.btn', function () {
        var tr = $(this).closest('tr');
        var id = tr.children('td:first').html();
        $.getJSON('index.php?id_del=' + id, function () {
            tr.fadeOut('slow', function () {
                tr.remove();
                if (!$('td.id').length) { //проверка на наличие объявлений
                    alert("Активных объявлений нет!");
                }
                ;
            });
        });
    });
    //подстановка данных в форму     
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
//
//function showResponse(responseText, statusText, xhr, $form) {
//    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
//        '\n\nThe output div should have already been updated with the responseText.'); 
//}
//;




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


          