<?php
require_once 'secure.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$mammalsMap = new MammalsMap();
$count = $mammalsMap->count();
$mammals = $mammalsMap->findAll($page*$size-$size, $size);
$header = 'Список млекопитающих';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Список млекопитающих</h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fafa-dashboard"></i> Главная</a></li>
                        <li class="active">Список
                            млекопитающих</li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-mammals.php">Добавить млекопитающих</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    if ($mammals) {
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
                            foreach ($mammals as $mammal) {
                                echo '<tr>';
                                echo '<td><a href="profile-mammals.php?id='.$mammal->animals_id.'">'.$mammal->fio.'</a> </td>';
                                echo '<td>'.$mammal->date_birth.'</td>';
                                echo '<td>'.$mammal->gender.'</td>';
                                echo '<td>'.$mammal->habiat.'</td>';
                                echo '<td>'.$mammal->origin.'</td>';
                                echo '<td>'.$mammal->name.'</td>';
                                echo '<td>'.$mammal->wintering_start.'</td>';
                                echo '<td>'.$mammal->wintering_end.'</td>';
                                echo '<td>'.$mammal->vet.'</td>';
                                echo '<td>'.$mammal->smotr.'</td>';



                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одного млекопитающего не найдено';
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