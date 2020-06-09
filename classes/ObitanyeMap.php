<?php
class ObitanyeMap extends BaseMap {

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT habiat_id, name,info "
                . "FROM obitanya WHERE habiat_id = $id");
            return $res->fetchObject("Obitanye");
        }
        return new Obitanye();
    }
    public function save(Obitanye $habiat) {
        if ($habiat->validate()) {
            if ($habiat->habiat_id == 0) {
                return $this->insert($habiat);
            } else {
                return $this->update($habiat);
            }
        }
        return false;
    }
    private function insert(Obitanye $habiat){
        $name = $this->db->quote($habiat->name);
        $info = $this->db->quote($habiat->info);
        if ($this->db->exec("INSERT INTO obitanya(name,info)"
                . " VALUES($name,$info)") == 1) {
            $habiat->habiat_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Obitanye $habiat){
        $name = $this->db->quote($habiat->name);
        if ( $this->db->exec("UPDATE obitanya SET name = $name,". "info= $habiat->info WHERE habita_id = ".$habiat->habita_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT obitanya.habiat_id,obitanya.name,obitanya.info"
            . " FROM obitanya LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM obitanya");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT obitanya.habiat_id,obitanya.name,obitanya.info"
                . " FROM obitanya WHERE habiat_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

}