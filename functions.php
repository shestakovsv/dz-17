<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');

function sql_UPDATE($bd, $id) {
    $insert_sql = "UPDATE `form` SET
                        `private` = '$_POST[private]',
                        `manager` = '$_POST[manager]',
                        `email` = '$_POST[email]',
                        `seller_name` = '$_POST[seller_name]',
                        `phone` = '$_POST[phone]',
                        `location_id` = '$_POST[location_id]',
                        `category_id` = '$_POST[category_id]',
                        `title` = '$_POST[title]',
                        `description` = '$_POST[description]',
                        `price` = '$_POST[price]',
                        `allow_mails` = '$_POST[allow_mails]'   
                        WHERE `id` = '$id'";
    mysqli_query($bd, $insert_sql);
}

function sql_INSERT($bd, $post_date) {
    $insert_sql = "INSERT INTO `form` (`private`, `manager`, `email`, `seller_name`, `phone`, `location_id`, `category_id`, `title`, `description`, `price`,`allow_mails`)
        VALUES ('$post_date[private]', '$post_date[manager]', '$post_date[email]', '$post_date[seller_name]','$post_date[phone]', '$post_date[location_id]', '$post_date[category_id]',
                '$post_date[title]', '$post_date[description]', '$post_date[price]', '$post_date[allow_mails]')";
    mysqli_query($bd, $insert_sql);
}

function sql_DELETE($bd, $id_del) {
    mysqli_query($bd, 'DELETE FROM `form`WHERE ((`id` = ' . $id_del . '))');
}

function table($bd, $name_table, $name_table_sql) {
    global $$name_table;
    $$name_table = mysqli_query($bd, "select * from $name_table_sql");
}

//блок циклов считываение таблиц в массивы

function table_form($form) {
    global $Announcements;
    while ($line_form = mysqli_fetch_assoc($form)) {
        $Announcements["$line_form[id]"] = $line_form;
    }
}

function table_sity($sity_table) {
    global $location;
    while ($line_sity = mysqli_fetch_assoc($sity_table)) {
        $location[$line_sity["location"]] = $line_sity["location"];
    }
}

function table_category($category_table) {
    global $category;
    while ($line_category = mysqli_fetch_assoc($category_table)) {
        $category[$line_category["subcategory"]][$line_category["id"]] = $line_category["category"];
    }
}
