<?php
class ReptailMap extends BaseMap
{

    public function findById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT animals_id, origin, name" . "FROM reptail WHERE animals_id = $id");
            $reptail = $res->fetchObject("Reptail");
            if ($reptail) {
                return $reptail;
            }
        }
        return new Reptail();
    }

    public function save(Animals $animals, Reptail $reptail)
    {
        if ($animals->validate() && $reptail->validate() && (new AnimalsMap())->save($animals)) {
            if ($reptail->animals_id == 0) {
                $reptail->animals_id = $animals->animals_id;
                return $this->insert($reptail);
            }
            else {
                return $this->update($reptail);
            }
        }
        return false;
    }

    private function insert(Reptail $reptail){
        $origin = $this-> db->quote($reptail->origin);
        $name = $this-> db->quote($reptail->name);
        if ($this->db->exec("INSERT INTO reptail(animals_id, origin, name) VALUES($reptail->animals_id, $origin,$name)") == 1) {
            return true;
        }
        return false;
    }

    private function update(Reptail $reptail){
        $origin = $this-> db->quote($reptail->origin);
        $name = $this-> db->quote($reptail->name);
        if ($this->db->exec("UPDATE reptail SET origin = $origin, name= $name WHERE animals_id=".$reptail->animals_id) == 1) {
            return true;
        }
        return false;
    }

    public function count()
    {
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM reptail");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT animals.animals_id,animals.firstname AS fio,animals.wintering_start AS wintering_start,animals.wintering_end AS wintering_end,animals.date_birth, gender.name AS gender, CONCAT(personal.lastname,' ', personal.firstname, ' ', personal.patronymic) AS vet,
        CONCAT(ps.lastname,' ', ps.firstname, ' ', ps.patronymic) AS smotr,obitanya.name AS habiat,reptail.origin AS origin,reptail.name AS name"
            . " FROM animals INNER JOIN gender ON animals.gender_id=gender.gender_id 
            INNER JOIN obitanya ON animals.habiat_id=obitanya.habiat_id 
            INNER JOIN personal ON personal.user_id=id_vet 
            INNER JOIN personal ps ON ps.user_id=animals.id_smotr  
            INNER JOIN reptail ON animals.animals_id=reptail.animals_id
            LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findProfileById($id)
    {
        if ($id) {
            $res = $this->db->query("SELECT reptail.animals_id, reptail.name AS name,reptail.origin AS origin FROM reptail ". "WHERE reptail.animals_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

}