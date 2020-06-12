<?php
class BirdMap extends BaseMap {

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT animals_id, origin, name". "FROM bird WHERE animals_id = $id");
            $bird = $res->fetchObject("Bird");
            if ($bird) {
                return $bird;
            }
        }
        return new Bird();
    }

    public function save(Animals $animals, Bird $bird)
    {
        if ($animals->validate() && $bird->validate() && (new AnimalsMap())->save($animals)) {
            if ($bird->animals_id == 0) {
                $bird->animals_id = $animals->animals_id;
                return $this->insert($bird);
            }
            else {
                return $this->update($bird);
            }
        }
        return false;
    }
    private function insert(Bird $bird){
        $origin = $this-> db->quote($bird->origin);
        $name = $this-> db->quote($bird->name);
        if ($this->db->exec("INSERT INTO bird(animals_id, origin, name) VALUES($bird->animals_id,$origin,$name)") == 1) {
            return true;
        }
        return false;
    }

    private function update(Bird $bird){
        $origin = $this-> db->quote($bird->origin);
        $name = $this-> db->quote($bird->name);
            if ($this->db->exec("UPDATE bird SET origin = $origin, name= $name WHERE animals_id=".$bird->animals_id) == 1) {
                return true;
        }
        return false;
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM bird");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT animals.animals_id,animals.firstname AS fio,animals.wintering_start AS wintering_start,animals.wintering_end AS wintering_end,animals.date_birth, gender.name AS gender, CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS vet,
        CONCAT(ps.lastname,' ', ps.firstname, ' ', ps.patronymic) AS smotr,obitanya.name AS habiat,bird.origin AS origin,bird.name AS name"
            . " FROM animals INNER JOIN gender ON animals.gender_id=gender.gender_id 
            INNER JOIN obitanya ON animals.habiat_id=obitanya.habiat_id 
            INNER JOIN personal ON personal.user_id=id_vet 
            INNER JOIN personal ps ON ps.user_id=animals.id_smotr  
            INNER JOIN bird ON animals.animals_id=bird.animals_id
            LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findProfileById($id)
    {
        if ($id) {
            $res = $this->db->query("SELECT bird.animals_id, bird.name AS name,bird.origin AS origin FROM bird ". "WHERE bird.animals_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

}