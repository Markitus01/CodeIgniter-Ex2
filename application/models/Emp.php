<?php
class Emp extends CI_Model
{
    protected $table = "emp";

    function __construct(){}

    public function getAll(){
        $this->db->select("emp.id as emp_id, emp.nom as emp_nom, dpt.nom as dpt_nom");
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