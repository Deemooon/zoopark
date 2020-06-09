<?php
class SmotryachieMap extends BaseMap {

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT id_smotr, user_id FROM smotr WHERE user_id = $id");
            $smotr = $res->fetchObject("Smotr");
            if ($smotr) {
                return $smotr;
            }
        }
        return new Smotryachie();
    }
    public function save(Personal $personal,Smotryachie $smotr){
        if ($personal->validate() && $smotr->validate() && (new PersonalMap())->save($personal)) {
            if ($smotr->user_id == 0) {
                $smotr->user_id = $personal->user_id;
                return $this->insert($smotr);
            }
            else {
                return $this->update($smotr);
            }
        }
        return false;
    }
    private function insert(Smotryachie $smotr){
        if ($this->db->exec("INSERT INTO smotr(id_smotr, user_id) VALUES($smotr->id_smotr, $smotr->user_id)") == 1) {
            return true;
        }
        return false;
    }

    private function update(Smotryachie $smotr){
        if ($this->db->exec("UPDATE smotr SET id_vet = $smotr->id_vet WHERE user_id=".$smotr->user_id) == 1) {
            return true;
        }
        return false;
    }

    public function arrSmotr()
    {
        $res = $this->db->query("SELECT id_smotr AS id FROM smotr");
return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}