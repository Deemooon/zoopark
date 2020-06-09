<?php
class Reptail extends Table {
    public $animals_id=0;
    public $name='';
    public $origin='';
    public function validate()
    {
        return false;
    }
}