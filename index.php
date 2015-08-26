
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


//подключение к серверу SQL
$bd = mysqli_connect('localhost', "test1", "123", "advertisements") or die('Сервер недоступен'); //
echo 'подключение к серверу успешно <br>';



//подключение к базе данных
//mysql_select_db('advertisements') or die('база данных недоступна');
mysqli_query($bd, 'SET NAMES utf8');
echo 'подключение к базе данных advertisements успешно <br>';

// выбор таблиц
$fofm = mysqli_query($bd, 'select * from form');
$category_transport = mysqli_query($bd, 'SELECT * FROM `category_transport`');
$category_realty = mysqli_query($bd, 'SELECT * FROM `category_realty`');


//блок циклов считываение таблиц в массивы
while ($line_fofm = mysqli_fetch_assoc($fofm)) {
    $Announcements["$line_fofm[id]"] = $line_fofm;
}
while ($line_transport = mysqli_fetch_assoc($category_transport)) {
    $category["Транспорт"][$line_transport["category_transport"]] = $line_transport["category_transport"];
}
while ($line_realty = mysqli_fetch_assoc($category_realty)) {
    $category["Недвижимость"][$line_realty["category_realty"]] = $line_realty["category_realty"];
}



$Location = basename($_SERVER['PHP_SELF']);

//добавленых объявления в массив
if (isset($_POST['main_form_submit'])) {
    if (isset($_GET['id'])) { //изменение объявления ID в БД
        $id = $_GET['id'];
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
    } else { //иначе запись нового объявления в БД
        $insert_sql = "INSERT INTO `form` (`private`, `manager`, `email`, `seller_name`, `phone`, `location_id`, `category_id`, `title`, `description`, `price`,`allow_mails`)
        VALUES ('$_POST[private]', '$_POST[manager]', '$_POST[email]', '$_POST[seller_name]','$_POST[phone]', '$_POST[location_id]', '$_POST[category_id]',
                '$_POST[title]', '$_POST[description]', '$_POST[price]', '$_POST[allow_mails]')";
//        mysqli_query($insert_sql);
        mysqli_query($bd, $insert_sql);
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
        $checked = ($private_checked == 0) ? 'checked = ""' : ""; // обределение выбора в радиокнопке
        $smarty->assign('checked', $checked);
        $smarty->assign('save', 'Сохранить изменения');
        if ($Announcements[$id_key]['allow_mails'] == 1) {//определение наличия галочки в "Я не хочу получать вопросы по объявлению по e-mail"
            $smarty->assign('allow_mails', 'CHECKED');
        }
    }
    if (isset($_GET['id_del'])) { //удаление объявления id из БД с ID = $id_del
        $id_del = $_GET['id_del'];
        mysqli_query($bd,'DELETE FROM `form`WHERE ((`id` = ' . $id_del . '))');
        header("Location: $Location");
        exit;
    }
}


$location['Новосибирск'] = 'Новосибирск';
$location['Барабинск'] = 'Барабинск';
$location['Бердск'] = 'Бердск';
$location['Искитим'] = 'Искитим';
$location['Колывань'] = 'Колывань';



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


