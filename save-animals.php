<?php
require_once 'secure.php';
if (isset($_POST['animals_id'])) {
    $animals = new Animals();
    $animals->animals_id= Helper::clearInt($_POST['user_id']);
    $animals->firstname = Helper::clearString($_POST['firstname']);
    $animals->date_birth = Helper::clearString($_POST['date_birth']);
    $animals->gender_id= Helper::clearInt($_POST['gender_id']);
    $animals->habiat_id= Helper::clearInt($_POST['habiat_id']);
    $animals->racion_animals_id= Helper::clearInt($_POST['racion_animals_id']);
    $animals->id_vet= Helper::clearInt($_POST['id_vet']);
    $animals->id_smotr= Helper::clearInt($_POST['id_smotr']);
    if ((new AnimalsMap())->save($animals)) {
        header('Location: view-animals.php?id='.$animals->animals_id);
    } else {
        if ($animals->animals_id) {

            header('Location: add-animals.php?id='.$animals->animals_id);

        } else {
            header('Location: add-animals.php');
        }
    }
}