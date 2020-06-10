<?php
require_once 'secure.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$pMap = new PersonalMap();
$count = $pMap->count();
$ps = $pMap->findAll($page*$size-$size, $size);
$header = 'Список пользователей';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Список пользователей</h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fafa-dashboard"></i> Главная</a></li>
                        <li class="active">Список
                            пользователей</li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-personal.php">Добавить пользователя</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    if ($ps) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Ф.И.О</th>
                                <th>Пол</th>
                                <th>Дата рождения</th>
                                <th>Номер телефона</th>
                                <th>Роль</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($ps as $p) {
                                echo '<tr>';
                                echo '<td><a href="profile-personal.php?id='.$p->user_id.'">'.$p->fio.'</a> '

                                    . '<a href="add-personal.php?id='.$p->user_id.'"><i class="fa fa-pencil"></i></a></td>';

                                echo '<td>'.$p->gender.'</td>';

                                echo '<td>'.$p->date_birth.'</td>';
                                echo '<td>'.$p->phone_number.'</td>';
                                echo '<td>'.$p->role.'</td>';


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