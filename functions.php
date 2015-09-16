<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');

function sql_UPDATE($bd, $id, $post_date) {
    unset($post_date["main_form_submit"]);
    $bd->query('UPDATE form SET ?a WHERE id =?', $post_date, $id);
    if (empty($post_date["allow_mails"])) {
        $value = '';
        $bd->query('UPDATE form SET allow_mails=? WHERE id =?', $value, $id);
    }
}

function sql_INSERT($bd, $post_date) {
    unset($post_date[main_form_submit]);
    $bd->query('INSERT INTO form(?#) VALUES(?a)', array_keys($post_date), array_values($post_date));
}

function sql_DELETE($bd, $id_del) {
    $bd->select('DELETE FROM form WHERE id = ?', $id_del);
}

//блок циклов считываение таблиц в массивы
function translation_table_form_in_array_Announcements($bd) {
    $Announcements = $bd->select("select *,id AS ARRAY_KEY  from form");
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
