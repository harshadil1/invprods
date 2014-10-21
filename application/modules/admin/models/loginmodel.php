<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LoginModel extends CI_Model {
    private $uemail;
    private $upassword;
    private $userid;
    function __construct() {
        parent::__construct();
    }

    public function checkUser($uemailPStr,$upasswordPStr) {
        $this->uemail = $uemailPStr;
        $this->upassword = $upasswordPStr;
        // Run the query
        $query = $this->db->where('uemail',  $this->uemail)->where('upassword',  $this->upassword)->where('ustatus', 1)->limit(1)->get('users');
        // Let's check if there are any results
        if ($query->num_rows() > 0) {
            return $query->row()->uid;
        }
        return FALSE;
    }
    public function getUser($userIDPInt){
        $this->userid = $userIDPInt;
        return $this->db->where('uid',  $this->userid)->where('ustatus',  1)->get('users')->row();
    }

}