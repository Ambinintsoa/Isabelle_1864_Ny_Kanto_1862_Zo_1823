<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
        $this->load->view('headerDefault');
        $this->load->view('register');
        $this->load->view('footer');	
	}

        public function validate()
        {
                $fname = $this->input->post('fname');
                $lname = $this->input->post('lname');
                $mail = $this->input->post('mail');
                $pswrd = $this->input->post('pswrd');
                $this->User->addUser($fname, $lname, $mail, $pswrd);
                redirect('Login');
        }
}