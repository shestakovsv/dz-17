<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');

function User_serialize($User) {
    $User_serialize = serialize($User);
    if (!file_put_contents('./User.txt', $User_serialize)) {
        exit('Ошибка записи файла');
    }
}
?>
<form  method="post">
    <label>  Server name:<br>
        <input type="text" maxlength="40"  value="" name="server_name">
    </label><br><br>
    <label>  User name:<br>
        <input type="text" maxlength="40"  value="" name="user_name">
    </label><br><br>
    <label>  Password:<br>
        <input type="text" maxlength="40"  value="" name="password">
    </label><br><br>
    <label>  Database:<br>
        <input type="text" maxlength="40"  value="" name="database">
    </label><br><br>



    <input type="submit"   value="Instal" name="instal">
</form>



<?php
if (isset($_POST['instal'])) {
    $bd = @mysqli_connect($_POST['server_name'], $_POST['user_name'], $_POST['password'], $_POST['database']) or die('неправильно заданы сервер,юзер или пароль');
    $sql = file_get_contents("advertisements(3).sql");
    $res = mysqli_multi_query($bd, $sql) or die("Invalid query: " . mysql_error());



    $User['server_name'] = $_POST['server_name'];
    $User['user_name'] = $_POST['user_name'];
    $User['password'] = $_POST['password'];
    $User['database'] = $_POST['database'];
    User_serialize($User);


    echo 'подключение к базе данных ' . $_POST['database'] . ' успешно выполненно<br>';
    ?><a href="index.php">перейти на сайт</a><?php
}