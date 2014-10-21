<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subcategories extends MX_Controller {

    public $CI;
    public $statusDesc = array('' => 'Unknown', 0 => 'Inactive', 1 => 'Active');

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->layout = 'admin.php';
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('admin/login');
        }
        $this->load->model('adminmodel');
    }

    public function index() {
        $categories = $this->adminmodel->getAllCategories();
        $subcategories = $this->adminmodel->getSubCategoriesForDisplay();
        $catnames = array();
        foreach ($categories as $key => $cats) {
            $catnames[$cats->cid] = $cats->cname;
        }
        $data['subcategories'] = $subcategories;
        $data['categorynames'] = $catnames;
        $data['statusdesc'] = $this->statusDesc;
        $this->load->view('subcategories', $data);
    }

    public function add() {
        $scatname = trim($this->input->post('subcatname'));
        $sccid = $this->input->post('catselect');
        $sscpriority = trim($this->input->post('subpriority'));
        if ($scatname == '' || !$sccid) {
            $this->session->set_flashdata('errmsg','category selection or sub category name are missing');
        }else{
            $saddarr = Array(
                'scname' => $scatname,
                'cid' => $sccid,
                'priority' => $sscpriority ? $sscpriority : 0,
                'scstatus' => $this->input->post('sactive'),
            );
            $subcInsID = $this->adminmodel->addSubCat($saddarr);
            if(!$subcInsID){
                $this->session->set_flashdata('errmsg','Unable to Create subcategory');
            }else{
                $this->session->set_flashdata('sxmsg','Sub Category Created');
            }
        }
        redirect('admin/subcategories');
    }
    public function edit(){
        $scatname = trim($this->input->post('subcatname'));
        $sccid = $this->input->post('catselect');
        $scid = $this->input->post('scid');
        $sscpriority = trim($this->input->post('subpriority'));
        if ($scatname == '' || !$sccid || !$scid) {
            $this->session->set_flashdata('errmsg','category selection or sub category name are missing');
        }else{
            $saddarr = Array(
                'scname' => $scatname,
                'cid' => $sccid,
                'priority' => $sscpriority ? $sscpriority : 0,
                'scstatus' => $this->input->post('sactive')
            );
            $subcInsID = $this->adminmodel->updateSubCat($scid,$saddarr);
            if(!$subcInsID){
                $this->session->set_flashdata('errmsg','Unable to Update sub category');
            }else{
                $this->session->set_flashdata('sxmsg','Sub Category Updated Successfully');
            }
        }
        redirect('admin/subcategories');
    }

    public function subcateditAjax() {
        $scid = trim($this->input->post('scid'));
        if($scid){
            $subcDetails = $this->adminmodel->getSubCategory($scid);
            print_r(json_encode($subcDetails));
        }else{
            echo json_encode(array('error'=>'Unable to get sub category details'));
        }
    }

}