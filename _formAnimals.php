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
    <input type="hidden" name="animals_id" value="<?=$id;?>"/><?php
