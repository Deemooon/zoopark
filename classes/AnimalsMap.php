<?php
class AnimalsMap extends BaseMap {
    public function arrAnimals()
    {
        $res = $this->db->query("SELECT animals_id AS id, firstname AS value FROM animals");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT animals_id, firstname, date_birth, gender_id,habiat_id,racion_animals_id,id_vet,id_smotr,wintering_start,wintering_end". "FROM animals WHERE animals_id = $id");
            $p = $res->fetchObject("Animals");
            if ($p) {
                return $p;
            }
        }
        return new Personal();
    }
    public function save(Animals $animals) {
        if ($animals->validate()) {
            if ($animals->animals_id == 0) {
                return $this->insert($animals);
            } else {
                return $this->update($animals);
            }
        }
        return false;
    }
    private function insert(Animals $animals)
    {
        $firstname = $this->db->quote($animals->firstname);
        $date_birth = $this->db->quote($animals->date_birth);
        $wintering_start = $this->db->quote($animals->wintering_start);
        $wintering_end = $this->db->quote($animals->wintering_end);
        $id_vet=($animals->id_vet)?$animals->id_vet:'NULL';
        $id_smotr=($animals->id_smotr)?$animals->id_smotr:'NULL';
        if ($this->db->exec("INSERT INTO animals(firstname,date_birth,gender_id,habiat_id,racion_animals_id, id_vet,id_smotr,wintering_start,wintering_end)"
                . " VALUES($firstname,$date_birth,$animals->gender_id,$animals->habiat_id,$animals->racion_animals_id,$id_vet,$id_smotr,$wintering_end,$wintering_start)") == 1) {
            $animals->animals_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    private function update(Animals $animals){
        $firstname = $this->db->quote($animals->firstname);
        $date_birth = $this->db->quote($animals->date_birth);
        $wintering_start = $this->db->quote($animals->wintering_start);
        $wintering_end = $this->db->quote($animals->wintering_end);
        if ( $this->db->exec("UPDATE animals SET firstname = $firstname,wintering_start = $wintering_start, wintering_end = $wintering_end,date_birth = $date_birth,". "gender_id = $animals->gender_id,habiat_id = $animals->habiat_id, racion_animals_id = $animals->racion_animals_id,id_vet = $animals->id_vet, racion_animals_id = $animals->racion_animals_id,id_smotr = $animals->id_smotr ". "WHERE animals_id = ".$animals->animals_id) == 1) {
            return true;
        }
        return false;
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



    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT animals.animals_id,animals.firstname,animals.date_birth, gender.name AS gender,racion_animals.name AS racion_animals, CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS vet,
        CONCAT(ps.lastname,' ', ps.firstname, ' ', ps.patronymic) AS smotr,obitanya.name AS habiat,animals.wintering_start AS wintering_start,animals.wintering_end AS wintering_end"
            . " FROM animals 
            INNER JOIN gender ON animals.gender_id=gender.gender_id 
            INNER JOIN racion_animals ON animals.racion_animals_id=racion_animals.racion_animals_id
             INNER JOIN obitanya ON animals.habiat_id=obitanya.habiat_id 
             INNER JOIN personal ON personal.user_id=id_vet 
             INNER JOIN personal ps ON ps.user_id=animals.id_smotr 
      
             LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM animals");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT animals.animals_id,animals.firstname,animals.date_birth,gender.name AS gender,obitanya.name AS habiat,CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS vet,CONCAT(ps.lastname,' ', ps.firstname, ' ', ps.patronymic) AS smotr"
                . " FROM animals INNER JOIN gender ON animals.gender_id=gender.gender_id 
                INNER JOIN obitanya ON animals.habiat_id=obitanya.habiat_id INNER JOIN personal ON personal.user_id=id_vet INNER JOIN personal ps ON ps.user_id=animals.id_smotr WHERE animals_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function findProfileById($id)
    {
        if ($id) {
            $res = $this->db->query("SELECT animals.animals_id,animals.wintering_start AS wintering_start,animals.wintering_end AS wintering_end,animals.firstname AS fio,animals.date_birth,gender.name AS gender,obitanya.name AS habiat,CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS vet,CONCAT(ps.lastname,' ', ps.firstname, ' ', ps.patronymic) AS smotr"
                . " FROM animals INNER JOIN gender ON animals.gender_id=gender.gender_id 
                INNER JOIN obitanya ON animals.habiat_id=obitanya.habiat_id INNER JOIN personal ON personal.user_id=id_vet INNER JOIN personal ps ON ps.user_id=animals.id_smotr WHERE animals_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function findAll1($ofset=0,$limit=30)
    {
        $res = $this->db->query("SELECT animals.animals_id,animals.firstname,animals.date_birth, gender.name AS gender,racion_animals.name AS racion_animals, CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS vet,
        CONCAT(ps.lastname,' ', ps.firstname, ' ', ps.patronymic) AS smotr,obitanya.name AS habiat,animals.wintering_start AS wintering_start,animals.wintering_end AS wintering_end"
            . " FROM animals 
            INNER JOIN gender ON animals.gender_id=gender.gender_id 
            INNER JOIN racion_animals ON animals.racion_animals_id=racion_animals.racion_animals_id
             INNER JOIN obitanya ON animals.habiat_id=obitanya.habiat_id 
             INNER JOIN personal ON personal.user_id=id_vet 
             INNER JOIN personal ps ON ps.user_id=animals.id_smotr 
                WHERE animals.wintering_start > CURRENT_DATE 
             LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}