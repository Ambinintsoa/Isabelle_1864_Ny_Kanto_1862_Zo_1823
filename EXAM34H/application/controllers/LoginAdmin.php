<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdmin extends CI_Controller {

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
		$this->load->view('headerdefault');
        $this->load->view('loginAdmin');
		$this->load->view('footer');
		
	}	
	public function check()
	{
		$name = $this->input->post('email');
		$pass = $this->input->post('password');
		$login = $this->User->getUser($name,$pass);
		if ($login==null) {
			redirect('LoginAdmin');
		} else {
			if($login['isAdmin']==1){
				$this->session->set_userdata('iduser',$login['id']);
				redirect('Admin');
			}else{
				redirect('LoginAdmin');
			}
		}
	}	
	
	public function logout(){
		$this->session->unset_userdata('iduser');
		redirect('');
	}
}