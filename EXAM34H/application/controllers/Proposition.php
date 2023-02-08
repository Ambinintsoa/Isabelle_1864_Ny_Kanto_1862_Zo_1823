<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proposition extends CI_Controller
{
    public function prop($user,$object){
        $this->load->view('header');
        $pr = array();
        $pr['iduser'] = $user;
        $pr['object'] = $object;
        $this->load->view('proposition',$pr);
        $this->load->view('footer');

    }

    public function validate(){
        $obj1 = $this->input->get('obj1');
        $obj2 = $this->input->get('obj2[]');
        $this->Echange->addProp($obj2,$obj1);
       redirect('liste');
    }

    public function pvalidate($idobj1, $idobj2)
    {
        $this->load->view('header');
        $this->Echange->addProp1($idobj2, $idobj1);
        $obj['obj1'] = $this->Object->getObj($idobj1);
        $obj['obj2'] = $this->Object->getObj($idobj2);
        $this->load->view('percent', $obj);
        $this->load->view('footer');
    }
}
