<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminModel extends CI_Model {

    public $pidInt;
    public $pnameStr;
    public $pcatidInt;
    public $psubcatidInt;
    public $pimageStr;
    public $pshortdescStr;
    public $pdescription;
    public $priorityInt;
    public $pcreatedDate;
    public $pstatusInt;
    public $prodinfoArr;

    function __construct() {
        parent::__construct();
    }

    public function setProdAttributes() {
        $this->prodinfoArr = array(
            'pname' => $this->pnameStr,
            'catid' => $this->pcatidInt,
            'subcatid' => $this->psubcatidInt,
            'pimage' => $this->pimageStr,
            'pshortdesc' => $this->pshortdescStr,
            'pdescription' => $this->pdescription,
            'priority' => $this->priorityInt,
            'pcreated' => $this->pcreatedDate,
            'pstatus' => $this->pstatusInt,
        );
    }

    public function getProduct($prodID) {
        $this->pidInt = $prodID;
        $pquery = $this->db->where('pid', $this->pidInt)->where('pstatus', 1)->get('inv_products');
        if ($pquery->num_rows() > 0) {
            return $pquery->result();
        } else {
            return false;
        }
    }

    public function getAllProducts($order = 'pid desc', $active = false) {
        if ($active)
            $this->db->where('pstatus', 1);
        $this->db->order_by($order);
        $pquery = $this->db->get('inv_products');
        if ($pquery->num_rows() > 0) {
            return $pquery->result();
        } else {
            return false;
        }
    }

    public function getAllCategories($order = 'cid desc', $active = false) {
        if ($active)
            $this->db->where('status', 1);
        $this->db->order_by($order);
        $cquery = $this->db->get('inv_categories');
        if ($cquery->num_rows() > 0) {
            return $cquery->result();
        } else {
            return false;
        }
    }

    public function getCategory($cid) {
        $cquery = $this->db->where('cid', $cid)->get('inv_categories');
        if ($cquery->num_rows() > 0) {
            return $cquery->result();
        } else {
            return false;
        }
    }

    public function getSubCategories($catid, $scid = false) {
        $this->db->where('cid', $catid);
        if ($scid != false)
            $this->db->where('scid', $cid);
        $scquery = $this->db->get('inv_subcats');
        if ($cquery->num_rows() > 0) {
            $scresult = $cquery->result();
            $scout = array();
            foreach ($scresult as $key => $record) {
                $scout[$record['scid']] = $record;
            }
        } else {
            return false;
        }
    }

    public function getCategoriesForDisplay() {
        $scq = $this->db->query('SELECT c.*,count(sc.scid) as subcatcount FROM `inv_categories` c LEFT JOIN `inv_subcats` sc ON c.cid=sc.cid group by c.cid order by c.cname asc');
        if ($scq->num_rows() > 0) {
            return $scq->result();
        } else {
            return false;
        }
    }

    public function getSubCategoriesForDisplay() {
        $scq = $this->db->query('SELECT sc.*,count(p.pid) as pcount FROM `inv_subcats` sc LEFT JOIN `inv_products` p on sc.scid = p.subcatid group by sc.scid order by sc.cid,sc.scname asc');
        if ($scq->num_rows() > 0) {
            return $scq->result();
        } else {
            return false;
        }
    }

    public function addSubCat($dataArr) {
        $this->db->insert('inv_subcats', $dataArr);
        return $this->db->insert_id();
    }

    public function getSubCategory($scid) {
        $this->db->where('scid', $scid);
        $scquery = $this->db->get('inv_subcats');
        if ($scquery->num_rows() > 0) {
            return $scquery->row();
        } else {
            return false;
        }
    }

    public function updateSubCat($scid, $dataArr) {
        $this->db->where('scid', $scid);
        return $this->db->update('inv_subcats', $dataArr);
    }

    public function getCategoriesHierarchy() {
        $scq = $this->db->query('SELECT * FROM `inv_categories` c LEFT JOIN `inv_subcats` sc ON c.cid=sc.cid order by c.cname,sc.scname asc');
        if ($scq->num_rows() > 0) {
            return $scq->result();
        } else {
            return false;
        }
    }

    public function isProdDuplicate($pname, $subcatid, $pid=FALSE) {
        $this->db->where('pname',$pname);
        $this->db->where('subcatid',$subcatid);
        if($pid) $this->db->where('pid',$pid);
        $pqry = $this->db->get('inv_products');
        if ($pqry->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function addProduct($pdataArr) {
        $this->db->insert('inv_products', $pdataArr);
        return $this->db->insert_id();
    }
}
