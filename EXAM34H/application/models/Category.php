<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Category extends CI_Model {
    public function getCategory()
    {
        $query = $this->db->get_where('category');
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }
    public function getIdWithCategory($id)
    {
        $imglist=array();
        $query = $this->db->get_where('object_category', array('idcategory' => $id));
        foreach ($query->result_array() as $row) {
                $imglist[] = $row;
        }
        return $imglist;
       
    }

    public function getObjWithCategory($id,$iduser)
    {
        $imglist=$this->getIdWithCategory($id);
        $obj=array();
        for ($i=0; $i < count($imglist); $i++) { 
            $query = $this->db->get_where('object', array('id' => $imglist[$i]['idobject'],'iduser!='=>$iduser));
            foreach ($query->result_array() as $row) {
               
                    $obj[] = $row;
            }
        }
        return $obj;
       
    }
    public function catobj($idobj, $idcategory)
    {
        $query = $this->db->get_where('object_category', array('idobject' => $idobj, 'idcategory' => $idcategory));
        $row = $query->row_array();

        return $row;
    }

    public function supprCategory($idcategory, $idobject)
    {
        $request = "DELETE FROM object_category WHERE idcategory = %s AND idobject = %s";

        $this->db->query(sprintf($request, $idcategory, $idobject));
    }

    public function modCategory($idcat1, $idcat2, $idobject)
    {
        if ($this->catobj($idobject, $idcat2) == null) {
            $request = "UPDATE object_category SET idcategory = %s WHERE idobject = %s";

            $this->db->query(sprintf($request, $idcat2, $idobject));
        } else {
            $this->supprCategory($idcat1, $idobject);
        }
    }
    public function addCategory($idcat, $idobject) {
        if ($this->catobj($idobject, $idcat) == null) {
            $data = array('idobject' => $idobject, 'idcategory' => $idcat);
            $str = $this->db->insert_string('object_category', $data);

            $this->db->query($str);
        }
    }
    
}
