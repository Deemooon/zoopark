<?php
class Animals extends Table {
    public $animals_id=0;
    public $firstname='';
    public $date_birth='';
    public $gender_id=0;
    public $habiat_id=0;
    public $racion_animals_id=0;
    public $id_vet=0;
    public $id_smotr=0;

    public function validate()
    {
        if (!empty($this->firstname) &&
            !empty($this->date_birth) &&
            !empty($this->gender_id) &&
            !empty($this->racion_animals_id) &&
            !empty($this->id_smotr) &&
            !empty($this->id_vet) &&
            !empty($this->habiat_id)) {
            return true;
        }
        return false;
    }
}