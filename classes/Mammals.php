<?php
class Mammals extends Table
{
    public $animals_id = 0;
    public $name = '';
    public $origin = '';

    public function validate()
    {
        if (!empty($this->name) &&
            !empty($this->origin)) {
            return true;
        }
    }
}