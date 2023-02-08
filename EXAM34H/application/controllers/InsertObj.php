<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InsertObj extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        if ($this->session->has_userdata('iduser')) {
            $iduser= $this->input->post('iduser');
            $name= $this->input->post('name');
            $price= $this->input->post('prix');
            $descri =  $this->input->post('descri');
            $cat = $this->input->post('categorie[]');
            $this->Object->addObject($iduser,$name,$descri,$price);
            $obj=  $this->Object->selectObject($iduser,$name,$descri,$price);
            $this->Object->addCategory($cat,$obj['id']);
          redirect('AddObject');
        } else {
            redirect('');
        }
    }

}
