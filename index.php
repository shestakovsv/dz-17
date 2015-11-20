
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE | E_COMPILE_ERROR);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');


// проводим настройки смарти
$project_root = __DIR__;
$smarty_dir = $project_root . '/smarty/';
//подключение библиотеки DBsimple
require_once $project_root . "/dbsimple/config.php";
require_once "DbSimple/Generic.php";
//подключение библиотеки Firephp
require_once ($project_root . "/FirePHPCore/FirePHP.class.php");
//инициализация класса Firephp
$firePHP = FirePHP::getInstance(true);
//Устанавливаем активность. Если выключить (false), то отладочные сообщения не будут
//отображаться в FireBug
$firePHP->setEnabled(true);

require('smarty/libs/Smarty.class.php'); //Подключение библиотек смарти
$smarty = new Smarty(); //создание объекта смарти

$smarty->compile_check = true; //true;
$smarty->debugging = FALSE; //FALSE;

$smarty->template_dir = $smarty_dir . 'templates';
$smarty->compile_dir = $smarty_dir . 'templates_c';
$smarty->cache_dir = $smarty_dir . 'cache';
$smarty->config_dir = $smarty_dir . 'configs';

// определение функций
include 'functions.php';
//определение классов
include 'Adv.php';
include 'AdvCompany.php';
include 'AdvPrivate.php';


// загрузка данных из фала server_name,user_name, password, database
$filename = './User.txt';
if (file_exists($filename)) {
    $temp_str = file_get_contents('./User.txt');
    if (isset($temp_str)) {
        $user = unserialize(file_get_contents('./User.txt')); // действие в случае удачи
    } else {
        ?><a href="instal.php">Проверьте введенные данные</a><?php
        exit('Ошибка чтения файла'); // или другое действие при неудачном чтении файла
    }
} else {
    ?><a href="instal.php">Проверьте введенные данные</a><?php
    exit('Ошибка чтения файла');
}


//подключение к серверу SQL
$bd = DbSimple_Generic::connect("mysqli://$user[user_name]:$user[password]@$user[server_name]/$user[database]");

// Устанавливаем обработчик ошибок.
$bd->setErrorHandler('databaseErrorHandler');
$bd->setLogger('myLogger');



$bd->query('SET NAMES utf8'); //установка кодировки utf8


$location = basename($_SERVER['PHP_SELF']);

//добавленых объявления в массив
if (isset($_POST['main_form_submit'])) {
    $post_date = $_POST;
    if (empty($post_date["allow_mails"])) {
        $post_date["allow_mails"] = 0;
    }
    unset($post_date["main_form_submit"]);
    if ($post_date['private'] == 0) {
//        $adv = new AdvertisementCompany($post_date);
        $advertisementCompany = new AdvertisementCompany($post_date);
        $advertisementCompany->repository();
    } else {
//        $adv = new AdvertisementPrivate($post_date);
        $advertisementPrivatenew = new AdvertisementPrivate($value);
        $advertisementPrivatenew->repository();
    }
    if (isset($_GET['id'])) { //изменение объявления ID в БД
        $id = $_GET['id'];
        $adv->sql_UPDATE($bd, $id, $adv);
    } else { //иначе запись нового объявления в БД
        $adv->sql_INSERT($bd, $adv);
    }
    header("Location: $location");
    exit;
}




//варианты действий при получении данных в GET
if (isset($_GET['id_del'])) { //удаление объявления id из БД с ID = $id_del
    $id_del = $_GET['id_del'];
    Advertisement_class::sql_DELETE($bd, $id_del);
}


//подключение таблицы заполненных форм
$announcements_massiv = $bd->select("select *,id AS ARRAY_KEY  from form");
foreach ($announcements_massiv as $key => $value) {
    if ($value['private'] == 0) {
        $advertisementCompany = new AdvertisementCompany($value);
        $advertisementCompany->repository();
    } else {
        $advertisementPrivatenew = new AdvertisementPrivate($value);
        $advertisementPrivatenew->repository();
    }
}


$repository = RepositoryAds::getinstance(); //подключение к хранилищу
$announcementsObgect = $repository->repositoryGet(); //извлечение массива с объектами объявлений из хранилища
//var_dump($announcementsObgect);
//var_dump($writer);




if (isset($_GET['id'])) { // передача переменных в шаблон
    $id = $_GET['id'];
    if (isset($announcementsObgect[$id])) {
        $smarty->assign('announcements_show', $announcementsObgect[$id]);
        $smarty->assign('save', 'Сохранить изменения');
    }
}


//подключение таблиц городов и категорий

$location = translation_table_sity_in_array_location($bd);
$category = translation_table_category_in_array_category($bd);
//передача массивов в шаблон
$smarty->assign('Location', basename($_SERVER['PHP_SELF']));
$smarty->assign('location', $location);
$smarty->assign('category', $category);
$smarty->assign('announcements', $announcementsObgect);
//$smarty->assign('writer', $writer1);


$smarty->display('index.tpl');
$smarty->display('table.tpl');





