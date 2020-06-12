<?php
class MammalsMap extends BaseMap {

    public function findById($id)
    {
        if ($id) {
            $res = $this->db->query("SELECT animals_id, name,origin FROM mammals WHERE animals_id = $id");
            $mm = $res->fetchObject("Mammals");
            if ($mm) {
                return $mm;
            }
        }
        return new Mammals();
    }
    public function save(Animals $animals, Mammals $mm)
    {
        if ($animals->validate() && $mm->validate() && (new AnimalsMap())->save($animals)) {
            if ($mm->animals_id == 0) {
                $mm->animals_id = $animals->animals_id;
                return $this->insert($mm);
            }
            else {
                return $this->update($mm);
            }
        }
        return false;
    }
    private function insert(Mammals $mm){
        $origin = $this-> db->quote($mm->origin);
        $name = $this-> db->quote($mm->name);
        if ($this->db->exec("INSERT INTO mammals(animals_id, origin, name) VALUES($mm->animals_id, $origin,$name)") == 1) {
            return true;
        }
        return false;
    }

    private function update(Mammals $mm){
        $origin = $this-> db->quote($mm->origin);
        $name = $this-> db->quote($mm->name);
        if ($this->db->exec("UPDATE mammals SET origin = $origin, name= $name WHERE animals_id=".$mm->animals_id) == 1) {
            return true;
        }
        return false;
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM mammals");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT animals.animals_id,animals.firstname AS fio,animals.wintering_start AS wintering_start,animals.wintering_end AS wintering_end,animals.date_birth, gender.name AS gender, CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS vet,
        CONCAT(ps.lastname,' ', ps.firstname, ' ', ps.patronymic) AS smotr,obitanya.name AS habiat,mammals.origin AS origin,mammals.name AS name"
            . " FROM animals INNER JOIN gender ON animals.gender_id=gender.gender_id 
            INNER JOIN obitanya ON animals.habiat_id=obitanya.habiat_id 
            INNER JOIN personal ON personal.user_id=id_vet 
            INNER JOIN personal ps ON ps.user_id=animals.id_smotr  
            INNER JOIN mammals ON animals.animals_id=mammals.animals_id
            LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findProfileById($id)
    {
        if ($id) {
            $res = $this->db->query("SELECT mammals.animals_id, mammals.name AS name,mammals.origin AS origin FROM mammals ". "WHERE mammals.animals_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

}
