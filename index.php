
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');

// проводим настройки смарти
$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root . '/smarty/';

//подключение библиотеки DBsimple
require_once $project_root . "/dbsimple/config.php";
require_once "DbSimple/Generic.php";



//require_once ($project_root.'/FirePHPCore/FirePHP.class.php');
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
        ?><a href="instal.php">Проверьте введенные данные</a><?php
        exit('Ошибка чтения файла'); // или другое действие при неудачном чтении файла
        //header("Location: instal.php");
    }
} else {
    ?><a href="instal.php">Проверьте введенные данные</a><?php
    exit('Ошибка чтения файла');
}


//подключение к серверу SQL
//$bd = @mysqli_connect($User['server_name'], $User['user_name'], $User['password'], $User['database']) or die('<a href="instal.php">проверьте введеные данные</a> - Сервер недоступен');
//$bd = DbSimple_Generic::connect("mysqli://$User[user_name]:$User[password]@$User[server_name]/$User[database]");
$bd = DbSimple_Generic::connect('mysqli://test1:123@127.0.01/advertisements');

//var_dump($bd);
// Устанавливаем обработчик ошибок.
$bd->setErrorHandler('databaseErrorHandler');

// Код обработчика ошибок SQL.
function databaseErrorHandler($message, $info) {
    // Если использовалась @, ничего не делать.
    if (!error_reporting())
        return;
    // Выводим подробную информацию об ошибке.
    echo "SQL Error: $message<br><pre>";
    print_r($info);
    echo "</pre>";
    exit();
}

//mysqli_query($bd, 'SET NAMES utf8');
$bd->query('SET NAMES utf8');


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




if ($_GET == TRUE) { //варианты действий при получении данных в GET
    if (isset($_GET['id_del'])) { //удаление объявления id из БД с ID = $id_del
        $id_del = $_GET['id_del'];
        sql_DELETE($bd, $id_del);
        header("Location: $Location");
        exit;
    }
    if (isset($_GET['id'])) { // передача переменных в шаблон
        $id_key = $_GET['id'];
        $smarty->assign('id_key', $id_key);
        $smarty->assign('save', 'Сохранить изменения');
        //$Announcements = translation_table_form_in_array_Announcements($bd);
    }
}




//подключение таблиц городов и категорий

$location = translation_table_sity_in_array_location($bd);
$category = translation_table_category_in_array_category($bd);
$Announcements = translation_table_form_in_array_Announcements($bd); //подключение таблицы заполненных форм
//передача массивов в шаблон
$smarty->assign('Location', basename($_SERVER['PHP_SELF']));
$smarty->assign('location', $location);
$smarty->assign('category', $category);
$smarty->assign('Announcements', $Announcements);


$smarty->display('index.tpl');


