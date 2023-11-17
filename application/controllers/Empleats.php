<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Empleats extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model("dpt");
        $this->load->model("emp");

        if (isset($_POST["enviar"]))
        {
            $this->form_validation->set_rules('nom', 'Nom usuari', 'required', array('required' => 'Has de escollir un %s.'));
            $this->form_validation->set_rules('dpt', 'Departament', 'callback_dpt_check');

            if ($this->form_validation->run() == TRUE)
            {
                //Podem fer l'insert així:
                $this->emp->insertEmp(array(
                    "nom" => $this->input->post("nom"),
                    "dpt" => $this->input->post("dpt"),
                ));
                redirect("Empleats/index");

                // o així: (qualsevol de les dues formes es correcte, amb la d'amunt estalviem un parell de línies)
                // $emp = array(
                //     "nom" => $this->input->post("nom"),
                //     "dpt" => $this->input->post("dpt"),
                // );

                // $this->emp->insertEmp($emp);
            }
        }

        $data = array(
            //Undefined property los cojones ignora este warning (dpt y emp hacen referencia a los modelos)
            "dpts" => $this->dpt->getAll(),
            "emps" => $this->emp->getAll()
        );

        $this->load->view("Empleats/index", $data);
    }

    public function dpt_check($str)
    {
        if ($str == 0)
        {
            $this->form_validation->set_message('dpt_check', 'Cal seleccionar un dpt vàlid');
            return false;
        }

        return true;
    }

    public function eliminarEmp($emp_id)
    {
        $this->load->model("emp");
        $this->emp->eliminarEmp($emp_id);

        redirect('Empleats/index');
    }

//     public function add()
//     {
//         $nom = $this->input->post("name");
//         $dpt = $this->input->post("option");

//         $data = array(
//             "nom" => $nom,
//             "dpt" => $dpt
//         );

//         $this->emp->insertEmp($data);
//     }
}
?>