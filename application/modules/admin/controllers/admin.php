<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {
    private $CI;

    public function __construct() {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->layout = 'admin.php';
        if (!$this->session->userdata('user')) {
            redirect('admin/login');
        }
    }

    public function index() {
        $this->load->view('index');
    }
    public function tables() {
        $this->load->view('tables');
    }
    public function forms() {
        $this->load->view('forms');
    }
    public function uploadquery(){
        $this->load->view('uploadquery');
    }
    public function queryDB() {
        $qry = trim($this->input->post('query'));
        if($this->db->query($qry)){
            $this->session->set_flashdata('mes','Query excecuted successfully');
        }else{
            $this->session->set_flashdata('mes','Query excecution Failed');
        }
        redirect('/admin/admin/uploadquery');
    }
}