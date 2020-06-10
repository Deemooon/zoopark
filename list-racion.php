<?php
require_once 'secure.php';
$size = 4;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$racionanimalMap = new RacionanimalsMap();
$count = $racionanimalMap->count();
$racionanimals = $racionanimalMap->findAll($page*$size-$size, $size);
$header = 'Список рационов';
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
                    <?php
                    if ($racionanimals) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Специальность</th>
                                <th>Дата образования</th>
                                <th>Дата окончания</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($racionanimals as $racionanimal) {
                                echo '<tr>';

                                echo '<td><a href="view-racion.php?id='.$racionanimal->racion_animals_id.'">'.$racionanimal->name.'</a> '

                                    . '<a href="add-racion.php?id='.$racionanimal->racion_animals_id.'"><i class="fa fa-pencil"></i></a></td>';

                                echo '<td>'.$racionanimal->animals.'</td>';
                                echo '<td>'.$racionanimal->racion_type.'</td>';
                                echo '<td>'.$racionanimal->list_product.'</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одной группы не найдено';
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