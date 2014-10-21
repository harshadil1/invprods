<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * CI Layout
 *
 * 
 */
class Layout {

    public function index() {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            
        }else{

            $CI = & get_instance();
            $current_output = $CI->output->get_output();            
            if (isset($CI->layout)) {
                $layout_file = APPPATH . 'views/layouts/' . $CI->layout;
            } else {
                $layout_file = APPPATH . 'views/layouts/layout.php';
            }
            $layout = $CI->load->file($layout_file, true);
            $mod_output = str_replace("{content}", $current_output, $layout);
            echo $mod_output;
        }
    }

}