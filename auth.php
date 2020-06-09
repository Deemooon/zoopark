<?php
require_once 'autoload.php';
session_start();
$message = 'Войдите для просмотра списка рабочих и животных';
if (isset($_SESSION['role'])) {
    header('Location: index.php');
    exit;
} elseif (isset($_POST['login']) &&
    isset($_POST['password'])) {
    $login = Helper::clearString($_POST['login']);
    $password = Helper::clearString($_POST['password']);
    $personalMap = new PersonalMap();
    $personal = $personalMap->auth($login, $password);
    if ($personal) {
        $_SESSION['id'] = $personal->user_id;
        $_SESSION['role'] = $personal->sys_name;
        $_SESSION['roleName'] = $personal->name;
        $_SESSION['fio'] = $personal->fio;
        header('Location: index.php');
        exit;
    } else {
        $message = '<span style="color:red;">Некорректен
логин или пароль</span>';
    }
}
require_once 'template/login.php';