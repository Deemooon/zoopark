<?php
require_once 'secure.php';
if (isset($_POST['animals_id'])) {
    $animals = new Animals();
    $animals->firstname = Helper::clearString($_POST['firstname']);
    $animals->animals_id= Helper::clearInt($_POST['animals_id']);
    $animals->racion_animals_id= Helper::clearInt($_POST['racion_animals_id']);
    $animals->habiat_id= Helper::clearInt($_POST['habiat_id']);
    $animals->date_birth = Helper::clearString($_POST['date_birth']);
    $animals->gender_id = Helper::clearInt($_POST['gender_id']);
    $animals->id_vet = Helper::clearInt($_POST['id_vet']);
    $animals->id_smotr = Helper::clearInt($_POST['id_vet']);
    if (isset($_POST['saveMammals'])) {
        $mm = new Mammals();
        $mm->origin =Helper::clearString($_POST['origin']);
        $mm->name =Helper::clearString($_POST['name']);
        $mm->animals_id = $animals->animals_id;
        print_r($mm);
        if ((new MammalsMap())->save($animals, $mm)) {

            header('Location: profile-mammals.php?id='.$mm->animals_id);

        } else {
            if ($mm->animals_id) {

                header('Location: add-mammals.php?id='.$mm->animals_id);

            } else {
                header('Location: add-mammals.php');
            }
        }
    }

}