<?php
class Bird extends Table {
    public $animals_id=0;
    public $name='';
    public $origin='';

    public function validate()
    {
        if (!empty($this->name) &&
            !empty($this->origin) &&
            !empty($this->wintering_end) &&
            !empty($this->wintering_start)) {
            return true;
        }
    }
}
