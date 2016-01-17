
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
        var idt = $('input.idt:hidden').attr('value');

        console.log(idt);
        if (idt === undefined) {
            alert("нет id");
        } else {
            var table_id = $('.id');
            console.log(table_id);
            table_id.each(function () {
                var table_id_html = $(this).html();
                console.log(table_id_html);
                //console.log(id);

                if (idt === table_id_html) {
                    alert("мы нашли наш id - " + idt);
                }


            });
        }
        ;
    });
});




//var idt = $('input.idt:hidden').attr('value');
//
//console.log(idt);
//if (idt === undefined) {
//    alert("нет id");
//} else {
//    var table_id = $('.id');
//    console.log(table_id);
//    table_id.each(function () {
//        var table_id_html = $(this).html();
//        console.log(table_id_html);
//        //console.log(id);
//
//        if (idt = table_id_html) {
//            alert("мы нашли наш id - " + idt);
//        }
//
//
//    });
//}
//;

//ДАЛЕЕ НАРАБОТКИ.

//var idt = $('input.idt:hidden').attr('value');
//
//        console.log(idt);
//        if (idt === undefined) {
//            alert("нет id");
//        } else {
//            var table_id = $('.id');
//            console.log(table_id);
//            table_id.each(function () {
//                var table_id_html = $(this).html();
//                console.log(table_id_html);
//                //console.log(id);
//              
//              if (idt = table_id_html){
//                  alert("мы нашли наш id - " + idt);
//              }
//              
//              
//            });
//        };




//    $('tbody a').on('click', function () {
//       var params = $('form.form-horizontal').serialize();
//        var tr = $(this).closest('tr');
//        var id = tr.children('td:first').html();
//        console.log(id);

//        $('input.btn').on('click', function () {
//        var table_id = $('.id');
//console.log(table_id);
//table_id.each(function () {
//    console.log(
//            $(this).html()
//            );
//});
//            var params = $('form.form-horizontal').serialize();
//        console.log(params);
//            $.post('index.php', params, function (data) {
//            alert('Ваше объявление успешно добавлено' + data);
//            console.log(data);
//                tr.replase(data);
//            });
//            $('form.form-horizontal').trigger('reset');
//        });
//        $.post('index.php', params, function (data) {
//            alert(id);
//            
////             var table_id = $('.id');
//    console.log(table_id);
//    table_id.each(function () {
//        console.log(
//                $(this).html()
//                );
//    });
//
//
//    var id = $('input.id:hidden');
//    console.log(id);
//    
//    
//    
//    
//    
//           console.log(data);
// $('tbody').append(data);
//       });
//               $('form.form-horizontal').trigger('reset');
//    });

//$('input.btn').on('click', function () {

//        var id = $('form.form-horizontal:hidden');
//        var params = $('form.form-horizontal').serialize();
//        console.log(params);
//        $.post('index.php', params, function (data) {
//            alert(id);
//            console.log(data);
//            
//            $('tbody').append(data);
//        });
//        $('form.form-horizontal').trigger('reset');
//});
if (!$('tr').length) {
    alert("Активных объявлений нет!");
}
;
//}
//);

