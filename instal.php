<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');

function User_serialize($user) {
    $user_serialize = serialize($user);
    if (!file_put_contents('./User.txt', $user_serialize)) {
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



    $user['server_name'] = $_POST['server_name'];
    $user['user_name'] = $_POST['user_name'];
    $user['password'] = $_POST['password'];
    $user['database'] = $_POST['database'];
    User_serialize($user);


    echo 'подключение к базе данных ' . $_POST['database'] . ' успешно выполненно<br>';
    ?><a href="index.php">перейти на сайт</a><?php
}