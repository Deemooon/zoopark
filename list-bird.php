<?php
require_once 'secure.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$birdMap = new BirdMap();
$count = $birdMap->count();
$birds = $birdMap->findAll($page*$size-$size, $size);
$header = 'Список птиц';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Список студентов</h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fafa-dashboard"></i> Главная</a></li>
                        <li class="active">Список
                            птиц</li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-mammals.php">Добавить птицу</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    if ($birds) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Дата рождения</th>
                                <th>Пол</th>
                                <th>Зона обитания</th>
                                <th>Порода</th>
                                <th>Вид животного</th>
                                <th>Дата начала зимовки</th>
                                <th>Дата конца зимовки</th>
                                <th>Имя Ветеринара</th>
                                <th>Имя Смотрящего</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($birds as $bird) {
                                echo '<tr>';
                                echo '<td><a href="profile-bird.php?id='.$bird->animals_id.'">'.$bird->fio.'</a> </td>';
                                echo '<td>'.$bird->date_birth.'</td>';
                                echo '<td>'.$bird->gender.'</td>';
                                echo '<td>'.$bird->habiat.'</td>';
                                echo '<td>'.$bird->origin.'</td>';
                                echo '<td>'.$bird->name.'</td>';
                                echo '<td>'.$bird->wintering_start.'</td>';
                                echo '<td>'.$bird->wintering_end.'</td>';
                                echo '<td>'.$bird->vet.'</td>';
                                echo '<td>'.$bird->smotr.'</td>';



                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одной птицы не найдено';
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