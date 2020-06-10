<?php
class MammalsMap extends BaseMap {

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT animals_id, origin, name". "FROM mammals WHERE animals_id = $id");
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
}
