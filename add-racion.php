<?php
require_once 'secure.php';

$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$racion = (new RacionanimalsMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' группу';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-racion.php">Рационы</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-racion.php" method="POST">
            <div class="form-group">
                <label>Имя животного</label>
                <select class="form-control" name="animals_id">
                    <?= Helper::printSelectOptions($racion->animals_id, (new AnimalsMap())->arrAnimals());?>
                </select>
            </div>
            <div class="form-group">
                <label>Лист продуктов</label>
                <input type="name" class="form-control" name="list_product" required="required" value="<?=$racion->list_product;?>">
            </div>
            <div class="form-group">
                <label>Тип рациона</label>
                <select class="form-control" name="racion_type_id">
                    <?= Helper::printSelectOptions($racion->racion_type_id, (new RaciontypeMap())->arrRacion());?>
                </select>
            </div>
            <div class="form-group">
                <label>Название рациона</label>
                <input type="text" class="form-control"name="name" required="required" value="<?=$racion->name;?>">
            </div>



            <div class="form-group">
                <button type="submit" name="saveRacion" class="btn btn-primary">Сохранить</button>
            </div>
            <input type="hidden" name="racion_animals_id"
                   value="<?=$id;?>"/>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>