<?php
class Delegacio extends CI_Model
{
    protected $table = "delegacio";

    function __construct(){}

    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
?>