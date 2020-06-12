<?php
require_once 'secure.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$p = (new PersonalMap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить').'пользователя';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-personal.php">Пользователи</a></li>

            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-personal.php" method="POST">
            <?php require_once '_formPersonal.php'; ?>
            <div class="form-group">
                <label>Роль</label>
                <select class="form-control" name="role_id">
                    <?= Helper::printSelectOptions($p->role_id, $pMap->arrRoles());?>
                </select>
            </div>
            <div class="form-group">
                <label>Супруг</label>
                <select class="form-control" name="married_id">
                    <?= Helper::printSelectOptions($p->married_id, $pMap->arrMarried());?>
                </select>
            </div>
            <div class="form-group">
                <label>Статус</label>
                <input type="text" class="form-control"name="married_name" required="required" value="<?=$p->married_name;?>">
            </div>
            <div class="form-group">
                <button type="submit" name="savePersonal"
                        class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>