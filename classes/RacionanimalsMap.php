<?php
class RacionanimalsMap extends BaseMap {

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT racion_animals_id, animals_id,list_product, racion_type_id, name "
                . "FROM racion_animals WHERE racion_animals_id = $id");
            return $res->fetchObject("Racionanimals");
        }
        return new Racionanimals();
    }
    public function save(Racionanimals $racionanimals) {
        if ($racionanimals->validate()) {
            if ($racionanimals->racion_animals_id == 0) {
                return $this->insert($racionanimals);
            } else {
                return $this->update($racionanimals);
            }
        }
        return false;
    }
    private function insert(Racionanimals $racionanimals){
        $list_product = $this->db->quote($racionanimals->list_product);
        $name = $this->db->quote($racionanimals->name);

        if ($this->db->exec("INSERT INTO racion_animals(animals_id, list_product,racion_type_id, name)"
                . " VALUES($racionanimals->animals_id, $list_product,$racionanimals->racion_type_id,$name)") == 1) {
            $racionanimals->racion_animals_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Racionanimals $racionanimals) {
        $list_product = $this->db->quote($racionanimals->list_product);
        $name = $this->db->quote($racionanimals->name);
        if ( $this->db->exec("UPDATE racion_animals SET name = " . $name . ",animals_id = " . $racionanimals->animals_id . ","
                . " racion_type_id = $racionanimals->racion_type_id, list_product =$list_product WHERE racion_animals_id = ".$racionanimals->racion_animals_id) == 1) {
            return true;
        }
        return false;
    }
    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT racion_animals.racion_animals_id,racion_animals.name, animals.firstname AS animals, racion_type.name as racion_type,racion_animals.list_product"
            . " FROM racion_animals INNER JOIN animals ON racion_animals.animals_id=animals.animals_id INNER JOIN racion_type ON racion_animals.racion_type_id=racion_type.racion_type_id LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM racion_animals");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT racion_animals.racion_animals_id,racion_animals.name, animals.firstname AS animals, racion_type.name AS racion_type,racion_animals.list_product"
                . " FROM racion_animals INNER JOIN animals ON racion_animals.animals_id=animals.animals_id INNER JOIN racion_type ON racion_animals.racion_type_id=racion_type.racion_type_id WHERE racion_animals_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

}