<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $racionanimal = (new RacionanimalsMap())->findViewById($id);
    $header = 'Просмотр группы';
    require_once 'template/header.php';
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?=$header;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fafa-dashboard"></i> Главная</a></li>

                        <li><a href="list-racion.php">Группы</a></li>

                        <li class="active"><?=$header;?></li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-racion.php?id=<?=$id;?>">Изменить</a>

                </div>
                <div class="box-body">

                    <table class="table table-bordered table-hover">

                        <tr>
                            <th>Название</th>

                            <td><?=$racionanimal->name;?></td>

                        </tr>
                        <tr>

                            <th>Имя животного</th>

                            <td><?=$racionanimal->firstname;?></td>

                        </tr>
                        <tr>

                            <th>Лист продуктов</th>
                            <td><?=$racionanimal->list_product;?></td>
                        </tr>
                        <tr>

                            <th>Тип рациона</th>
                            <td><?=$racionanimal->racion_type;?></td>
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