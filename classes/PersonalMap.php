<?php
class PersonalMap extends BaseMap {

    public function auth($login, $password){
        $login = $this->db->quote($login);
        $res = $this->db->query("SELECT personal.user_id, CONCAT(personal.lastname,' ', personal.firstname, ' ', IfNull(personal.patronymic,'')) AS fio, "."personal.pass, role.sys_name, role.name FROM personal "."INNER JOIN role ON personal.role_id=role.role_id "."WHERE personal.login = $login");
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
            $res = $this->db->query("SELECT user_id, lastname, firstname, patronymic, login, pass, gender_id, date_birth, role_id ". "FROM personal WHERE user_id = $id");
            $personal = $res->fetchObject("Personal");
            if ($personal) {
                return $personal;
            }
        }
        return new Personal();
    }
    public function arrGenders(){
        $res = $this->db->query("SELECT gender_id AS id, name AS value FROM gender");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function arrRoles(){
        $res = $this->db->query("SELECT role_id AS id, name AS value FROM role");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save(Personal $personal){
        if (!$this->existsLogin($personal->login)) {
            if ($personal->user_id == 0) {
                return $this->insert($personal);
            }
            else {
                return $this->update($personal);
            }
        }
        return false;
    }
    private function insert(Personal $personal)
    {
        $lastname = $this->db->quote($personal->lastname);
        $firstname = $this->db->quote($personal->firstname);
        $patronymic = $this->db->quote($personal->patronymic);
        $login = $this->db->quote($personal->login);
        $pass = $this->db->quote($personal->pass);
        $date_birth = $this->db->quote($personal->date_birth);

        if ($this->db->exec("INSERT INTO personal(lastname,firstname, patronymic, login, pass, gender_id, date_birth,role_id)"
            ."VALUES($lastname,$firstname,$patronymic,$login,$pass,$personal->gender_id,$date_birth,$personal->role_id)")) {
            $personal->user_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Personal $personal){
        $lastname = $this->db->quote($personal->lastname);
        $firstname = $this->db->quote($personal->firstname);
        $patronymic = $this->db->quote($personal->patronymic);
        $login = $this->db->quote($personal->login);
        $pass = $this->db->quote($personal->pass);
        $date_birth = $this->db->quote($personal->date_birth);
        if ( $this->db->exec("UPDATE personal SET lastname = $lastname, firstname = $firstname, patronymic = $patronymic,". " login = $login, pass = $pass, gender_id = $personal->gender_id, date_birth = $date_birth, role_id = $personal->role_id ". "WHERE user_id = ".$personal->user_id) == 1) {
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

}
