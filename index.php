<?php
if (!$_SESSION['sid']) {
    session_start();
}
var_dump($_SESSION);
/**
 * Registering autoload to classes and creating basic objects like DB and USER
 */

spl_autoload_register(function ($class) {
    include 'libs/' . $class . '.php';
});

$user_obj = new user();
$db_obj = new ezSQL_mysql();
$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
Render::route($page);


?>