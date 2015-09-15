<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');

//function sql_UPDATE($bd, $id, $post_date) {
//    $insert_sql = "UPDATE `form` SET
//                        `private` = '$post_date[private]',
//                        `manager` = '$post_date[manager]',
//                        `email` = '$post_date[email]',
//                        `seller_name` = '$post_date[seller_name]',
//                        `phone` = '$post_date[phone]',
//                        `location_id` = '$post_date[location_id]',
//                        `category_id` = '$post_date[category_id]',
//                        `title` = '$post_date[title]',
//                        `description` = '$post_date[description]',
//                        `price` = '$post_date[price]',
//                        `allow_mails` = '$post_date[allow_mails]'   
//                        WHERE `id` = '$id'";
//    mysqli_query($bd, $insert_sql);
//}
function sql_UPDATE($bd, $id, $post_date) {
    $bd->query('UPDATE `form` SET (?#)=VALUES(?a)  WHERE id =?d', array_keys($post_date), array_values($post_date), $id);
}

//function sql_INSERT($bd, $post_date) {
//    $insert_sql = "INSERT INTO `form` (`private`, `manager`, `email`, `seller_name`, `phone`, `location_id`, `category_id`, `title`, `description`, `price`,`allow_mails`)
//        VALUES ('$post_date[private]', '$post_date[manager]', '$post_date[email]', '$post_date[seller_name]','$post_date[phone]', '$post_date[location_id]', '$post_date[category_id]',
//                '$post_date[title]', '$post_date[description]', '$post_date[price]', '$post_date[allow_mails]')";
//    mysqli_query($bd, $insert_sql);
//}
function sql_INSERT($bd, $post_date) {
    $bd->query('INSERT INTO form(?#) VALUES(?a)', array_keys($post_date), array_values($post_date));
}

function sql_DELETE($bd, $id_del) {
//    mysqli_query($bd, 'DELETE FROM `form`WHERE ((`id` = ' . $id_del . '))');
    $bd->query('DELETE FROM form WHERE id =?a', $id_del);
}

//блок циклов считываение таблиц в массивы
function translation_table_form_in_array_Announcements($bd) {
    $Announcements = $bd->select("select * from form");
    if (!empty($Announcements)) {
        return $Announcements;
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
