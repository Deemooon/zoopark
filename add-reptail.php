<?php
require_once 'secure.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$reptail = (new ReptailMap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить').'
рептилию';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-mammals.php">Рептилии</a></li>

            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-animals.php" method="POST">
            <?php require_once '_formAnimals.php'; ?>
            <div class="form-group">
                <label>Вид</label>
                <input type="text" class="form-control"name="origin" required="required" value="<?=$reptail->origin;?>">
            </div>
            <div class="form-group">
                <label>Порода</label>
                <input type="text" class="form-control"name="name" required="required" value="<?=$reptail->name;?>">
            </div>
            <div class="form-group">
                <button type="submit" name="saveReptail"
                        class="btn btn-primary">Сохранить</button>
            </div>

        </form>
    </div>
<?php
require_once 'template/footer.php';
?>