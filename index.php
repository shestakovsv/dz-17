
<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');


$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root . '/smarty/';

// put full path to Smarty.class.php
require('smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->compile_check = true;//true;
$smarty->debugging = FALSE;//FALSE;

$smarty->template_dir = $smarty_dir . 'templates';
$smarty->compile_dir = $smarty_dir . 'templates_c';
$smarty->cache_dir = $smarty_dir . 'cache';
$smarty->config_dir = $smarty_dir . 'configs';

$Location = basename($_SERVER['PHP_SELF']);
$filename = './Ann.txt';

if (file_exists($filename)) {
    $temp_str = file_get_contents('./Ann.txt');
    //Svar_dump($temp_str);
    if (isset($temp_str)) {
        $Announcements = unserialize(file_get_contents('./Ann.txt')); // действие в случае удачи
    } else {
        exit('Ошибка чтения файла'); // или другое действие при неудачном чтении файла
    }
}

function Announcements_serialize($Announcements) {
    $Announcements_serialize = serialize($Announcements);
    if (!file_put_contents('./Ann.txt', $Announcements_serialize)) {
        exit('Ошибка записи файла');
    }
}

//добавленых объявления в массив
if (isset($_POST['main_form_submit'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $Announcements[$id] = $_POST;
    } else {
        $Announcements[] = $_POST;
    }
    Announcements_serialize($Announcements);
    header("Location: $Location");
    exit;
}


if ($_GET == TRUE) {
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
        //$smarty->assign('private', $Announcements[$id_key]['private']);
        $private_checked = $private_checked = $Announcements[$id_key]['private'];
        $checked = ($private_checked == 0) ? 'checked = ""' : "";
        $smarty->assign('checked', $checked);
        $smarty->assign('save', 'Сохранить изменения'); 
        if (isset($Announcements[$id_key]['allow_mails'])) {
            $smarty->assign('allow_mails','CHECKED');
        }
    }
    if (isset($_GET['id_del'])) {
        $id_del = $_GET['id_del'];
        unset($Announcements[$id_del]);
        Announcements_serialize($Announcements);
        unset($id_del);
        $id_key = "";
        header("Location: $Location");
        exit;
    }
}


$location['Новосибирск'] = 'Новосибирск';
$location['Барабинск'] = 'Барабинск';
$location['Бердск'] = 'Бердск';
$location['Искитим'] = 'Искитим';
$location['Колывань'] = 'Колывань';

$category["Автомобили с пробегом"] = "Автомобили с пробегом";
$category["Новые автомобили"] = "Новые автомобили";
$category['Мотоциклы и мототехника'] = "Мотоциклы и мототехника";
$category['Грузовики и спецтехника'] = 'Грузовики и спецтехника';
$category['Водный транспорт'] = "Водный транспорт";
$category['Запчасти и аксессуары'] = "Запчасти и аксессуары";

$private['Частное лицо'] = "Частное лицо";
$private['Компания'] = "Компания";


if (!empty($Announcements)) {
    $smarty->assign('Announcements', $Announcements);
}


$smarty->assign('Location', basename($_SERVER['PHP_SELF']));
$smarty->assign('location', $location);
$smarty->assign('category', $category);
$smarty->assign('private', $private);

$smarty->display('index.tpl');


