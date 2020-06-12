<?php
class Animals extends Table {



    public function validate()
    {
        if (!empty($this->firstname) &&
            !empty($this->date_birth) &&
            !empty($this->gender_id) &&
            !empty($this->racion_animals_id) &&
            !empty($this->id_smotr) &&
            !empty($this->id_vet) &&
            !empty($this->wintering_start) &&
            !empty($this->wintering_end) &&
            !empty($this->habiat_id)) {
            return true;
        }
        return false;
    }
}