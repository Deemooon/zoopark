<?php
require_once 'secure.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$animals = (new AnimalsMap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить').'
животное';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-animals.php">Животные</a></li>

            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-animals.php" method="POST">
            <?php require_once '_formAnimals.php'; ?>
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
                <button type="submit" name="saveAnimals"
                        class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>