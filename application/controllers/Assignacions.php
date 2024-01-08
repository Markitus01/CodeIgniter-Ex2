<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Assignacions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //Libraries i merdes carregades al autoload
        $this->form_validation->set_rules('nom', 'Nom usuari', 'required', array('required' => 'Has de escollir un %s.'));
        $this->form_validation->set_rules('dpt', 'Departament', 'callback_dpt_check');

        if ($this->form_validation->run() == TRUE)
        {
            $emp = array(
                    "nom" => $this->input->post("nom"),
                    "dpt" => $this->input->post("dpt"),
            );

            $this->emp->insertEmp($emp);
        }
        
        $data = array(
            "delegacions" => $this->delegacio->getAll(),
            "empleat" => $this->empleat->getAll()
        );

        $this->load->view("Simulacre/index", $data);
    }

    public function delegacio_check($str)
    {
        if ($str == 0)
        {
            $this->form_validation->set_message('dlg_check', 'Cal seleccionar una delegació vàlida');
            return false;
        }

        return true;
    }
}
?>