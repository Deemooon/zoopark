<?php
class Personal extends Table {
    public $user_id=0;
    public $lastname='';
    public $firstname='';
    public $patronymic='';
    public $date_birth='';
    public $gender_id=0;
    public $phone_number='';
    public $animals_id=0;
    public $login='';
    public $pass='';
    public $role_id=0;
    public $married_id=0;

    public function validate()
    {
        if (!empty($this->lastname) &&
            !empty($this->firstname) &&
            !empty($this->login) &&
            !empty($this->pass) &&
            !empty($this->role_id) &&
            !empty($this->gender_id)) {
            return true;
        }
        return false;
    }
}