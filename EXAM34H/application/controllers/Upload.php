<?php
  
   class Upload extends CI_Controller {
	
      public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
      }
		
      public function index() { 
        $object=array();
        $object['objet']=$this->Object->getObjectForPerson($this->session->iduser);
        $this->load->view('headerDefault'); 
        $this->load->view('upload',$object ); 
        $this->load->view('footer'); 
      } 

      public function do_upload() { 
        $config['file_name']   = $_FILES['userfile']['name'] ; 
        $config['upload_path']   = './assets/img/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 10000; 
         $config['max_width']     = 10000; 
         $config['max_height']    = 10000;  
         $this->load->library('upload', $config);	
         if ( ! $this->upload->do_upload('userfile')) {
            redirect('Upload');
         }
         else { 
             $this->Object->addimg($this->input->post('object'),$_FILES['userfile']['name'] );
             redirect('Upload');
         } 
      } 
   } 
?>