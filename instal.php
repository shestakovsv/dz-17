<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');
//$Location = basename($_SERVER['PHP_SELF']);

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
    $bd = @mysql_connect($_POST['server_name'], $_POST['user_name'], $_POST['password']) or die('неправильно заданы сервер,юзер или пароль');
    echo 'подключение к серверу ' . $_POST['server_name'] . ' успешно выполненно<br>';
    mysql_select_db($_POST['database']) or die('указанная база данных недоступна');
    mysql_query('SET NAMES utf8');
    echo 'подключение к базе данных ' . $_POST['database'] . ' успешно выполненно<br>';
    ?><a href="index.php">перейти на сайт</a><?php
}