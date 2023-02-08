<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liste extends CI_Controller {

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
        
		$this->listCategory();
        $this->load->view('footer');
		
	}
	public function listCategory(){
		$allCat = array();
		$allCat['cat'] = $this->Category->getCategory();
		$this->load->view('header',$allCat);
		$this->load->view('categorie', $allCat);
	}
	public function listObjectByCategory($id){
		$allCat = array();
		$allCat['cat'] = $this->Category->getObjWithCategory($id,$this->session->iduser);
		$this->listCategory();
		$this->load->view('list', $allCat);
		$this->load->view('footer');
	}
	public function listObjectSearch(){
		$indice=$this->input->get('indice');
		$category=$this->input->get('category');
		$allCat = array();
		$allCat['cat'] = $this->Object->getObjectSearched($indice,$category,$this->session->iduser);
		$this->listCategory();
		$this->load->view('list', $allCat);
		$this->load->view('footer');
	}
	public function listObject(){
		$allCat = array();
		$allCat['cat'] = $this->Object->getObject($this->session->iduser);
		$this->load->view('list', $allCat);
	}

}