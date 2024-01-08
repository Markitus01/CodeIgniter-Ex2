<?php
class Empleat extends CI_Model
{
    protected $table = "empleat";

    function __construct(){}

    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
?>