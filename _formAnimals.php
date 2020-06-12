<?php
$animalsMap = new AnimalsMap();
$animals = $animalsMap->findById($id);
?>
    <div class="form-group">
        <label>Имя животного</label>
        <input type="text" class="form-control"
               name="firstname" required="required" value="<?=$animals->firstname;?>">
    </div>
    <div class="form-group">
        <label>Дата рождения</label>
        <input type="date" class="form-control"
               name="date_birth" value="<?=$animals->date_birth;?>">
    </div>
    <div class="form-group">
        <label>Пол</label>
        <select class="form-control" name="gender_id">
            <?= Helper::printSelectOptions($animals->gender_id, $animalsMap->arrGenders());?>
        </select>
    </div>
    <div class="form-group">
        <label>Место обитания</label>
        <select class="form-control" name="habiat_id">
            <?= Helper::printSelectOptions($animals->habiat_id, $animalsMap->arrHabiat());?>
        </select>
    </div>
    <div class="form-group">
        <label>Рацион животного</label>
        <select class="form-control" name="racion_animals_id">
            <?= Helper::printSelectOptions($animals->racion_animals_id, $animalsMap->arrRacion());?>
        </select>
    </div>
    <div class="form-group">
        <label>Ветеринар</label>
        <select class="form-control" name="id_vet">
            <?= Helper::printSelectOptions($animals->id_vet, $animalsMap->arrVet());?>
        </select>
    </div>
    <div class="form-group">
        <label>Смотрящий</label>
        <select class="form-control" name="id_smotr">
            <?= Helper::printSelectOptions($animals->id_smotr, $animalsMap->arrSmotr());?>
        </select>
    </div>
    <div class="form-group">
        <label>Дата старта</label>
        <input type="date" class="form-control"
               name="wintering_start" value="<?=$animals->wintering_start;?>">
    </div>
    <div class="form-group">
        <label>Дата конца</label>
        <input type="date" class="form-control"
               name="wintering_end" value="<?=$animals->wintering_end;?>">
    </div>
    <input type="hidden" name="animals_id" value="<?=$id;?>"/><?php
