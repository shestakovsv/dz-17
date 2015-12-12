<?php

include 'config.php';


if (isset($_GET['id_del'])) { //удаление объявления id из БД с ID = $id_del
    $id_del = $_GET['id_del'];
//    $bd = DbSimple_Generic::connect("mysqli://$user[user_name]:$user[password]@$user[server_name]/$user[database]");
//    $bd->select('DELETE FROM form WHERE id = ?', $id_del);
   
    Advertisement::sql_DELETE($bd, $id_del);
    echo 'объявление удалено';
}
