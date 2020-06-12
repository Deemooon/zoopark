<?php
require_once 'secure.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$reptailMap = new ReptailMap();
$count = $reptailMap->count();
$reptails = $reptailMap->findAll($page*$size-$size, $size);
$header = 'Список рептилий';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Список рептилий</h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fafa-dashboard"></i> Главная</a></li>
                        <li class="active">Список
                            рептилий</li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-reptail.php">Добавить рептилию</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    if ($reptails) {
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
                            foreach ($reptails as $reptail) {
                                echo '<tr>';
                                echo '<td><a href="profile-reptail.php?id='.$reptail->animals_id.'">'.$reptail->fio.'</a> </td>';
                                echo '<td>'.$reptail->date_birth.'</td>';
                                echo '<td>'.$reptail->gender.'</td>';
                                echo '<td>'.$reptail->habiat.'</td>';
                                echo '<td>'.$reptail->origin.'</td>';
                                echo '<td>'.$reptail->name.'</td>';
                                echo '<td>'.$reptail->wintering_start.'</td>';
                                echo '<td>'.$reptail->wintering_end.'</td>';
                                echo '<td>'.$reptail->vet.'</td>';
                                echo '<td>'.$reptail->smotr.'</td>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одной рептилии не найдено';
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