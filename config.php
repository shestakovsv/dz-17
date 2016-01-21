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
include 'RepositoryAds.php';

include 'Advertisement.php';
include 'AdvCompany.php';
include 'AdvPrivate.php';
//include 'AdvPrivate.php';
//include 'AdvertisementFactory.php';
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
