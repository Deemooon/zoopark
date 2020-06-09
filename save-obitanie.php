<?php
require_once 'secure.php';
if (isset($_POST['habiat_id'])) {
    $habiat = new Obitanye();
    $habiat->habiat_id = Helper::clearInt($_POST['habiat_id']);
    $habiat->name = Helper::clearString($_POST['name']);
    $habiat->info = Helper::clearString($_POST['info']);
    print_r($habiat);
    if ((new ObitanyeMap())->save($habiat)) {
        header('Location: view-obitanie.php?id='.$habiat->habiat_id);
    } else {
        if ($habiat->habiat_id) {

            header('Location: add-obitanie.php?id='.$habiat->habiat_id);

        } else {
            header('Location: add-obitanie.php');
        }
    }
}
