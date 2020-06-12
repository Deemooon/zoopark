<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
} else {
    header('Location: 404.php');
}
$header = 'Профиль млекопитающих';
$mm = (new MammalsMap())->findProfileById($id);
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Профиль птицы</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fafa-dashboard"></i> Главная</a></li>

                        <li><a href="list-bird.php">Птицы</a></li>

                        <li class="active">Профиль</li>
                    </ol>
                </section>
                <div class="box-body">

                    <table class="table table-bordered table-
hover">

                        <?php require_once '_profileanimals.php';?>

                        <tr>

                            <th>Порода</th>

                            <td><?=$mm->origin;?></td>

                        </tr>
                        <tr>

                            <th>Вид</th>

                            <td><?=$mm->name;?></td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>