<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {

    public $CI;

    function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
        $this->CI->layout = 'homepage.php';
    }

    public function index() {
        $this->load->view('public/home');        
    }

}
