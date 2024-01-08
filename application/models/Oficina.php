<?php
class Oficina extends CI_Model
{
    protected $table = "oficina";

    function __construct(){}

    public function getAll(){
        $query = $this->db->get($this->_name);
        return $query->result();
    }

    public function add($data){
        $query = $this->db->insert($this->_name);
        return $query->result();
    }
}
?>