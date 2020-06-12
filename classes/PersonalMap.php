<?php
class PersonalMap extends BaseMap {

    public function auth($login, $password){
        $login = $this->db->quote($login);
        $res = $this->db->query("SELECT personal.user_id, CONCAT(personal.lastname,' ', personal.firstname, ' ', IfNull(personal.patronymic,'')) AS fio, "."personal.pass, role.sys_name, role.name,personal.married_id FROM personal "."INNER JOIN role ON personal.role_id=role.role_id "."WHERE personal.login = $login");
        $personal = $res->fetch(PDO::FETCH_OBJ);
        if ($personal) {
            if (password_verify($password, $personal->pass))
            {
                return $personal;
            }
        }
        return null;
    }

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT user_id, lastname, firstname, patronymic, login, pass, gender_id, date_birth, role_id,married_id,married_name,phone_number". "FROM personal WHERE user_id = $id");
            $user = $res->fetchObject("User");
            if ($user) {
                return $user;
            }
        }
        return new Personal();
    }

    public function arrRoles(){
        $res = $this->db->query("SELECT role_id AS id, name AS value FROM role");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function arrGenders(){
        $res = $this->db->query("SELECT gender_id AS id, name AS value FROM gender");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save(Personal $p){
        if (!$this->existsLogin($p->login)) {
            if ($p->user_id == 0) {
                return $this->insert($p);
            }
            else {
                return $this->update($p);
            }
        }
        return false;
    }
    private function insert(Personal $p)
    {
        $lastname = $this->db->quote($p->lastname);
        $firstname = $this->db->quote($p->firstname);
        $patronymic = $this->db->quote($p->patronymic);
        $login = $this->db->quote($p->login);
        $pass = $this->db->quote($p->pass);
        $date_birth = $this->db->quote($p->date_birth);
        $phone_number = $this->db->quote($p->phone_number);
        $married_id = $this->db->quote($p->married_id);
        $married_name =$this->db->quote($p->married_name);

        if ($this->db->exec("INSERT INTO personal(lastname,firstname, patronymic, login, pass, gender_id, date_birth,phone_number,role_id,married_id,married_name)"
                . " VALUES($lastname,$firstname,$patronymic,$login,$pass,$p->gender_id,$date_birth,$phone_number, $p->role_id,$married_id,$married_name)") == 1) {
            $p->user_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Personal $p){
        $lastname = $this->db->quote($p->lastname);
        $firstname = $this->db->quote($p->firstname);
        $patronymic = $this->db->quote($p->patronymic);
        $login = $this->db->quote($p->login);
        $pass = $this->db->quote($p->pass);
        $date_birth = $this->db->quote($p->date_birth);
        $phone_number = $this->db->quote($p->phone_number);
        $married_id = $this->db->quote($p->married_id);
        $married_name =$this->db->quote($p->married_name);
        if ( $this->db->exec("UPDATE personal SET lastname = $lastname, firstname = $firstname, patronymic = $patronymic,". " login = $login,married_id =$married_id,married_name = $married_name,pass = $pass, gender_id = $p->gender_id, date_birth = $date_birth, phone_number=$phone_number,role_id = $p->role_id ". "WHERE user_id = ".$p->user_id) == 1) {
            return true;
        }
        return false;
    }
    private function existsLogin($login){
        $login = $this->db->quote($login);
        $res = $this->db->query("SELECT user_id FROM personal WHERE login = $login");
        if ($res->fetchColumn() > 0) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT personal.user_id, CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS fio,personal.married_name AS married, personal.login, personal.date_birth, ". " gender.name AS gender, personal.phone_number, role.name AS role FROM personal ". "INNER JOIN gender ON personal.gender_id=gender.gender_id" . " INNER JOIN role ON personal.role_id=role.role_id 
        LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM personal");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("Select personal.user_id, CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS fio,personal.married_id,personal.login,personal.pass, personal.date_birth, ". " gender.name AS gender, personal.phone_number, role.name AS role FROM personal ". "INNER JOIN gender ON personal.gender_id=gender.gender_id" . " INNER JOIN role ON personal.role_id=role.role_id WHERE personal.user_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function arrMarried()
    {
        $res = $this->db->query("SELECT married_id AS id, lastname AS value FROM personal");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findAll1($ofset=0, $limit=30){
        $res = $this->db->query("SELECT personal.user_id, CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS fio,personal.married_name AS married ,personal.date_birth, ". " gender.name AS gender, personal.phone_number, role.name AS role FROM personal ". "INNER JOIN gender ON personal.gender_id=gender.gender_id" . " INNER JOIN role ON personal.role_id=role.role_id 
        WHERE personal.married_id IS NOT NULL
        LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}
