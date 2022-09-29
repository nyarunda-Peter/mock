<?php
session_start();
define('__ROOT__', dirname(__FILE__));
if(!empty($_SESSION["userId"])) {
    
    require_once(__ROOT__.'\view\dashboard.php');
    // require_once './view/dashboard.php';
} else {
    require_once(__ROOT__.'\view\login-form.php');
    // require_once './view/login-form.php';
}
?>
<!-- define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/config.php');
D:\xamp\htdocs\user_login_session\user_login_session\view\login-form.php -->