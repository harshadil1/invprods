<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends MX_Controller {

    public $CI;
    public $statusDesc = array('' => 'Unknown', 0 => 'Inactive', 1 => 'Active');
    private $pimagesPath = '';
    private $errmsg = '';

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->layout = 'admin.php';
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('admin/login');
        }
        $this->pimagesPath = FCPATH . 'assets\images\pimages\\';
        $this->load->model('adminmodel');
        $this->load->helper('form');
    }

    public function index() {
        $products = $this->adminmodel->getAllProducts();
        $categories = $this->adminmodel->getAllCategories();
        $catnames = array();
        foreach ($categories as $key => $cats) {
            $catnames[$cats->cid] = $cats->cname;
        }
        $data['products'] = $products;
        $data['categories'] = $categories;
        $data['categorynames'] = $catnames;
        $data['statusdesc'] = $this->statusDesc;
        $this->load->view('products', $data);
    }

    public function add() {
        $catnsubcats = $this->adminmodel->getCategoriesHierarchy();
        $categories = $this->adminmodel->getAllCategories();
        $catnames = array();
        $rarray = array();
        $oldcid = '';
        foreach ($catnsubcats as $key => $cats) {
            $rarray[$cats->cid][] = $cats;
        }

        foreach ($categories as $key => $cats) {
            $catnames[$cats->cid] = $cats->cname;
        }
        $data['categorynames'] = $catnames;
        $data['catnsubcats'] = $rarray;
        $this->load->view('addproduct', $data);
    }

    public function addproduct() {
        $catsid = explode('-', $this->input->post('catselect'));
        $catid = $catsid[0];
        $subcatid = $catsid[1];
        $pname = trim($this->input->post('prodname'));
        $pimage = $this->input->post('pimage');
        if (!$this->adminmodel->isProdDuplicate($pname, $subcatid)) {
            $prodArr = array(
                'pname' => $pname,
                'pimage' => str_replace(' ', '_', $pimage),
                'catid' => $catid,
                'subcatid' => $subcatid,
                'pshortdesc' => $this->input->post('shortdesc'),
                'pdescription' => $this->input->post('description'),
                'priority' => trim($this->input->post('prodpriority')),
                'pstatus' => $this->input->post('pactive'),
            );
            $pid = $this->adminmodel->addProduct($prodArr);
            if (empty($_FILES['userfile']['name'])) {
                $pupload = $this->do_upload('pimage');
                if(isset($pupload['error'])){
                    
                }else{
                    
                }
            }
        }
        redirect('admin/products');
    }

    function do_upload($inputFile) {
        $config['upload_path'] = $this->pimagesPath;
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['remove_spaces'] = true;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($inputFile)) {
            return array('error' => $this->upload->display_errors());
        } else {
            return array('upload_data' => $this->upload->data());
        }
    }

}
