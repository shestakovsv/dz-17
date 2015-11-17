<?php

//блок циклов считываение таблиц в массив объектов
//функция не нужна
function translation_table_form_in_array_objeckt_Announcements($bd) {
    $Announcements_massiv = $bd->select("select *,id AS ARRAY_KEY  from form");
    foreach ($Announcements_massiv as $key => $value) {
        if ($value['private'] == 0) {
            $Announcements[$key] = new advertisement_company_class($value);
        } else {
            $Announcements[$key] = new advertisement_private_class($value);
        }
    }
}

function translation_table_sity_in_array_location($bd) {
    $location = $bd->selectCol('SELECT location AS ARRAY_KEY,location FROM sity');
    return $location;
}

function translation_table_category_in_array_category($bd) {
    $category = $bd->selectCol('SELECT subcategory AS ARRAY_KEY_1,id AS ARRAY_KEY_2 ,category  FROM category');
    return $category;
}

function myLogger($db, $sql, $caller) {
    global $firePHP;
    if (isset($caller['file'])) {
        $firePHP->group("at " . @$caller['file'] . ' line ' . @$caller['line']);
    }
    $firePHP->log($sql);
    if (isset($caller['file'])) {
        $firePHP->groupEnd();
    }
}

// Код обработчика ошибок SQL.
function databaseErrorHandler($message, $info) {
    // Если использовалась @, ничего не делать.
    if (!error_reporting())
        return;
    // Выводим подробную информацию об ошибке.
    echo "SQL Error: $message<br><pre>";
    print_r($info);
    echo "</pre>";
    exit();
}
