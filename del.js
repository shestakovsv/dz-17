
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
        console.log(params);
        $.post("index.php", params, function () {
            alert('передано');
        });
    });
//    $('button.btn').on('click', function () {
//        alert('success');
//        var param = $('table').serialize();
//        $.post("index.php", param, function (data) {
//            console.log(data);
//            console.log(param);
//        });
//
//    });
//    $('input.btn').on('click', function (e) {
//        alert('success');
//       var params = 
//           $('form')
//       ;
//        $.post("index.php",params,function(data){
//            console.log(data);
//        });
//        //console.log("pos");
//
//    });
});

