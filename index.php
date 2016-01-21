
<?php

include 'config.php';

//if (!$_POST == NULL) {
//    print_r($_POST);
//    var_dump($_POST);
//    exit;
//}
//добавленых объявления в массив
if (!$_POST == NULL) {
    $postDate = ($_POST);

    if (empty($postDate["allow_mails"])) {
        $postDate["allow_mails"] = 0;
    }
//        unset($postDate["main_form_submit"]);
    if ($postDate['private'] == 0) {
        $adv = new AdvertisementCompany($postDate);
    } else {
        $adv = new AdvertisementPrivate($postDate);
    }
    $adv->save($bd, $adv);
    $id = $bd->select('SELECT `id` FROM `form` ORDER BY `id` DESC LIMIT 1');
//    var_dump($id);
    $smarty->assign('id_tr', $id);
    $smarty->assign('announcements_tr', $adv);
    $output1 = $smarty->fetch("tr.tpl");
    echo $output1;
//    $smarty->display('tr.tpl');
    exit;
}


//варианты действий при получении данных в GET
if (isset($_GET['id_del'])) { //удаление объявления id из БД с ID = $id_del
    $id_del = $_GET['id_del'];
    Advertisement::sql_DELETE($bd, $id_del);
    echo json_encode(['msg' => 'ok']);
    exit;
}


//подключение таблицы заполненных форм
objectCreation($bd);

$repository = RepositoryAds::getinstance(); //подключение к хранилищу
$announcementsObgect = $repository->repositoryGet(); //извлечение массива с объектами объявлений из хранилища
//var_dump($announcementsObgect);
//echo $announcementsObgect;
//var_dump($repository);
//if ($announcementsObgect)





//подключение таблиц городов и категорий

$location = translation_table_sity_in_array_location($bd);
$category = translation_table_category_in_array_category($bd);
//передача массивов в шаблон
$smarty->assign('Location', basename($_SERVER['PHP_SELF']));
$smarty->assign('location', $location);
$smarty->assign('category', $category);
//$smarty->assign('announcements', $announcementsObgect);

if (isset($_GET['id'])) { // передача переменных в шаблон
    $id = $_GET['id'];
    if (isset($announcementsObgect[$id])) {
        $smarty->assign('announcements_show', $announcementsObgect[$id]);
        $smarty->assign('save', 'Сохранить изменения');
    }
    $output2 = $smarty->fetch("index.tpl");
    echo $output2;
    exit;
}

$smarty->assign('announcements', $announcementsObgect);

if (!empty($announcementsObgect)) {
    $smarty->display('table.tpl');
}

//$smarty->display('table.tpl');
//$smarty->display('index.tpl');


$output = $smarty->fetch("index.tpl");

// здесь выполняем какие-либо действия с $output

echo $output;



