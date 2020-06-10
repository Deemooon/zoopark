<?php
require_once 'secure.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$animalsMap = new AnimalsMap();
$count = $animalsMap->count();
$animals = $animalsMap->findAll($page*$size-$size, $size);
$header = 'Список животных';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Список животного</h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fafa-dashboard"></i> Главная</a></li>
                        <li class="active">Список
                            животных</li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-animals.php">Добавить животное</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    if ($animals) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Имя животного</th>
                                <th>Дата рождения</th>
                                <th>Пол</th>
                                <th>Зона обитания</th>
                                <th>Рацион животного</th>
                                <th>Имя Ветеринара</th>
                                <th>Имя Смотрящего</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($animals as $animal) {
                                echo '<tr>';
                                echo '<td><a href="view-animals.php?id='.$animal->animals_id.'">'.$animal->firstname.'</a> '

                                    . '<a href="add-animals.php?id='.$animal->animals_id.'"><i class="fa fa-pencil"></i></a></td>';
                                echo '<td>'.$animal->date_birth.'</td>';
                                echo '<td>'.$animal->gender.'</td>';
                                echo '<td>'.$animal->habiat.'</td>';
                                echo '<td>'.$animal->racion_animals.'</td>';
                                echo '<td>'.$animal->vet.'</td>';
                                echo '<td>'.$animal->smotr.'</td>';
                                echo '</tr>';

                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одного пользователя не найдено';
                    } ?>
                </div>
                <div class="box-body">
                    <?php Helper::paginator($count, $page,
                        $size); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>