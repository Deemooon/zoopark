<?php
class Racionanimals extends Table {
    public $racion_animals_id=0;
    public $animals_id=0;
    public $list_product='';
    public $racion_type_id=0;
    public $name='';

    public function validate()
    {
        return false;
    }
}