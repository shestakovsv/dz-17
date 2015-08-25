
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');


$bd = mysql_connect('localhost', "test1", "123") or die('Сервер недоступен');
echo 'подключение к серверу успешно <br>';

mysql_select_db('advertisements') or die('база данных недоступна');
mysql_query('SET NAMES utf8');
echo 'подключение к базе данных успешно';

$fofm = mysql_query('select * from form');
//print_r($fofm);
$Location = basename($_SERVER['PHP_SELF']);





while ($abc = mysql_fetch_assoc($fofm)) {
    // print_r($abc);    
    $Announcements["$abc[id]"] = $abc;
    //var_dump($Announcements);
}

//$abc = mysql_fetch_assoc($fofm);
//print_r($abc);

if (isset($_POST['main_form_submit'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        //$Announcements[$id] = $_POST;
        $insert_sql = "INSERT INTO `form` (`id`,`private`, `manager`, `email`, `seller_name`, `phone`, `location`, `category`, `title`, `description`, `price`)
            VALUES ('$id','$_POST[private]', '$_POST[manager]', '$_POST[email]', '$_POST[seller_name]',"
                . " '$_POST[phone]', '$_POST[location_id]', '$_POST[category_id]',"
                . " '$_POST[title]', '$_POST[description]', '$_POST[price]')";
        mysql_query($insert_sql);
        $_GET['id'] = "";
        unset($_GET['id']);
    } else {

        $insert_sql = "INSERT INTO `form` (`private`, `manager`, `email`, `seller_name`, `phone`, `location`, `category`, `title`, `description`, `price`)
            VALUES ('$_POST[private]', '$_POST[manager]', '$_POST[email]', '$_POST[seller_name]',"
                . " '$_POST[phone]', '$_POST[location_id]', '$_POST[category_id]',"
                . " '$_POST[title]', '$_POST[description]', '$_POST[price]')";
        mysql_query($insert_sql);



        //$Announcements[] = $_POST;
    }
    //rewriting_cookies($Announcements);
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
        mysql_query('DELETE FROM `form`WHERE ((`id` = ' . $id_del . '))');

        //DELETE FROM `form`WHERE ((`id` = '2'));
        //rewriting_cookies($Announcements);
        unset($id_del);
        $id_key = "";
        header("Location: $Location");
        exit;
    }
} else {
    $id_key = ""; // пока нет данных выводим пустую форму
}

echo '$id_key=' . $id_key;

if (!isset($id_key)) {
    $seller_name = "";
    $email = "";
    $phone = "";
    $location_id = "Выберите Ваш город";
    $category_id = "Выберите категорию";
    $title = "Название объявления";
    $description = "";
    $price = "0";
} else {
    $seller_name = $Announcements[$id_key]['seller_name'];
    $email = $Announcements[$id_key]['email'];
    $phone = $Announcements[$id_key]['phone'];
    $location_id = $Announcements[$id_key]['location_id'];
    $category_id = $Announcements[$id_key]['category_id'];
    $title = $Announcements[$id_key]['title'];
    $description = $Announcements[$id_key]['description'];
    $price = $Announcements[$id_key]['price'];
}
?>
<form  method="post">
    <br>
    <label><input type = "radio" checked = "" value = "1" name = "private">Частное лицо</label>
    <label><input type = "radio"   value = "0" name = "private">Компания</label><br>
    <label>Контактное лицо</label> <input type="text" maxlength="40" value="" name="manager"> <br>
    <label>Ваше имя<input type="text" maxlength="40"  value="<?php echo $seller_name; ?>" name="seller_name"></label><br>     
    <label>Электронная почта <input type="text" value="<?php echo $email; ?>" name="email"></label><br>
    <label>Номер телефона <input type="text" value="<?php echo $phone; ?>" name="phone"></label><br>
    <label>Город
        <select title="Выберите Ваш город"  name="location_id">
            <option value="<?php echo $location_id; ?>">-- <?php echo $location_id; ?> --</option>
            <option >-- Города --</option>
            <option  value="Новосибирск">Новосибирск</option>   
            <option  value="Барабинск">Барабинск</option>   
            <option  value="Бердск">Бердск</option>   
            <option  value="Искитим">Искитим</option>   
            <option  value="Колывань">Колывань</option>
            <option id="select-region" value="0">Выбрать другой...</option> </select> 
    </label> <br>
    <label>Категория 
        <select title="Выберите категорию объявления"  name="category_id" > 
            <option value="<?php echo $category_id; ?>">-- <?php echo $category_id; ?> --</option>
            <optgroup label="Транспорт">
                <option value="Автомобили с пробегом">Автомобили с пробегом</option>
                <option value="Новые автомобили">Новые автомобили</option>
                <option value="Мотоциклы и мототехника">Мотоциклы и мототехника</option>
                <option value="Грузовики и спецтехника">Грузовики и спецтехника</option>
                <option value="Водный транспорт">Водный транспорт</option>
                <option value="Запчасти и аксессуары">Запчасти и аксессуары</option>
            </optgroup></select>
    </label><br>
    <label>Название объявления <input type="text" maxlength="50" value="<?php echo $title; ?>" name="title"></label><br>
    <label>Описание объявления</label><input type="text" maxlength="3000" value="<?php echo $description; ?>" name="description"><br>
    <label>Цена<input type="text" maxlength="9" value="<?php echo $price; ?>" name="price"><span>руб.</span></label><br><br>
    <input type="submit" value="Сохранить изменения"  name="main_form_submit" class="vas-submit-input" > 
</form>
<br><br>

<?php
if (!empty($Announcements)) {
    foreach ($Announcements as $id => $value) {
        ?>
        <a href="<?php echo $Location; ?>?id=<?php echo $id; ?>"><?php echo $Announcements[$id]['title']; ?></a>
        <?php
        echo '|  Цена:' . $Announcements[$id]['price'] . ' руб.  |';
        echo $Announcements[$id]['seller_name'] . '  |';
        ?>
        <a href="<?php echo $Location; ?>?id_del=<?php echo $id; ?>">Удалить</a>        
        <?php
        echo "<br>";
    }
}
