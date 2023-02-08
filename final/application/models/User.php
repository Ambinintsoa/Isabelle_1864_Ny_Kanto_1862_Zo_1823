<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model {

    public function getUser($mail, $pswrd)
    {
        $query = $this->db->get_where('users', array('email' => $mail, 'password' => $pswrd));
        $row = $query->row_array();
        return $row;
    }
    public function getAllUser()
    {
        $query = $this->db->get_where('users',array('isAdmin='=>0));
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }
    public function addUser($fname, $lname, $mail, $pswrd)
    {
        $data = array('firstname' => $fname, 'lastname' => $lname, 'email' => $mail, 'password' => $pswrd);
        $str = $this->db->insert_string('users', $data);
        $this->db->query($str);
    }

}
