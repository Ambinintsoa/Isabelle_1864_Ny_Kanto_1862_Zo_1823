<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailObject extends CI_Controller
{
    public function det($i)
    {
        $this->load->view('header');
        $id = array();
        $id['id'] = $i;
        $this->load->view('detailObject', $id);
    } 
}
