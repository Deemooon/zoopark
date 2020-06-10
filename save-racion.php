<?php
require_once 'secure.php';
if (isset($_POST['racion_animals_id'])) {
    $racion = new Racionanimals();
    $racion->racion_animals_id = Helper::clearInt($_POST['racion_animals_id']);
    $racion->animals_id = Helper::clearInt($_POST['animals_id']);
    $racion->list_product = Helper::clearString($_POST['list_product']);
    $racion->racion_type_id = Helper::clearInt($_POST['racion_type_id']);
    $racion->name = Helper::clearString($_POST['name']);
    if ((new RacionanimalsMap())->save($racion)) {
        header('Location: view-racion.php?id='.$racion->racion_animals_id);
    } else {
        if ($racion->racion_animals_id) {

            header('Location: add-racion.php?id='.$racion->racion_animals_id);

        } else {
            header('Location: add-racion.php');
        }
    }
}