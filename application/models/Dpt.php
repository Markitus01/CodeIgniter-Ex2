<?php
class Dpt extends CI_Model
{
    protected $table = "dpt";

    function __construct(){}

    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
?>