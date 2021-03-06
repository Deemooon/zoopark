<?php
require_once 'secure.php';
$size = 4;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$typeMap = new RaciontypeMap();
$count = $typeMap->count();
$types = $typeMap->findAll($page*$size-$size, $size);
$header = 'Список типов рационов';
require_once 'template/header.php';?>
    <div class="row">

        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?=$header;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                        <li class="active"><?=$header;?></li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-type.php">Добавить </a>

                </div>
                <div class="box-body">
                    <?php
                    if ($types) {
                        ?>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Наименование</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($types as $type) {
                                echo '<tr>';
                                echo '<td>'.$type->name.'</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одного типа рационов не найдено';
                    } ?>
                </div>
                <div class="box-body">
                    <?php Helper::paginator($count, $page,$size); ?>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>