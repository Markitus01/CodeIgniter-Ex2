<?php
class Assignacions extends CI_Model
{
    protected $table = "assignacions";

    function __construct(){}

    public function getAll(){
        $this->db->select("empleat.id as emp_id, empleat.nom as emp_nom, oficina.nom as ofi_nom");
        $this->db->from($this->table);
        $this->db->join("dpt", $this->table . ".dpt = dpt.id");
        $query = $this->db->get();

        return $query->result();
    }

    public function insertEmp($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function eliminarEmp($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('emp');
    }
}
?>