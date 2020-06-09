<?php
class Smotryachie extends Table {
    public $id_smotr=0;
    public $user_id=0;

    public function validate()
    {
        if (!empty($this->id_smotr)) {
            return true;
        }
        return false;
    }
}