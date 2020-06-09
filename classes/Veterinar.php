<?php
class Veterinar extends Table {
    public $id_vet=0;
    public $user_id=0;

    public function validate()
    {
        return false;
    }
}