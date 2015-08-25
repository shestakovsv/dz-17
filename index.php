
<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');


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


$bd = mysql_connect('localhost', "test1", "123") or die('Сервер недоступен');
echo 'подключение к серверу успешно <br>';
mysql_select_db('advertisements') or die('база данных недоступна');
mysql_query('SET NAMES utf8');
echo 'подключение к базе данных advertisements успешно <br>';
//mysql_select_db('category_transport') or die('база данных недоступна');
//mysql_query('SET NAMES utf8');
//echo 'подключение к базе данных category_transport успешно';

$fofm = mysql_query('select * from form');
$category_transport=mysql_query('SELECT * FROM `category_transport`');
$category_realty=mysql_query('SELECT * FROM `category_realty`');
//$category["Транспорт"]
        
print_r($category_transport) ;       

while ($abc = mysql_fetch_assoc($fofm)) {
    $Announcements["$abc[id]"] = $abc;
}
while ($abc2 = mysql_fetch_assoc($category_transport)) {
    $category["Транспорт"][$abc2["category_transport"]] = $abc2["category_transport"];
}
while ($abc3 = mysql_fetch_assoc($category_realty)) {
    $category["Недвижимость"][$abc3["category_realty"]] = $abc3["category_realty"];
}
var_dump($category);


$Location = basename($_SERVER['PHP_SELF']);

//добавленых объявления в массив
if (isset($_POST['main_form_submit'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        echo 'bpvtybnm!!!!!!!!!!';

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
                        `price` = '$_POST[price]'
                        WHERE `id` = '$id'";

        mysql_query($insert_sql);
    } else {
        $insert_sql = "INSERT INTO `form` (`private`, `manager`, `email`, `seller_name`, `phone`, `location_id`, `category_id`, `title`, `description`, `price`)
        VALUES ('$_POST[private]', '$_POST[manager]', '$_POST[email]', '$_POST[seller_name]','$_POST[phone]', '$_POST[location_id]', '$_POST[category_id]',
                '$_POST[title]', '$_POST[description]', '$_POST[price]')";
        mysql_query($insert_sql);
        echo '111111111111111111';
    }
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

        echo $Announcements[$id_key]['private'];

        $checked = ($private_checked == 0) ? 'checked = ""' : "";
        $smarty->assign('checked', $checked);
        $smarty->assign('save', 'Сохранить изменения');
        if (isset($Announcements[$id_key]['allow_mails'])) {
            $smarty->assign('allow_mails', 'CHECKED');
        }
    }
    if (isset($_GET['id_del'])) {
        $id_del = $_GET['id_del'];
        mysql_query('DELETE FROM `form`WHERE ((`id` = ' . $id_del . '))');
        header("Location: $Location");
        exit;
    }
}


$location['Новосибирск'] = 'Новосибирск';
$location['Барабинск'] = 'Барабинск';
$location['Бердск'] = 'Бердск';
$location['Искитим'] = 'Искитим';
$location['Колывань'] = 'Колывань';



//$category["Транспорт"]["Автомобили с пробегом"] = "Автомобили с пробегом";
//$category["Транспорт"]["Новые автомобили"] = "Новые автомобили";
//$category["Транспорт"]['Мотоциклы и мототехника'] = "Мотоциклы и мототехника";
//$category["Транспорт"]['Грузовики и спецтехника'] = 'Грузовики и спецтехника';
//$category["Транспорт"]['Водный транспорт'] = "Водный транспорт";
//$category["Недвижимость"]['Квартиры'] = "Квартиры";
//$category["Недвижимость"]['Комнаты'] = "Комнаты";
//$category["Недвижимость"]['Дома, дачи, коттеджи'] = "Дома, дачи, коттеджи";
//$category["Недвижимость"]['Земельные участки'] = "Земельные участки";
//$category["Недвижимость"]['Гаражи и машиноместа'] = "Гаражи и машиноместа";
//$category["Недвижимость"]['Коммерческая недвижимость'] = "Коммерческая недвижимость";
//$category["Недвижимость"]['Недвижимость за рубежом'] = "Недвижимость за рубежом";


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


