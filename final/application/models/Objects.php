<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Objects extends CI_Model
{
    public function getObject($id)
    {
        $imglist = array();
        $query = $this->db->get_where('object', array('iduser !=' => $id));
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }
    public function getMyObject($id)
    {
        $imglist = array();
        $query = $this->db->get_where('object', array('iduser' => $id));
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }
    public function getObjectForPerson($id)
    {
        $imglist = array();
        $query = $this->db->get_where('object', array('iduser' => $id));
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }

    public function getObjectSearched($indice, $categorie, $id)
    {
        $imglist = array();
        $request = "SELECT category.id as idcategory,
        category.name as nomcategory,
        object.id as id,
        object.name as name,
        users.id as iduser,
        users.firstname as firstname,
        users.lastname as lastname,
        object.price as price,
        object.descri as descri
    FROM object_category
        JOIN object on object_category.idobject = object.id
        JOIN category on object_category.idcategory = category.id
        JOIN users on object.iduser = users.id where idcategory=%s and ( object.name like '%%%s%%' or object.name like '%%%s%%' and iduser!=%s) ";
        $query = $this->db->query(sprintf($request, $categorie, strtolower($indice), strtoupper($indice), $id));
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }

    public function getObjAndCat()
    {
        $objlist = array();
        $request = "SELECT category.id as idcategory,
        category.name as nomcategory,
        object.id as idobject,
        object.name as name,
        users.id as iduser,
        users.firstname as firstname,
         users.lastname as lastname,
        object.price as price,
        object.descri as descri
    FROM object_category
        JOIN object on object_category.idobject = object.id
        JOIN category on object_category.idcategory = category.id
        JOIN users on object.iduser = users.id ";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $objlist[] = $row;
        }
        return $objlist;
    }

    public function addObject($iduser, $name, $descri, $prix)
    {
        $data = array('name' => $name, 'descri' => $descri, 'price' => $prix, 'iduser' => $iduser);
        $str = $this->db->insert_string('object', $data);
        $query = $this->db->query($str);
    }
    public function selectObject($iduser, $name, $descri, $prix)
    {
        $query = $this->db->get_where('object', array('name' => $name, 'descri' => $descri, 'price' => $prix, 'iduser' => $iduser));
        $row = $query->row_array();
        return $row;
    }
    public function getSpecObject($id)
    {
        $query = $this->db->get_where('object', array('id' => $id));
        $row = $query->row_array();
        return $row;
    }
    public function addCategory($categories, $obj)
    {
        for ($i = 0; $i < count($categories); $i++) {
            $data = array('idcategory' => $categories[$i], 'idobject' => $obj);
            $str = $this->db->insert_string('object_category', $data);
            $query = $this->db->query($str);
        }
    }
    public function addimg($id, $img)
    {
        $data = array('idobject' => $id, 'src' => $img);
        $str = $this->db->insert_string('image', $data);
        $query = $this->db->query($str);
    }
    public function getImg($id)
    {
        $imglist = array();
        $request = "    select object.id as idobject,
    object.name as name,
    object.descri as descri,
    object.price as price,
    object.iduser as iduser,
    image.src as src
    from object
    join image on object.id=image.idobject where idobject=%s ";
        $query = $this->db->query(sprintf($request, $id));

        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }
    public function getObj_by_id($id)
    {
        $query = $this->db->get_where('object', array('iduser' => $id));
        $imglist = array();
        foreach ($query->result_array() as $row) {
            if ($row != null) {
                $imglist[] = $row;
            }
        }
        return $imglist;
    }

    public function getObj($id)
    {
        $imglist = array();
        $query = $this->db->get_where('object', array('id' => $id));
        $imglist = array();
        foreach ($query->result_array() as $row) {
            if ($row != null) {
                $imglist[] = $row;
            }
        }
        return $imglist;
    }

    public function get($id, $iduser, $percent)
    {
        $o = $this->getSpecObject($id);

        $newp = $o['price'] + ($o['price'] * ($percent / 100));
        $newm = $o['price'] - ($o['price'] * ($percent / 100));

        $request = "SELECT * FROM object WHERE id != %s AND iduser != %s AND price >= %s AND price <= %s";
        $query = $this->db->query(sprintf($request, $id, $iduser, $newm, $newp));

        $result = array();
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }

        return $result;
    }
}
