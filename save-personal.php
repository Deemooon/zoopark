<?php
require_once 'secure.php';
if (isset($_POST['user_id'])) {
    $p = new Personal();
    $p->lastname = Helper::clearString($_POST['lastname']);
    $p->user_id= Helper::clearInt($_POST['user_id']);
    $p->firstname = Helper::clearString($_POST['firstname']);
    $p->patronymic = Helper::clearString($_POST['patronymic']);
    $p->date_birth = Helper::clearString($_POST['date_birth']);
    $p->phone_number = Helper::clearString($_POST['phone_number']);
    $p->login = Helper::clearString($_POST['login']);
    $p->pass = password_hash(Helper::clearString($_POST['password']),PASSWORD_BCRYPT);
    $p->gender_id = Helper::clearInt($_POST['gender_id']);
    $p->role_id = Helper::clearInt($_POST['role_id']);
    $p->married_id = Helper::clearInt($_POST['married_id']);
    $p->married_name = Helper::clearString($_POST['married_name']);

    if ((new PersonalMap())->save($p)) {
        header('Location: profile-personal.php?id='.$p->user_id);
    } else {
        if ($p->user_id) {

            header('Location: add-personal.php?id='.$p->user_id);

        } else {
            header('Location: add-personal.php');
        }
    }
}