<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class DBAccess extends CI_Model {

    public function getUser($mail, $pswrd)
    {
        $query = $this->db->get_where('users', array('email' => $mail, 'password' => $pswrd));
        $row = $query->row_array();
        return $row;
    }

    public function addUser($fname, $lname, $mail, $pswrd)
    {
        $data = array('firstname' => $fname, 'lastname' => $lname, 'email' => $mail, 'password' => $pswrd);
        $str = $this->db->insert_string('user', $data);
    }

    public function addProduct($name, $desc, $price)
    {
        $data = array('name' => $name, 'desc' => $desc, 'price' => $price);
        $str = $this->db->insert_string('table_name', $data);
    }

    public function getImg($id)
    {
        $query = $this->db->get_where('mytable', array('idobject' => $id));
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }

    public function getCategory()
    {
        $query = $this->db->get_where('category');
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }

    public function getObject()
    {
        $query = $this->db->get_where('object');
        foreach ($query->result_array() as $row) {
            $objlist[] = $row;
        }
        return $objlist;
    }
}
