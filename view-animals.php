<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $animals = (new AnimalsMap())->findViewById($id);
    $header = 'Просмотр профиля';
    require_once 'template/header.php';
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?=$header;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fafa-dashboard"></i> Главная</a></li>

                        <li><a href="list-obitanie.php">Профиль Животного</a></li>

                        <li class="active"><?=$header;?></li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-animals.php?id=<?=$id;?>">Изменить</a>

                </div>
                <div class="box-body">

                    <table class="table table-bordered table-hover">

                        <tr>
                            <th>Имя </th>
                            <td><?=$animals->firstname;?></td>
                        </tr>
                        <tr>
                            <th>Дата рождения</th>
                            <td><?=date("d.m.Y",
                                    strtotime($animals->date_birth));?></td>
                        </tr>
                        <tr>
                            <th>Пол</th>
                            <td><?=$animals->gender;?></td>
                        </tr>
                        <tr>
                            <th>Зона обитания</th>
                            <td><?=$animals->habiat;?></td>
                        </tr>
                        <tr>
                            <th>Ветеринар</th>
                            <td><?=$animals->vet;?></td>
                        </tr>
                        <tr>
                            <th>Смотрящий</th>
                            <td><?=$animals->smotr;?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
require_once 'template/footer.php';
?>