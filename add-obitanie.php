<?php
require_once 'secure.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$habiat = (new ObitanyeMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' зону обитания животных';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="list-obitanie.php">Зоны</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-obitanie.php" method="POST">
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control"name="name" required="required" value="<?=$habiat->name;?>">
            </div>
            <div class="form-group">
                <label>Информация</label>
                <input type="text" class="form-control"name="info" required="required" value="<?=$habiat->info;?>">
            </div>
            <div class="form-group">
                <button type="submit" name="saveObitanie" class="btn btn-primary">Сохранить</button>
            </div>
            <input type="hidden" name="habiat_id"
                   value="<?=$id;?>"/>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>