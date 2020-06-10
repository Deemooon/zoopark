<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
} else {
    header('Location: 404.php');
}
$header = 'Профиль студента';
$p = (new PersonalMap())->findProfileById($id);
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Профиль пользователя</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fafa-dashboard"></i> Главная</a></li>

                        <li><a href="list-personal.php">Пользователи</a></li>

                        <li class="active">Профиль</li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-personal.php?id=<?=$id;?>">Изменить</a>

                </div>
                <div class="box-body">

                    <table class="table table-bordered table-hover">

                        <?php require_once '_profile.php';?>

                        <tr>

                            <th>Телефонный номер</th>

                            <td><?=$p->phone_number;?></td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>