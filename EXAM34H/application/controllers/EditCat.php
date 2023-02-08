<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditCat extends CI_Controller
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

    public function edit($i,$cat)
    {
        $this->load->view('headerDefault');
        $id = array();
        $id['id'] = $i;
        $id['cat'] = $cat;
        $this->load->view('editcategory',$id);
        $this->load->view('footer');
    }
    public function add($i, $cat)
    {
        $this->load->view('headerDefault');
        $id = array();
        $id['id'] = $i;
        $id['cat'] = $cat;
        $this->load->view('addcategory', $id);
        $this->load->view('footer');
    }
    public function delete($idobject, $cat)
    {
        $this->Category->supprCategory($cat, $idobject);
        redirect('ListObjectAdmin');
    }

    public function edited()
    {
        $id = $this->input->post('id');
        $cat1 = $this->input->post('cat1');
        $cat2 = $this->input->post('cat2');
        $this->Category->modCategory($cat1, $cat2, $id);
        redirect('ListObjectAdmin');
    }

    public function added()
    {
        $id = $this->input->post('id');
        $cat2 = $this->input->post('cat2');
        $this->Category->addCategory($cat2, $id);
        redirect('ListObjectAdmin');
    }
}
