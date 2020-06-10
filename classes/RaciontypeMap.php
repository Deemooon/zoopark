<?php
class RaciontypeMap extends BaseMap {

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT racion_type_id, name"
                . "FROM racion_type WHERE racion_type_id = $id");
            return $res->fetchObject("Type");
        }
        return new Raciontype();
    }

    public function save(Raciontype $type) {
        if ($type->validate()) {
            if ($type->racion_type_id == 0) {
                return $this->insert($type);
            } else {
                return $this->update($type);
            }
        }
        return false;
    }
    private function insert(Raciontype $type){
        $name = $this->db->quote($type->name);
        if ($this->db->exec("INSERT INTO racion_type(name)"
                . " VALUES($name)") == 1) {
            $type->racion_type_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Raciontype $type){
        $name = $this->db->quote($type->name);
        if ( $this->db->exec("UPDATE racion_type SET name = $name,". " WHERE racion_type_id = ".$type->racion_type_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT racion_type.racion_type_id,racion_type.name"
            . " FROM racion_type LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM racion_type");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function arrRacion()
    {
        $res = $this->db->query("SELECT racion_type_id AS id, name AS value FROM racion_type");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}