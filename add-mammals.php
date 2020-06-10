<?php
require_once 'secure.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$mm = (new MammalsMap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить').'
млекопитающее';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-mammals.php">Студенты</a></li>

            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-animals.php" method="POST">
            <?php require_once '_formAnimals.php'; ?>
            <div class="form-group">
                <label>Origin</label>
                <input type="text" class="form-control"name="origin" required="required" value="<?=$mm->origin;?>">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control"name="name" required="required" value="<?=$mm->name;?>">
            </div>
            <div class="form-group">
                <button type="submit" name="saveMammals"
                        class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>