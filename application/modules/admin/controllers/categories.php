<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends MX_Controller {

    public $CI;
    public $statusDesc = array(''=>'Unknown',0=>'Inactive',1=>'Active');

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->layout = 'admin.php';
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('admin/login');
        }
        $this->load->model('adminmodel');
    }

    public function index() {
        //$categories = $this->adminModel->getAllCategories();
        $categories = $this->adminmodel->getCategoriesForDisplay();
        /*$catnames = array();
        foreach($categories as $key=>$cats){
            $catnames[$cats->cid] = $cats->cname;
        }*/
        //$data['products'] = $products;
        $data['categories'] = $categories;
        //$data['categorynames'] = $catnames;
        $data['statusdesc'] = $this->statusDesc;
        $this->load->view('categories',$data);
    }
}