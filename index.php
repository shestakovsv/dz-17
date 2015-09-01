
<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');

// проводим настройки смарти
$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root . '/smarty/';

// put full path to Smarty.class.php
require('smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->compile_check = true; //true;
$smarty->debugging = FALSE; //FALSE;

$smarty->template_dir = $smarty_dir . 'templates';
$smarty->compile_dir = $smarty_dir . 'templates_c';
$smarty->cache_dir = $smarty_dir . 'cache';
$smarty->config_dir = $smarty_dir . 'configs';

// определение функций

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

function sql_INSERT($bd) {
    $insert_sql = "INSERT INTO `form` (`private`, `manager`, `email`, `seller_name`, `phone`, `location_id`, `category_id`, `title`, `description`, `price`,`allow_mails`)
        VALUES ('$_POST[private]', '$_POST[manager]', '$_POST[email]', '$_POST[seller_name]','$_POST[phone]', '$_POST[location_id]', '$_POST[category_id]',
                '$_POST[title]', '$_POST[description]', '$_POST[price]', '$_POST[allow_mails]')";
    mysqli_query($bd, $insert_sql);
}

function sql_DELETE($bd) {
    $id_del = $_GET['id_del'];
    mysqli_query($bd, 'DELETE FROM `form`WHERE ((`id` = ' . $id_del . '))');
}

// загрузка данных из фала server_name,user_name, password, database
$filename = './User.txt';
if (file_exists($filename)) {
    $temp_str = file_get_contents('./User.txt');
    if (isset($temp_str)) {
        $User = unserialize(file_get_contents('./User.txt')); // действие в случае удачи
    } else {
        exit('Ошибка чтения файла'); // или другое действие при неудачном чтении файла
    }
}



//подключение к серверу SQL
$bd = @mysqli_connect($User['server_name'], $User['user_name'], $User['password'], $User['database']) or die('<a href="instal.php">проверьте введеные данные</a> - Сервер недоступен');

mysqli_query($bd, 'SET NAMES utf8');


// выбор таблиц
$form = mysqli_query($bd, 'select * from form');
$category_table = mysqli_query($bd, 'SELECT * FROM `category`');
$sity_table = mysqli_query($bd, 'SELECT * FROM `sity`');


//блок циклов считываение таблиц в массивы
while ($line_form = mysqli_fetch_assoc($form)) {
    $Announcements["$line_form[id]"] = $line_form;}
while ($line_sity = mysqli_fetch_assoc($sity_table)) {
    $location[$line_sity["location"]] = $line_sity["location"];}
while ($line_category = mysqli_fetch_assoc($category_table)) {
    $category[$line_category["subcategory"]][$line_category["id"]] = $line_category["category"];
}


$Location = basename($_SERVER['PHP_SELF']);

//добавленых объявления в массив
if (isset($_POST['main_form_submit'])) {
    if (isset($_GET['id'])) { //изменение объявления ID в БД
        $id = $_GET['id'];
        sql_UPDATE($bd, $id);
    } else { //иначе запись нового объявления в БД
        sql_INSERT($bd);
    }
    header("Location: $Location");
    exit;
}


if ($_GET == TRUE) { //варианты действий при получении данных в GET
    if (isset($_GET['id'])) { // передача переменных в шаблон
        $id_key = $_GET['id'];
        $smarty->assign('seller_name', $Announcements[$id_key]['seller_name']);
        $smarty->assign('email', $Announcements[$id_key]['email']);
        $smarty->assign('phone', $Announcements[$id_key]['phone']);
        $smarty->assign('email', $Announcements[$id_key]['email']);
        $smarty->assign('location_id', $Announcements[$id_key]['location_id']);
        $smarty->assign('category_id', $Announcements[$id_key]['category_id']);
        $smarty->assign('title', $Announcements[$id_key]['title']);
        $smarty->assign('description', $Announcements[$id_key]['description']);
        $smarty->assign('manager', $Announcements[$id_key]['manager']);
        $smarty->assign('price', $Announcements[$id_key]['price']);
        $private_checked = $private_checked = $Announcements[$id_key]['private'];
        if ($private_checked == 1) {
            $checked_private = 'checked = ""';
            $smarty->assign('checked_private', $checked_private);
        } else {
            $checked_company = 'checked = ""';
            $smarty->assign('checked_company', $checked_company);
        }
        $smarty->assign('save', 'Сохранить изменения');
        if ($Announcements[$id_key]['allow_mails'] == 1) {//определение наличия галочки в "Я не хочу получать вопросы по объявлению по e-mail"
            $smarty->assign('allow_mails', 'CHECKED');
        }
    }
    if (isset($_GET['id_del'])) { //удаление объявления id из БД с ID = $id_del
        sql_DELETE($bd);
        header("Location: $Location");
        exit;
    }
}



$private['Частное лицо'] = "Частное лицо";
$private['Компания'] = "Компания";


if (!empty($Announcements)) {
    $smarty->assign('Announcements', $Announcements);
}

//передача массивов в шаблон
$smarty->assign('Location', basename($_SERVER['PHP_SELF']));
$smarty->assign('location', $location);
$smarty->assign('category', $category);
$smarty->assign('private', $private);

$smarty->display('index.tpl');


