<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListEchange extends CI_Controller {

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
	public function __construct() { 
		parent::__construct(); 
		$this->load->model('Echange');
	 }
   
	public function index()
	{
     
        $this->load->view('headerDefault');
        $all['echange'] = $this->Echange->exchange();
        $this->load->view('listEchange',$all);
        $this->load->view('footer');
		
	}
	public function proposition()
	{
		if($this->session->has_userdata('iduser')){
			$this->load->view('headerDefault');
			$all['echange'] = $this->Echange->sentexchange($this->session->iduser);
			$count=array();
			$this->load->view('listProposition',$all);
			$this->load->view('footer');
		}else{
			redirect('first');
		}

		
	}
	public function accept($obj1,$obj2)
	{
		$obj=array();
		echo $obj2;
		$obj=$this->Echange->getOffre($obj2);
		for ($i=0; $i <count($obj) ; $i++){
			if($i==0){
				$this->Echange->accept($obj1,$obj[$i]['idobject2']);
			}else{
				$this->Echange->add($obj[0]['idobject1'],$obj[$i]['idobject2'],$obj1);
			}
			
		}
		redirect('ListEchange/proposition');
	}
	public function refuse($obj1,$obj2)
	{
		$obj=array();
		echo $obj2;
		$obj=$this->Echange->getOffre($obj2);
		for ($i=0; $i <count($obj) ; $i++){
			$this->Echange->refuse($obj1,$obj[$i]['idobject2']);
		}
		redirect('ListEchange/proposition');

	}

}