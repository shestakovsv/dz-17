<?php
header('Content-type: text/html; charset=utf-8');
?>
<script>
    var name = "Sergey";
    var age = 30;

    console.log("Меня зовут ", name);
    console.log("Мне ", age, " лет");

    var SITY = "Komsomolsk";
    if (SITY !== undefined) {
        console.log("я живу в городе ", SITY);
    } else {
        console.log("константы не сущевствует ");
    }

    var book = new Array();
    book["title"] = "Rebus Gaala";
    book["autor"] = "Panov";
    book["pages"] = 333;

    console.log("Недавно я прочитал книгу ", book['title'], " написанную автором ", book["autor"], " я этой книге ", book["pages"], " страниц");

    var book2 = new Array();
    book2["title"] = "Everest";
    book2["autor"] = "Anatoliy Bukreev";
    book2["pages"] = 500;

    var books = new Array();
    books["book"] = book;
    books["book2"] = book2;

    console.log("Недавно я прочитал книги ", books["book"]['title'], " и ", books["book2"]['title'], ", написанные соответственно авторами ", books["book"]["autor"], "  и ", books["book2"]["autor"], " , я осилил в сумме ", (books["book"]["pages"]+books["book2"]["pages"]), " , не ожидал от себя подобного");


</script>

