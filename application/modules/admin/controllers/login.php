<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MX_Controller {

    public $layout;
    public $username;
    public $uemail;
    private $upassword;
    private $userid;
    private $CI;

    public function __construct() {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->layout = 'admin_login.php';
        $this->load->model('loginmodel');
    }

    public function index() {
        $this->load->view('login');
    }

    public function dologin() {
        // grab user input		
        $this->uemail = $this->security->xss_clean($this->input->post('email'));
        $this->upassword = $this->security->xss_clean($this->input->post('password'));
        $this->userid = $this->loginmodel->checkUser($this->uemail, $this->upassword);
        if ($this->userid > 0) {
            if($this->setUserData()){
                redirect('/admin/index');
            }
        } else {
            $this->session->set_flashdata('loginerror', 'Please check username or password you entered');
            redirect('/admin/login');
        }
    }

    public function dologout() {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    private function setUserData() {
        $userData = $this->loginmodel->getUser($this->userid);
        if ($userData->uid > 0) {
            $this->session->unset_userdata('user');
            // If there is a user, then create session data
            $data = array('user' => array(
                    'userid' => $userData->uid,
                    'uname' => $userData->uname,
                    'uemail' => $userData->uemail,
                    'accesslevel' => $userData->accesslevel
                    ));
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }

    public function checklogin() {
        if (!$this->session->userdata('user')) {
            $this->session->unset_userdata('user');
            $this->session->sess_destroy();
            redirect('admin/login');
        }
    }

}