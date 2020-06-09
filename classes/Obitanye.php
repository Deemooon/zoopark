<?php
class Obitanye extends Table {
    public $habiat_id=0;
    public $name='';
    public $info='';


    public function validate()
    {
        if (!empty($this->name) &&
            !empty($this->info)) {
            return true;
        }
        return false;
    }


}