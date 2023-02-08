<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Echange extends CI_Model {
    public function exchange()
    {
        $echange = array();
        $request = " SELECT o1.id as idobject1, o1.name as nomobject2, o2.id as idobject2, o2.name as nomobject2, proposition.isAccept as isaccept, proposition.hiredate as hiredate,u1.id as id1,u1.firstname as firstname1,u1.lastname as lastname1,u2.id as id2,u2.firstname as firstname2,u2.lastname as lastname2  FROM proposition
        JOIN object o1 ON proposition.idobject1 = o1.id
        JOIN object o2 ON proposition.idobject2 = o2.id
        JOIN users u1 ON o1.iduser = u1.id
        JOIN users u2 ON o2.iduser = u2.id WHERE isAccept = 1";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $echange[] = $row;
        }
        return $echange;
    }
    public function sentexchange($id)
    {
        $echange=array();
        $request = "    SELECT o1.id as idobject1, o1.name as nomobject1, o2.id as idobject2, o2.name as nomobject2, proposition.isAccept as isaccept, proposition.hiredate as hiredate,u1.id as id1,u1.firstname as firstname1,u1.lastname as lastname1,u2.id as id2,u2.firstname as firstname2,u2.lastname as lastname2  FROM proposition
        JOIN object o1 ON proposition.idobject1 = o1.id
        JOIN object o2 ON proposition.idobject2 = o2.id
        JOIN users u1 ON o1.iduser = u1.id
        JOIN users u2 ON o2.iduser = u2.id WHERE isAccept = 0 and u1.id=%s order by id1";
        $query = $this->db->query(sprintf($request,$id));
        foreach ($query->result_array() as $row) {
            $echange[] = $row;
        }
        return $echange;
    }
    public function countexchange($id)
    {
        $echange=array();
        $request = "SELECT COUNT(*) FROM(  SELECT o1.id as idobject1, o1.name as nomobject1, o2.id as idobject2, o2.name as nomobject2, proposition.isAccept as isaccept, proposition.hiredate as hiredate,u1.id as id1,u1.firstname as firstname1,u1.lastname as lastname1,u2.id as id2,u2.firstname as firstname2,u2.lastname as lastname2  FROM proposition
        JOIN object o1 ON proposition.idobject1 = o1.id
        JOIN object o2 ON proposition.idobject2 = o2.id
        JOIN users u1 ON o1.iduser = u1.id
        JOIN users u2 ON o2.iduser = u2.id WHERE isAccept = 1 WHERE isAccept = 0 and u2.id=%s GROUP BY id1)";
        $query = $this->db->query(sprintf($request,$id));
        $row = $query->row_array();
        return $row;
    }
    public function accept($idobj1, $idobj2)
    {
        date_default_timezone_set('Europe/Paris');
        $obj1 = array();
        $obj1 = $this->Object->getSpecObject($idobj1);
        $obj2 = array();
        $obj2 = $this->Object->getSpecObject($idobj2);

        $data1 = array('name' => $obj1['name'], 'descri' => $obj1['descri'], 'price' => $obj1['price'], 'iduser' => $obj1['iduser'], 'idobject' => $obj1['id']);
        $str1 = $this->db->insert_string('history', $data1);
        $this->db->query($str1);

        $data2 = array('name' => $obj2['name'], 'descri' => $obj2['descri'], 'price' => $obj2['price'], 'iduser' => $obj2['iduser'], 'idobject' => $obj1['id']);
        $str2 = $this->db->insert_string('history', $data2);
        $this->db->query($str2);

        $data3 = array('isAccept' => 1);
        $where1 = "idobject1 = " . $idobj1 . " AND idobject2 = " . $idobj2;
        $request1 = $this->db->update_string('proposition', $data3, $where1);

        $this->db->query($request1);


        $data4 = array('iduser' => $obj1['iduser']);
        $where2 = "id = " . $idobj2 . " AND iduser = " . $obj2['iduser'];
        $request2 = $this->db->update_string('object', $data4, $where2);
        $this->db->query($request2);

        $data5 = array('iduser' => $obj2['iduser']);
        $where3 = "id = " . $idobj1 . " AND iduser = " . $obj1['iduser'];
        $request3 = $this->db->update_string('object', $data5, $where3);
        $this->db->query($request3);
    }
    public function add($idobj1, $idobj2, $id)
    {
        date_default_timezone_set('Europe/Paris');
        $obj1 = array();
        $obj1 = $this->Object->getSpecObject($idobj1);
        $obj2 = array();
        $obj2 = $this->Object->getSpecObject($idobj2);

        $data2 = array('name' => $obj2['name'], 'descri' => $obj2['descri'], 'price' => $obj2['price'], 'iduser' => $obj2['iduser'], 'idobject' => $obj1['id']);
        $str2 = $this->db->insert_string('history', $data2);

        $this->db->query($str2);

        $data3 = array('isAccept' => 1);
        $where1 = "idobject1 = " . $id . " AND idobject2 = " . $idobj2;
        $request1 = $this->db->update_string('proposition', $data3, $where1);

        $this->db->query($request1);

        $data4 = array('iduser' => $obj1['iduser']);
        $where2 = "id = " . $idobj2 . " AND iduser = " . $obj2['iduser'];
        $request2 = $this->db->update_string('object', $data4, $where2);

        $this->db->query($request2);
    }

    public function refuse($idobj1, $idobj2)
    {
        $request = "DELETE FROM proposition WHERE idobject1 = %s AND idobject2 = %s";

        $this->db->query(sprintf($request, $idobj1, $idobj2));
    }

    public function addProp($obj1, $obj2)
    {
        foreach ($obj1 as $obj) {
            $data = array('idobject1' => $obj2, 'idobject2' => $obj, 'isaccept' => 0);
            $str = $this->db->insert_string('proposition', $data);
            $this->db->query($str);
        }
    }
    public function addProp1($obj1, $obj2)
    {
        $data = array('idobject1' => $obj1, 'idobject2' => $obj2, 'isaccept' => 0);
        $str = $this->db->insert_string('proposition', $data);
        $this->db->query($str);
    }
    public function historic()
    {
        $request = "SELECT * FROM history ORDER BY idobject, hiredate";
        $echange = array();
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $echange[] = $row;
        }
        return $echange;
    }
    public function getOffre($id)
    {
        $request = " SELECT o1.id as idobject1, o1.name as nomobject2, o2.id as idobject2, o2.name as nomobject2, proposition.isAccept as isaccept, proposition.hiredate as hiredate,u1.id as id1,u1.firstname as firstname1,u1.lastname as lastname1,u2.id as id2,u2.firstname as firstname2,u2.lastname as lastname2  FROM proposition
        JOIN object o1 ON proposition.idobject1 = o1.id
        JOIN object o2 ON proposition.idobject2 = o2.id
        JOIN users u1 ON o1.iduser = u1.id
        JOIN users u2 ON o2.iduser = u2.id where  u1.id=%s";
        $echange = array();
        $query = $this->db->query(sprintf($request, $id));
        foreach ($query->result_array() as $row) {
            $echange[] = $row;
        }
        return $echange;
    }
}
