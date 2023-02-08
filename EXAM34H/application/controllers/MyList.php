<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyList extends CI_Controller {

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
	public function index(){
        $this->load->view('headerDefault');
        $obj=array();
        $obj['obj']=$this->Object->getMyObject($this->session->iduser);
        $this->load->view('MyList',$obj);
        $this->load->view('footer');
	}

	public function getpercent($id, $iduser, $percent) {
		$this->load->view('headerDefault');
		$obj['obj'] = $this->Object->get($id, $iduser, $percent);
		$obj['a'] = $id;
		$this->load->view('Listpercent', $obj);
		$this->load->view('Footer');
	}
}