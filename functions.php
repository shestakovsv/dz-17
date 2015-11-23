<?php

function objectCreation($bd) {
    $announcements_massiv = $bd->select("select *,id AS ARRAY_KEY  from form");
    foreach ($announcements_massiv as $key => $value) {
        if ($value['private'] == 0) {
            new AdvertisementCompany($value);
        } else {
            new AdvertisementPrivate($value);
        }
    }
}

//function addObject($postDate, $bd) {
//    if ($postDate['private'] == 0) {
//        $adv = AdvertisementFactory::build("AdvertisementCompany", $postDate);
//        $adv->repository();
//    } else {
//        $adv = AdvertisementFactory::build("AdvertisementPrivate", $postDate);
//        $adv->repository();
//    }
//    $adv->save($bd, $adv);
//}

//блок циклов считываение таблиц в массив объектов
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
