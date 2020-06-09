<?php
require_once 'secure.php';
if (isset($_POST['racion_type_id'])) {
    $type = new Raciontype();
    $type->racion_type_id = Helper::clearInt($_POST['racion_type_id']);
    $type->name = Helper::clearString($_POST['name']);
    if ((new RaciontypeMap())->save($type)) {
        header('Location: view-type.php?id='.$type->racion_type_id);
    } else {
        if ($type->racion_type_id) {

            header('Location: add-type.php?id='.$type->racion_type_id);

        } else {
            header('Location: add-type.php');
        }
    }
}
