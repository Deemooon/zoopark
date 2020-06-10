<?php
class AnimalsMap extends BaseMap {
    public function arrAnimals()
    {
        $res = $this->db->query("SELECT animals_id AS id, firstname AS value FROM animals");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT animals_id, firstname, date_birth, gender_id,habiat_id,racion_animals_id,id_vet,id_smotr". "FROM animals WHERE animals_id = $id");
            $user = $res->fetchObject("Animals");
            if ($user) {
                return $user;
            }
        }
        return new Personal();
    }

    public function arrGenders(){
        $res = $this->db->query("SELECT gender_id AS id, name AS value FROM gender");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function arrHabiat()
    {
        $res = $this->db->query("SELECT habiat_id AS id, name AS value FROM obitanya");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function arrRacion()
    {
        $res = $this->db->query("SELECT racion_animals_id AS id, name AS value FROM racion_animals");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function arrVet()
    {
        $res = $this->db->query("SELECT user_id AS id, lastname AS value FROM personal");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function arrSmotr()
    {
        $res = $this->db->query("SELECT user_id AS id, lastname AS value FROM personal");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(Animals $animals)
    {
        if ($animals->validate()) {
            if ($animals->animals_id == 0) {
                return $this->insert($animals);
            } else {
                return $this->update($animals);
            }
        }
        return false;
    }
    private function insert(Animals $animals){
        $firstname = $this->db->quote($animals->firstname);
        $date_birth = $this->db->quote($animals->date_birth);
        if ($this->db->exec("INSERT INTO animals(firstname,gender_id,date_birth,habiat_id,racion_animals_id,id_vet,id_smotr)"
                . " VALUES($firstname,$animals->gender_id,$date_birth,$animals->habiat_id,$animals->racion_animals_id,$animals->id_vet,$animals->id_smotr)") == 1) {
            $animals->animals_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Animals $animals){
        $firstname = $this->db->quote($animals->firstname);
        $date_birth = $this->db->quote($animals->date_birth);
        if ( $this->db->exec("UPDATE personal SET firstname = $firstname,". " gender_id = $animals->gender_id, date_birth = $date_birth, habiat_id=$animals->habiat_id,racion_animals_id = $animals->racion_animals_id, id_vet=$animals->id_vet, id_smotr=$animals->id_smotr ". "WHERE animals_id = ".$animals->animals_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT animals.animals_id,animals.firstname,animals.date_birth, gender.name AS gender,racion_animals.name AS racion_animals, personal.lastname AS vet,
        CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS smotr,obitanya.name AS habiat"
            . " FROM animals INNER JOIN gender ON animals.gender_id=gender.gender_id INNER JOIN racion_animals ON animals.racion_animals_id=racion_animals.racion_animals_id INNER JOIN obitanya ON animals.habiat_id=obitanya.habiat_id INNER JOIN personal ON personal.user_id=id_vet  LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM animals");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }


}