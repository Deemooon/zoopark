<?php
$animals = (new AnimalsMap())->findProfileById($id);
if ($animals) {
    ?>
    <tr>
        <th>Имя</th>
        <td><?=$animals->fio;?></td>
    </tr>
    <tr>
        <th>Пол</th>
        <td><?=$animals->gender;?></td>
    </tr>
    <tr>
        <th>Дата рождения</th>
        <td><?=date("d.m.Y", strtotime($animals->date_birth));?></td>
    </tr>
    <tr>
        <th>Зона обитания</th>
        <td><?=$animals->habiat;?></td>
    </tr>
    <tr>
        <th>Ветеринар</th>
        <td><?=$animals->vet;?></td>
    </tr>
    <tr>
        <th>Смотрящий</th>
        <td><?=$animals->smotr;?></td>
    </tr>
    <tr>
        <th>Начало</th>
        <td><?=date("d.m.Y", strtotime($animals->wintering_start));?></td>
    </tr>
    <tr>
        <th>Конец</th>
        <td><?=date("d.m.Y", strtotime($animals->wintering_end));?></td>
    </tr>
<?php } ?>