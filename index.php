
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
include 'functions.php';


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


$Location = basename($_SERVER['PHP_SELF']);

//добавленых объявления в массив
if (isset($_POST['main_form_submit'])) {
    $post_date = $_POST;
    if (isset($_GET['id'])) { //изменение объявления ID в БД
        $id = $_GET['id'];
        sql_UPDATE($bd, $id, $post_date);
    } else { //иначе запись нового объявления в БД
        sql_INSERT($bd, $post_date);
    }
    header("Location: $Location");
    exit;
}

$Announcements = table_form($bd); //подключение таблицы заполненных форм


if ($_GET == TRUE) { //варианты действий при получении данных в GET
    if (isset($_GET['id'])) { // передача переменных в шаблон
        //table_form($form);
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
            $checked_private = '';
            $smarty->assign('checked_private', $checked_private);
        }
        $smarty->assign('save', 'Сохранить изменения');
        if ($Announcements[$id_key]['allow_mails'] == 1) {//определение наличия галочки в "Я не хочу получать вопросы по объявлению по e-mail"
            $smarty->assign('allow_mails', 'CHECKED');
        }
    }
    if (isset($_GET['id_del'])) { //удаление объявления id из БД с ID = $id_del
        $id_del = $_GET['id_del'];
        sql_DELETE($bd, $id_del);
        header("Location: $Location");
        exit;
    }
}



$private['Частное лицо'] = "Частное лицо";
$private['Компания'] = "Компания";

//подключение таблиц городов и категорий

$location = table_sity($bd);
$category = table_category($bd);

if (!empty($Announcements)) {
    $smarty->assign('Announcements', $Announcements);
}


//передача массивов в шаблон
$smarty->assign('Location', basename($_SERVER['PHP_SELF']));
$smarty->assign('location', $location);
$smarty->assign('category', $category);
$smarty->assign('private', $private);

$smarty->display('index.tpl');


