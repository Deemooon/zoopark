<?php
$p = (new PersonalMap())->findProfileById($id);
if ($p) {
    ?>
    <tr>
        <th>Ф.И.О.</th>
        <td><?=$p->fio;?></td>
    </tr>
    <tr>
        <th>Пол</th>
        <td><?=$p->gender;?></td>
    </tr>
    <tr>
        <th>Дата рождения</th>
        <td><?=date("d.m.Y", strtotime($p->date_birth));?></td>
    </tr>
    <tr>
        <th>Логин</th>
        <td><?=$p->login;?></td>
    </tr>
    <tr>
        <th>Пароль</th>
        <td><?=$p->pass;?></td>
    </tr>
    <tr>
        <th>Роль</th>
        <td><?=$p->role;?></td>
    </tr>

<?php } ?>