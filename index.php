
<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');


$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root . '/smarty/';

// put full path to Smarty.class.php
require('smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->compile_check = true;
$smarty->debugging = FALSE;

$smarty->template_dir = $smarty_dir . 'templates';
$smarty->compile_dir = $smarty_dir . 'templates_c';
$smarty->cache_dir = $smarty_dir . 'cache';
$smarty->config_dir = $smarty_dir . 'configs';

$Location = basename($_SERVER['PHP_SELF']);
$filename = './Ann.txt';

if (file_exists($filename)) {
    $temp_str = file_get_contents('./Ann.txt');
    //var_dump($temp_str);
    if (isset($temp_str)) {
        $Announcements = unserialize(file_get_contents('./Ann.txt')); // действие в случае удачи
    } else {
        exit('Ошибка чтения файла'); // или другое действие при неудачном чтении файла
    }
} else {
    $Announcements = fopen('./Ann.txt', 'w+');
    $Announcements = '';
}

function Announcements_serialize($Announcements) {
    $Announcements_serialize = serialize($Announcements);
    if (!file_put_contents('./Ann.txt', $Announcements_serialize)) {
        exit('Ошибка записи файла');
    }
}
//добавленых объявления в массив
if (isset($_POST['main_form_submit'])) {
    echo "111111111111111111111111111111111111111111111111111111111111";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $Announcements[$id] = $_POST;
        $_GET['id'] = "";
        unset($_GET['id']);
    } else {
        $Announcements[] = $_POST;
    }
    //print_r($Announcements);
    Announcements_serialize($Announcements);
    header("Location: $Location");
    exit;
}


if ($_GET == TRUE) {
    if (isset($_GET['id'])) {
        $id_key = $_GET['id'];
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
} else {
    $id_key = ""; // пока нет данных выводим пустую форму
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

if ($id_key == null) {
    $seller_name = "";
    $email = "";
    $phone = "";
    $location_id = "Выберите Ваш город";
    $category_id = "Выберите категорию";
    $title = "";
    $description = "";
    $price = "0";
    $manager = "";
    $email = "";
    $phone = "";
    $private_checked = 1;
    $allow_mails = 0;
} else {
    $seller_name = $Announcements[$id_key]['seller_name'];
    $email = $Announcements[$id_key]['email'];
    $phone = $Announcements[$id_key]['phone'];
    $location_id = $Announcements[$id_key]['location_id'];
    $category_id = $Announcements[$id_key]['category_id'];
    $title = $Announcements[$id_key]['title'];
    $description = $Announcements[$id_key]['description'];
    $price = $Announcements[$id_key]['price'];
    $manager = $Announcements[$id_key]['manager'];
    $email = $Announcements[$id_key]['email'];
    $phone = $Announcements[$id_key]['phone'];
    $private_checked = $Announcements[$id_key]['private'];
    if (isset($Announcements[$id_key]['allow_mails'])) {
        $allow_mails = $Announcements[$id_key]['allow_mails'];
    } else {
        $allow_mails = 0;
    }
}
$checked = ($private_checked == 0) ? 'checked = ""' : "";




$smarty->assign('seller_name', $seller_name);
$smarty->assign('email', $email);
$smarty->assign('phone', $phone);
$smarty->assign('location_id', $location_id);
$smarty->assign('category_id', $category_id);
$smarty->assign('title', $title);
$smarty->assign('description', $description);
$smarty->assign('price', $price);
$smarty->assign('manager', $manager);
$smarty->assign('email', $email);
$smarty->assign('phone', $phone);
$smarty->assign('private_checked', $private_checked);
$smarty->assign('allow_mails', $allow_mails);
$smarty->assign('checked', $checked);


if (!empty($Announcements)) {
    $smarty->assign('Announcements', $Announcements);
}


$smarty->assign('Location', basename($_SERVER['PHP_SELF']));
$smarty->assign('location', $location);
$smarty->assign('category', $category);
$smarty->assign('private', $private);
$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');


