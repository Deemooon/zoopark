<?php
$pMap = new PersonalMap();
$p = $pMap->findById($id);
?>
<div class="form-group">
    <label>Фамилия</label>
    <input type="text" class="form-control"
           name="lastname" required="required" value="<?=$p->lastname;?>">
</div>
<div class="form-group">
    <label>Имя</label>
    <input type="text" class="form-control"
           name="firstname" required="required" value="<?=$p->firstname;?>">
</div>
<div class="form-group">
    <label>Отчество</label>
    <input type="text" class="form-control"
           name="patronymic" value="<?=$p->patronymic;?>">
</div>
<div class="form-group">
    <label>Дата рождения</label>
    <input type="date" class="form-control"
           name="date_birth" value="<?=$p->date_birth;?>">
</div>
<div class="form-group">
    <label>Пол</label>
    <select class="form-control" name="gender_id">
        <?= Helper::printSelectOptions($p->gender_id, $pMap->arrGenders());?>
    </select>
</div>
<div class="form-group">
    <label>Номер телефона</label>
    <input type="text" class="form-control" name="phone_number"
           required="required" value="<?=$p->phone_number;?>">
</div>

<div class="form-group">
    <label>Логин</label>
    <input type="text" class="form-control" name="login"
           required="required" value="<?=$p->login;?>">
</div>

<div class="form-group">
    <label>Пароль</label>
    <input type="password" class="form-control"
           name="password" required="required">
</div>
<input type="hidden" name="user_id" value="<?=$id;?>"/>