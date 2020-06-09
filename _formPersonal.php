<?php
require_once 'autoload.php';
$personalMap = new PersonalMap();
$personal = $personalMap->findById($id);
?>
<div class="form-group">
    <label>Фамилия</label>
    <input type="text" class="form-control"
           name="lastname" required="required" value="<?=$personal->lastname;?>">
</div>
<div class="form-group">
    <label>Имя</label>
    <input type="text" class="form-control"
           name="firstname" required="required" value="<?=$personal->firstname;?>">
</div>
<div class="form-group">
    <label>Отчество</label>
    <input type="text" class="form-control"
           name="patronymic" value="<?=$personal->patronymic;?>">
</div>
<div class="form-group">
    <label>Пол</label>
    <select class="form-control" name="gender_id">
        <?= Helper::printSelectOptions($personal->gender_id, $personalMap->arrGenders());?>
    </select>
</div>
<div class="form-group">
    <label>Дата рождения</label>
    <input type="date" class="form-control"
           name="date_birth" value="<?=$personal->date_birth;?>">
</div>
<div class="form-group">
    <label>Логин</label>
    <input type="text" class="form-control" name="login"
           required="required" value="<?=$personal->login;?>">
</div>
<div class="form-group">
    <label>Пароль</label>
    <input type="password" class="form-control"
           name="password" required="required">
</div>
<input type="hidden" name="user_id" value="<?=$id;?>"/>